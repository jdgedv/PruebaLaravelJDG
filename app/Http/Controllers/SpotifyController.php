<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{   
    private $clientId;
    private $clientSecret;
    private $redirectUri = 'http://127.0.0.1:8000/profile/';

    public function __construct(){
        $this->clientId = config('spotify.clientId');
        $this->clientSecret = config('spotify.clientSecret');   
    }

    public function login()
    {
        $scopes = 'user-read-private user-read-email';
        return redirect(
            'https://accounts.spotify.com/authorize' .
                            '?response_type=code' .
                            '&client_id=' . $this->clientId .
                            ($scopes ? '&scope=' . urlencode($scopes) : '') .
                            '&redirect_uri=' . urlencode($this->redirectUri)
        );
    }

    public function getToken()
    {
        $code = $_GET['code'];
       
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)            
            ])->asForm()
            ->post('https://accounts.spotify.com/api/token', [
            'code' => trim($code),
            'redirect_uri' => $this->redirectUri,
            'grant_type' => 'authorization_code',
        ]);
        
        return $response->json()['access_token'];

    }
    
    public function getUser() {
        $token = $this->getToken();

        $profile = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token])
            ->get('https://api.spotify.com/v1/me');

        $releases = Http::withHeaders([
            'Accept' => 'application/json', 
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token])
            ->get('https://api.spotify.com/v1/browse/new-releases');
        
        return view('profile')->with(['profile' => $profile->json(), 'releases' => $releases]); 

        
    }
    
    public function getNewReleases() {
        $token = $this->getToken();

        $releases = Http::withHeaders([
            'Accept' => 'application/json', 
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token])
            ->get('https://api.spotify.com/v1/browse/new-releases');
        
        return view('releases')->with(['releases' => $releases->json()]); 
        
    }
}
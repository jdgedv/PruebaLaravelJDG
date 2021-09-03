<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index(){
        $respuesta = Http::get('http://jsonplaceholder.typicode.com/posts');
        $posts = $respuesta->json();
        return view('test',compact('posts'));
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>NUEVOS LANZAMIENTOS</title>
</head>
<body>

    <!-- <img src="{{$profile['images'][0]['url']}}" alt="profile"> -->

            <!-- Speakers -->
    <section id="speakers" class="mt-4">
      <div class="container">
        <div class="row">
          <div class="col text-center text-uppercase">
            <small>Conoce los</small>
            <h2>Nuevos Lanzamientos</h2>
            <br>
          </div>
        </div>
        <div class="row">
          

                <?php   
                    $myJSON = json_decode($releases);
                    $items = $myJSON->albums->items;

                    foreach($items as $item){
                        echo "
                        
                        <div class='col-12 col-md-6 col-lg-4 mb-4'>
                            <div class='card'>
                            <img class='card-img-top' src='{$item->images[1]->url}' alt='Foto de Sacha'>
                            <div class='card-body'>
                                <div class='badges'>";
                                foreach($item->artists as $artist){
                                echo "<a href='{$artist->external_urls->spotify}'><span class='badge badge-info'>'{$artist->name}'</span></a>&nbsp;";
                                }
                        echo"   </div>
                                <h5 class='card-title'>'{$item->name}'</h5>
                                
                            </div>
                            </div>
                        </div>";

                        
                    }

                        

                    ?>

                </div>
            </div>
    </section>
    <!-- /Speakers -->


</body>
</html>
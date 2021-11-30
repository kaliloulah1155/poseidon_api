<?php
          
    include'OpenWeather.php';

    $place=new OpenWeather('');

   
    $resplace= $place->getPlaceholder(3);
    foreach($resplace as $res_r){
        echo $res_r['id'].'<br/>';
        echo $res_r['title'].'<br/>';
        echo $res_r['body'].'<br/>';
    }
/*
   $data_array =  array(
        "userId"        => 1,
        "title"         => 'toto titi',
        "body"         => 'coco kiki',
   );

   $resplace= $place->postPlaceholder($data_array);
  
   var_dump($resplace);
 */


?>
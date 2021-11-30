<?php 
  include('curllib.php');

  
  ini_set('display_errors', 1);
   $resp=new LibCurl;
  
  //CALL GET METHOD
  /* $response=$resp->getlibCurl('weather?q=Montpellier&appid=03b4732dd5f5de0fbae180bc43d3f4a2');
   

    echo json_encode($response);*/

  //POST METHOD
  
  $data_array =  array(
    "userId"        => 1,
    "title"         => 'toto titi',
    "body"         => 'coco kiki',
  );
  $resplace= $resp->postlibCurl('posts',$data_array);
    echo json_encode($resplace);
   

  //PUT METHOD
  /*
  $data_array =  array(
    "id"=>1,
    "userId"        => 1,
    "title"         => 'toto tita',
    "body"         => 'coco kika',
  );
  $resput= $resp->putlibCurl('posts/1',$data_array);
  var_dump($resput); */

  //DELETE METHOD
  /*$id = 1;
  $deleteData= $resp->deletelibCurl('posts/'.$id);
  var_dump($deleteData);*/

  
    



?>
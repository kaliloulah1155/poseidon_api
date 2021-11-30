<?php 
  include('curllib.php');

  
  ini_set('display_errors', 1);
   $resp=new LibCurl;
   
  $response=$resp->getlibCurl('weather?q=Montpellier&appid=03b4732dd5f5de0fbae180bc43d3f4a2');

  var_dump($response);
    



?>
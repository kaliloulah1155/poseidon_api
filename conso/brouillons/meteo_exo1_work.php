<?php 
  include('endpoint.php');

  $myip=new Ipconfig;

  $adresseip=$myip->apiAdress();

  // phpinfo();


   $curl=curl_init($adresseip.'weather?q=Montpellier&appid=03b4732dd5f5de0fbae180bc43d3f4a2');
//permet de charger une certification
//$curl_setopt($curl,CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPERATOR.'cert.cer');
//desactivation des certification SSL si false
//curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
//permet de ne pas afficher le resultat dans le navigateur
//curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

//on fait les appels setopt en 1 comme :
curl_setopt_array($curl,[
   CURLOPT_SSL_VERIFYPEER=>false,
   CURLOPT_RETURNTRANSFER=>true,
   CURLOPT_TIMEOUT=>1000, //en milliseconde
   CURLOPT_HTTPHEADER=>[
      'Content-Type: application/json'
   ],
   CURLOPT_HTTPAUTH=>CURLAUTH_BASIC
]);

$data=curl_exec($curl);


if($data==false){
    var_dump(curl_error($curl));
}else{
    if(curl_getinfo($curl,CURLINFO_HTTP_CODE)){ //obtient le code de l'erreur

       $data=json_decode($data,true);  //get data like table (array)
       
       echo 'Il fait '. htmlentities($data['main']['temp'].' °', ENT_QUOTES, "UTF-8").'C';

    }

}
curl_close($curl);




?>
<?php
include('endpoint.php');

class LibCurl{

    public $datas; 
 

    //GET METHOD
   public function getlibCurl(string $url):?array{

        $myip=new Ipconfig;
        $adresseip=$myip->apiAdress();

        $curl=curl_init($adresseip."{$url}");
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_TIMEOUT,1000);
        curl_setopt($curl,CURLOPT_HTTPHEADER,[
            'Content-Type: application/json'
         ]);
        $data=curl_exec($curl);

        $result=[];
        if($data==false){
            var_dump(curl_error($curl));
        }else{
            if(curl_getinfo($curl,CURLINFO_HTTP_CODE)==200){
                $data=json_decode($data,true);
                $result=$data;
            }
        }
        curl_close($curl);
       return  $result;
            
   }



}
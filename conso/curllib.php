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

   //POST METHOD
    function postlibCurl(string $url,array $dataString):?array{
       /* $myip=new Ipconfig;
        $adresseip=$myip->apiAdress();*/
        $adresseip='https://jsonplaceholder.typicode.com/';

        $curl=curl_init($adresseip."{$url}");
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_TIMEOUT,1000);
        curl_setopt($curl,CURLOPT_HTTPHEADER,[
            'cache-control: no-cache',
            'Content-Type: application/json'
         ]);
         curl_setopt($curl, CURLOPT_POST,1);
         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataString));
         curl_setopt($curl, CURLINFO_HEADER_OUT, true);
         curl_setopt($curl, CURLOPT_VERBOSE, 1);
        $data=curl_exec($curl);
        $result=[];
        if($data==false){
            var_dump(curl_error($curl));
        }else{
                $data=json_decode($data,true);
                $result=$data;
        }
        curl_close($curl);
       return  $result;
    }

    //PUT METHOD
    function putlibCurl(string $url,array $dataString):?array{
        /* $myip=new Ipconfig;
         $adresseip=$myip->apiAdress();*/
         $adresseip='https://jsonplaceholder.typicode.com/';
 
         $curl=curl_init($adresseip."{$url}");
         curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
         curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curl,CURLOPT_TIMEOUT,1000);
         curl_setopt($curl,CURLOPT_HTTPHEADER,[
             'cache-control: no-cache',
             'Content-Type: application/json'
          ]);
          curl_setopt($curl, CURLOPT_POST,1);
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"PUT");
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataString));
          curl_setopt($curl, CURLINFO_HEADER_OUT, true);
          curl_setopt($curl, CURLOPT_VERBOSE, 1);
         $data=curl_exec($curl);
         $result=[];
         if($data==false){
             var_dump(curl_error($curl));
         }else{
                 $data=json_decode($data,true);
                 $result=$data;
         }
         curl_close($curl);
        return  $result;
     }

     //DELETE METHOD
    function deletelibCurl(string $url):?string{
        /* $myip=new Ipconfig;
         $adresseip=$myip->apiAdress();*/
         $adresseip='https://jsonplaceholder.typicode.com/';
 
         $curl=curl_init($adresseip."{$url}");
         curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
         curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curl,CURLOPT_TIMEOUT,1000);
         curl_setopt($curl,CURLOPT_HTTPHEADER,[
             'cache-control: no-cache',
             'Content-Type: application/json'
          ]);
         // curl_setopt($curl, CURLOPT_POST,1);
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($curl, CURLOPT_POSTFIELDS, $id);
          curl_setopt($curl, CURLINFO_HEADER_OUT, true);
          curl_setopt($curl, CURLOPT_VERBOSE, 1);
         $data=curl_exec($curl);
         $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
         curl_close($curl);
        return  $httpCode;
     }









//fin
}
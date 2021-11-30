<?php
 include('endpoint.php');
//03b4732dd5f5de0fbae180bc43d3f4a2
class OpenWeather{
    private $apiKey;
    

    public function __construct(string $apiKey){
         $this->apiKey=$apiKey;
          
    }

    public function getForecast(string $city):?array{
         $myip=new Ipconfig;
         $adresseip=$myip->apiAdress();
         $url=$adresseip."forecast?q={$city}&appid={$this->apiKey}&lang=fr";
        
         $get_data = $this->callAPI('GET', $url, false);


         $results=[];
         $res=json_decode($get_data,true);
         foreach($res['list']as $day){
             $results[]=[
                'temp'=>$day['dt'],
                'description'=>$day['weather'][0]['description'],
                'date'=>new DateTime('@'.$day['dt'])
             ];
         } 
         return $results;
    }

    public function getPlaceholder(int $id):?array{
 
         $url="https://jsonplaceholder.typicode.com/posts/{$id}";

         $get_data = $this->callAPI('GET', $url, false);
         $res=json_decode($get_data,true);

         $results=[];
         
            $results[]=[
               'id'=>$res['id'],
               'title'=>$res['title'],
               'body'=>$res['body']
            ];
        
         return  $results;

    }

    public function postPlaceholder(array $postdata):?array{
 
        $url="https://jsonplaceholder.typicode.com/posts";

        $get_data = $this->callAPI('POST', $url, json_encode($postdata));
        $res=json_decode($get_data,true);

        /*$results=[];
        
           $results[]=[
              'id'=>$res['id'],
              'title'=>$res['title'],
              'body'=>$res['body']
           ];*/
       
        return  $res;

   }


    //les methodes private sont les dernieres fonctions
    //if $data existe format like this json_encode($data_array)
    public function callAPI($method, $url, $data){

        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          // 'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result_curl = curl_exec($curl);

        if(curl_exec($curl) === false)
        {
            echo 'Erreur Curl : ' . curl_error($ch);
        }
        else
        {
            echo "L\'opération s\'est terminée sans aucune erreur";
        }
        curl_close($curl);
        return $result_curl;
    }



}

?>
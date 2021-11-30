<?php
class Ipconfig{
    public $ip ='';
   public function apiAdress(){

    $this->ip='https://api.openweathermap.org/data/2.5/';
   	    return $this->ip;

   }
}
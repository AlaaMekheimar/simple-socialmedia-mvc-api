<?php

namespace MVC\api\v1\core;
class app{
    private $api;
    private $v1;
    private $controller;
    private $method;
    private $param=[];
     function __construct()
     {
        $this->url();
        $this->render();
     }
    private function url(){
           if(!empty($_SERVER['QUERY_STRING'])){
              $url = explode("/",$_SERVER['QUERY_STRING']);
              $this->api = isset($url[0])? $url[0]:"error";
            
              $this->v1 = isset($url[1])? $url[1]:"not found";
              $this->controller = isset($url[2])? $url[2]."controller":"not found";
              $this->method = isset($url[3])? $url[3]:"not found";

              unset($url[0],$url[1],$url[2],$url[3]);
              $this->param = array_values($url);

           }
     }
     private function render(){
        $this->api= API;
        $this->v1= V1;
           if(file_exists($this->api)){
              if(file_exists($this->v1)){
                $controller = "MVC\api\\v1\\controllers\\".$this->controller;
             
                if(class_exists($controller)){
                   $controller = new $controller;
                   if(method_exists($controller,$this->method)){
                       call_user_func_array([$controller,$this->method],$this->param);
                   }else{
                    echo "method not exist";
                   }
                }else{
                    echo "class not exist";
                }
              }else{
                echo "version not exist";
              }
           }else{
               echo "file not exist";
           }
     }
}
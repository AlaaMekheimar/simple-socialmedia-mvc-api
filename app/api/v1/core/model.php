<?php
   
namespace MVC\api\v1\core;

use Dcblogdev\PdoWrapper\Database;
class model{
    protected function connection(){
       
        $options = [
            'username' => 'root',
            'database' => 'social',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];
        
        return new Database($options);
      
    }
   
}
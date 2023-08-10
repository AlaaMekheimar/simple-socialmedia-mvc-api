<?php

namespace MVC\api\v1\controllers;
use MVC\api\v1\models\usermodel;

class usercontroller{
     private $objModel;
     function __construct()
     {
          $this->objModel= new usermodel();
     }// end construct

     function register(){
          header('Access-Control-Allow-Method: POST');
          if($_SERVER['REQUEST_METHOD']=='POST'){
               $data= file_get_contents("php://input");
               $data_de=json_decode($data,true);
               $res=$this->objModel->register($data_de);
               if($res){
                    
                    http_response_code(200);
                    $res =[
                        'status'=> 200,
                        'msg' => "user inserted"
                   ];
                }else{
                    http_response_code(400);
                    $res =[
                        'status'=> 400,
                        'msg' => "error"
                   ];
                }
                echo json_encode($res);
                }

          }//end register

          function login() {
               header('Access-Control-Allow-Methods: GET');
               
               if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                   $data = file_get_contents("php://input");
                   
                   $data_de = json_decode($data, true);
                    $email = $data_de['email'];
                    $password =$data_de['password'];
                   $res = $this->objModel->login($email,$password);
                   
                   if ($res) {
                       http_response_code(200);
                       
                       $res = [
                           'status' => 200,
                           'data' => $res
                       ];
                   } else {
                       http_response_code(400);
                       
                       $res = [
                           'status' => 400,
                           'msg' => "error"
                       ];
                   }
                   
                   echo json_encode($res);
               }
           }//end login

    function update(){
        header('Access-Control-Allow-Method: PUT');
        if($_SERVER['REQUEST_METHOD']=='PUT'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $data = $data_de['info'];
           $res= $this->objModel->update($data,$id);
            if($res){
                http_response_code(201);
                $res =[
                    'status'=> 201,
                    'msg' => "user update"
               ];
            }else{
                http_response_code(400);
                $res =[
                    'status'=> 400,
                    'msg' => "error"
               ];
            }
            echo json_encode($res);
            }
    }//end update

    function deleteUser(){
        header('Access-Control-Allow-Method: DELETE');
        if($_SERVER['REQUEST_METHOD']=='DELETE'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $res= $this->objModel->deleteUser($id);
            if($res){
                http_response_code(201);
                $res =[
                  
                    'status'=> 201,
                    'msg' => "user deleted"
               ];
            }else{
                http_response_code(400);
                $res =[
                    'status'=> 400,
                    'msg' => "error"
               ];
            }
            echo json_encode($res);
            }
    }//end deletePost
   
}//end class
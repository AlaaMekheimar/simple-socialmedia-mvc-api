<?php

namespace MVC\api\v1\controllers;
use MVC\api\v1\models\postmodel;
class postcontroller{
    private $obj;
     function __construct()
     {
        $this->obj = new postmodel;
     }//end construct

     function addPost(){
        header('Access-Control-Allow-Method: POST');
        if($_SERVER['REQUEST_METHOD']=='POST'){
             $data= file_get_contents("php://input");
             $data_de=json_decode($data,true);
             $res=$this->obj->insertPost($data_de);
             if($res){
                  http_response_code(200);
                  $res =[
                      'status'=> 200,
                      'msg' => "post inserted"
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

        }// end add post

    function selectPost(){
        header('Access-Control-Allow-Method: GET');
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data= $this->obj->selectPost();
            http_response_code(200);
            $res =[
                 'status'=> 200,
                 'data' => $data
            ];
            echo json_encode($res);
        }
    }//end selectpost
    function updatePost(){
        header('Access-Control-Allow-Method: PUT');
        if($_SERVER['REQUEST_METHOD']=='PUT'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $data = $data_de['post'];
           $res= $this->obj->updatePost($data,$id);
            if($res){
                http_response_code(201);
                $res =[
                    'status'=> 201,
                    'msg' => "post update"
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
    }// updatepost
   
    function deletePost(){
        header('Access-Control-Allow-Method: DELETE');
        if($_SERVER['REQUEST_METHOD']=='DELETE'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $res= $this->obj->deletePost($id);
            if($res){
                http_response_code(201);
                $res =[
                  
                    'status'=> 201,
                    'msg' => "post deleted"
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
   
     


}
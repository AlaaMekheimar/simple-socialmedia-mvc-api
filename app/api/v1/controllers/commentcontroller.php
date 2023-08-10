<?php

namespace MVC\api\v1\controllers;

use MVC\api\v1\models\commentmodel;

class commentcontroller{
    private $obj;
     function __construct()
     {
        $this->obj = new commentmodel;
     }//end construct

     function addComment(){
        header('Access-Control-Allow-Method: POST');
        if($_SERVER['REQUEST_METHOD']=='POST'){
             $data= file_get_contents("php://input");
             $data_de=json_decode($data,true);
             $res=$this->obj->insertComment($data_de);
             if($res){
                  http_response_code(200);
                  $res =[
                      'status'=> 200,
                      'msg' => "comment inserted"
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

        }// end addComment

    function selectComment(){
        header('Access-Control-Allow-Method: GET');
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data= $this->obj->selectComment();
            http_response_code(200);
            $res =[
                 'status'=> 200,
                 'data' => $data
            ];
            echo json_encode($res);
        }
    }//end selectComment
    function updateComment(){
        header('Access-Control-Allow-Method: PUT');
        if($_SERVER['REQUEST_METHOD']=='PUT'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $data = $data_de['comment'];
           $res= $this->obj->updateComment($data,$id);
            if($res){
                http_response_code(201);
                $res =[
                    'status'=> 201,
                    'msg' => "comment update"
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
    }//end updateComment

    function deleteComment(){
        header('Access-Control-Allow-Method: DELETE');
        if($_SERVER['REQUEST_METHOD']=='DELETE'){
            $data= file_get_contents("php://input");
            $data_de=json_decode($data,true);
            $id=$data_de['id'];
            $res= $this->obj->deleteComment($id);
            if($res){
                http_response_code(201);
                $res =[
                  
                    'status'=> 201,
                    'msg' => "comment deleted"
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
    }//end deleteComment
   
     


}


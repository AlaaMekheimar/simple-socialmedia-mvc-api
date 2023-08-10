<?php

namespace MVC\api\v1\models;
use MVC\api\v1\core\model;

class usermodel extends model{
     public function register($data){
        $db = parent::connection()->insert('user', $data);
        return $db;
     }//end register

    public function login($email,$password) {
        $db = parent::connection()->row("SELECT * FROM user WHERE email = ? AND password = ?", [$email,$password]);
        return $db;
    }//end login

    public function deleteUser($id) {
        parent::connection()->deleteByIds('post','user_id',$id);
        return parent::connection()->deleteById('user',$id);
     }//end delete 

    public function update($data,$id){
       $db = parent::connection()->update('user', $data , ['id' => $id]);
       return $db;
    }//end update
}
<?php

namespace MVC\api\v1\models;
use MVC\api\v1\core\model;

class commentmodel extends model{
    
    function insertComment($data){
       $db= parent::connection()->insert('comment', $data);
       return $db;

    }//end insertPost

    public function selectComment() {
        $db = parent::connection()->rows("SELECT * FROM comment");
        return $db;
    }//end selectPost

    public function deleteComment($id) {
        $db = parent::connection()->delete('comment', ['id'=>$id]);
        return $db;
    }//end delete
    
    public function updateComment($data,$id){
       $db = parent::connection()->update('comment', $data , ['id' => $id]);
       return $db;
    }//end update
}
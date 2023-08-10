<?php

namespace MVC\api\v1\models;
use MVC\api\v1\core\model;

class postmodel extends model{
    
    function insertPost($data){
       $db= parent::connection()->insert('post', $data);
       return $db;

    }//end insertPost

    public function selectPost() {
        $db = parent::connection()->row("SELECT * FROM post");
        return $db;
    }//end selectPost

    public function deletePost($id) {
       parent::connection()->deleteByIds('comment','post_id',$id);
       return parent::connection()->deleteById('post',$id);
    }//end delete 

    public function updatePost($data,$id){
       $db = parent::connection()->update('post', $data , ['id' => $id]);
       return $db;
    }//end update


}
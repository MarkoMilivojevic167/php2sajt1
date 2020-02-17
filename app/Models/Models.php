<?php
namespace App\Models;


class Models{
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function errorDB($error){
        return $this->db->insertDbErorr($error);
    }


}
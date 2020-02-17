<?php
namespace App\Models;


class Contact{
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function insertContact($name,$email,$phone,$text){
        return $this->db->insert("INSERT INTO contact (name,email,phone,text) VALUES(?, ?, ?,?)",[$name,$email,$phone,$text]);
    }
}
<?php
namespace App\Models;


class Users {
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function getUser($email,$password){
        return  $this->db->executeOneRow("SELECT idUsers,Name,lastName,email,idUserLevel FROM users WHERE email = ? and password=MD5(?)",[$email,$password]);
    }

    public function insert($name,$lastname,$email,$password,$level){
        return $this->db->insert("INSERT INTO users (Name,lastName,email,password,idUserLevel) VALUES(?, ?, ?,MD5(?),?)",[$name,$lastname,$email,$password,$level]);
    }

    public function getOneUser($id){
        return $this->db->executeOneRow("SELECT idUsers, u.Name as name, lastName, email, l.name as level FROM users u INNER JOIN userlevel l ON u.idUserLevel=l.idUserLevel WHERE u.idUsers=?",[$id]);
    }

    public function getReservation($id){
        return $this->db->executeQuery("SELECT r.Indication,r.dateReservation,tr.name as timereservation,pn.name as peoplenumber FROM reservation r INNER JOIN timereservation tr ON r.idTime=tr.idTimeReservation INNER JOIN peoplenumber pn ON r.idPeopleNumber=pn.idPeople WHERE r.idUsers=$id");
    }

    public function timeReservation(){
        return $this->db->executeQuery("SELECT idTimeReservation,name from timereservation");
    }

    public function peopleNumber(){
        return $this->db->executeQuery("SELECT idPeople,name from peoplenumber");
    }

}
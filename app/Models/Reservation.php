<?php
namespace App\Models;


class Reservation{
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function insertReservation($indication, $dataTime,$idUser,$time,$people){
        return $this->db->insert("INSERT INTO reservation(indication,dateReservation,idUsers,idTime,idPeopleNumber) Values(?,?,?,?,?)",[$indication, $dataTime,$idUser,$time,$people]);
    }
    public function timeReservation(){
        return $this->db->executeQuery("SELECT idTimeReservation,name from timereservation");
    }

    public function peopleNumber(){
        return $this->db->executeQuery("SELECT idPeople,name from peoplenumber");
    }
}
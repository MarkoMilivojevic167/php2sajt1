<?php
namespace App\Controllers;
use App\Models\Reservation;
use PDOException;

class ReservationController extends Controller{
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertReservation($request){
        if(isset($request['sendReservation'])){
           try{
            $reservation = new Reservation($this->db);
            $idUser=$_SESSION['user']->idUsers;
            $indication=$request['indication'];
            $time=$request['time'];
            $people=$request['people'];
            $dataTime=$request['dataTime'];

            $errors = [];

            if($time==0){
                $errors[] = "time is not ok";
            }
            if($people==0){
                $errors[] = "people is not ok";
            }
            if(count($errors) > 0){
                $_SESSION['regError'] = $errors;
                $this->redirect("home");

            }else{

                $result=$reservation->insertReservation($indication,$dataTime,$idUser,$time,$people,);
                $this->code(200);
                $this->redirect("user");
            }
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
        }
    }


}
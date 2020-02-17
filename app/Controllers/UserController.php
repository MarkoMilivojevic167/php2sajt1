<?php
namespace App\Controllers;
use App\Models\Users;
use PDOException;

class UserController extends Controller{
    private $db;

    public function __construct($db){
        $this->db=$db;
    }

    public function getUser(){
        $id=$_SESSION['user']->idUsers;
        if(isset($id)){
            if($this->userLevelUser()){
                try{
                    $user=new Users($this->db);
                    $oneUser=$user->getOneUser($id);
                    $reservation=$user->getReservation($id);
                    $timeReservation=$user->timeReservation();
                    $peopleNumber=$user->peopleNumber();
                    $this->data['timereservation']=$timeReservation;
                    $this->data['peoplenumber']=$peopleNumber;
                    $this->data['reservation']=$reservation;
                    $this->data['userpage']=$oneUser;
                    $this->loadView("user",$this->data);
                    $this->userLevelUser();
                    $this->code(200);
                }catch(PDOException $e){
                    $this->errorDB($e->getMessage());
                    $this->code(404);
                }
            }else{
                $this->redirect("home");
            }
        }else{
            $this->redirect("home");
        }

    }

}
<?php
namespace App\Controllers;
use App\Models\Contact;

use PDOException;

class ContactController extends Controller{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function sendContact($request){
        if(isset($request['sendContact'])){
            $contact = new Contact($this->db);
            $name=$request['name'];
            $email=$request['email'];
            $phone=$request['phone'];
            $text=$request['text'];

            $errors = [];
            $reName="/^[A-ZŽŠĐČĆ][a-zžšđčć]{1,30}\s[A-ZŽŠĐČĆ][a-zžšđčć]{1,30}$/";
            $rePhone ="/^[0-9]*$/";

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email is not ok!";
            }
            if(!preg_match($reName, $name)){
                $errors[] = "Name is not ok";
            }
            if(!preg_match($rePhone, $phone)){
                $errors[] = "Phone is not ok";
            }
            if($text==""){
                $errors[] = "Text is not ok";
            }
    
            if(count($errors) > 0){
                $_SESSION['regError'] = $errors;

            }else{
                try{

                    $rez=$contact->insertContact($name,$email,$phone,$text);
                    $this->redirect("contact");
                }catch(PDOException $e){
                    $this->errorDB($e->getMessage());
                    $this->redirect("404");
                }

            }
                
        }else{
            
        }
    }



}

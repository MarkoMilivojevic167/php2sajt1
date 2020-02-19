<?php
namespace App\Controllers;
use App\Models\Users;
use PDOException;

class RegistrationController extends Controller{
    
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function registration($request){
        if(isset($request['registration'])){
            $users= new Users($this->db);
            $name=$request['regName'];
            $lastName=$request['regLastName'];
            $email=$request['regEmail'];
            $password=$request['regPassword'];
            $repeatPassword=$request['repeatPassword'];

            $errors = [];
            $reLozinka ="/^(?=.*\d)(?=.*[A-zČĆŽŠĐčćžšđ])(?=.*[~!@#$%^&*<>?]).{6,}$/";
            $reIme="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/";
            $rePrezime="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{1,14})*$/";

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email is not ok.";
            }
            if(!preg_match($reIme, $name)){
                $errors[] = "Name is not ok";
            }
            if(!preg_match($rePrezime, $lastName)){
                $errors[] = "Last Name is not ok";
            }
            if(!preg_match($reLozinka, $password)){
                $errors[] = "Password is not ok";
            }
            if($password!=$repeatPassword){
                $errors[]="Password is not ok";
            }
    
            if(count($errors) > 0){
                $_SESSION['regError'] = $errors;

            }else{
                try{

                    $user=$users->insert($name,$lastName,$email,$password,$level=1);
                    $results=$users->getUser($email,$password);

                }catch(PDOException $e){
                    $this->errorDB($e->getMessage());
                    $this->redirect("404");
                }

                if($results){
                    $_SESSION['user']=$results;
                    $this->redirect("user");
                }else{
                    $this->redirect("home");
                    $_SESSION['loginError']="User is not registred";
                }

            }
                
        }else{
            $this->code(404);
        }
    }



}

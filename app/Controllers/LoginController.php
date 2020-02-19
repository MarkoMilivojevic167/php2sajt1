<?php
namespace App\Controllers;
use App\Models\Users;
use PDOException;

class LoginController extends Controller{

    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function login($request){
        if(isset($request['login'])){
            $users= new Users($this->db);
            $email=$request['loginEmail'];
            $password=$request['loginPassword'];

            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['loginError']= "Email is not ok!";
            }else{
                
                try{
                    $user=$users->getUser($email,$password); 
                }catch(PDOException $e){
                    $this->errorDB($e->getMessage());
                    $this->redirect("404");
                }

                if($user){
                    $_SESSION['user']=$user;
                    if($user->idUserLevel==1){
                        $this->code(200);
                        $this->redirect("user");
                    }else{
                        $this->redirect("administrator");
                    }
                }else{
                    $this->redirect("loginRegistration");
                    $_SESSION['loginError']="User is not registred";
                }
            }
                
        }else{
            $this->code(404);
        }
    }

    public function logout() {
        $_SESSION["user"] = null;
        $this->redirect("home");
    }


}

<?php 
namespace App\Controllers;
use App\Models\Models;

class Controller {

    private $db;

    public function __construct($db) {
        $this->db = $db;
        
        
    }

    protected function loadView($view, $data=[]) {
        extract($data);
        require_once 'app/Views/Fixed/head.php';
        require_once 'app/Views/Fixed/header.php';
        require_once 'app/Views/Pages/' . $view . ".php";
        require_once 'app/Views/Fixed/footer.php';
    }


    protected function redirect($page) {
        \header("Location: index.php?page=".$page);
    }

    protected function json($data = null, $statusCode = 200) {
        \header("content-type: application/json");
        \http_response_code($statusCode);
        echo \json_encode($data);
    }

    protected function code($code){
        \http_response_code($code);
    }

    protected function errorDB($error){
        $model=new Models($this->db);
        $model->errorDB($error);
    }

    protected function userLevelAdministrator(){
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];
            if($user->idUserLevel==1){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    protected function userLevelUser(){
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];
            if($user->idUserLevel!=1 && $user->idUserLevel!=2){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

}
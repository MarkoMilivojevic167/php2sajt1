<?php
namespace App\Controllers;

class PageController extends Controller{


    


    public function home(){   
        $this->loadView("home");
    }
    public function author(){
        $this->loadView("author");
    }
    public function contact(){
        $this->loadView("contact");
    }
    public function error($error){
        $this->data['error']=$error;
        $this->loadView("error",$this->data);
    }
    public function loginRegistration(){
        $this->loadView("loginRegistration");
    }



    
}
<?php
namespace App\Controllers;
use App\Models\Admin;
use PDOException;

class AdminController extends Controller{
    private $db;

    public function __construct($db){
        $this->db=$db;
    }

    public function addProducts($request){
        if(isset($request['addProduct'])){
            $admin = new Admin($this->db);
            $productName=$request['productName'];
            $price=$request['productPrice'];
            $category=$request['productCategory'];
            $user=$request['user'];
            $alt=$request['alt'];
            $productsText=$request['productsText'];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $formats = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
            $errors = [];
            $rePrice ="/^[0-9]*$/";

            if(!preg_match($rePrice, $price)){
                $errors[] = "Price is not ok";
            }
            if($category==0){
                $errors[] = "Category is not ok";
            }
            if(!in_array($file_type,$formats)){
                $errors[] = "Type is not ok";
            }
            if($productsText==""){
                $errors[] = "Text is not ok";
            }
            if($productName==""){
                $errors[] = "Name is not ok";
            }
            if($file_size > 3000000){
                $errors[] = "Size is not ok";
            }
    
            if(count($errors) > 0){
                $_SESSION['regError'] = $errors;

            }else{

                list($width, $height) = getimagesize($file_tmp);
            
                $curentImages = null;
                switch($file_type){
                    case 'image/jpeg':
                        $curentImages = imagecreatefromjpeg($file_tmp);
                        break;
                    case 'image/png':
                        $curentImages = imagecreatefrompng($file_tmp);
                        break;
                }
        
                $newWidth = 1563;
                $newHeight = 1600; 
        
                $newImages = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresampled($newImages, $curentImages, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                $name = time().$file_name;
                $pathNewImage = 'app/Assets/Images/users/nova_'.$name;
        
                switch($file_type){
                    case 'image/jpeg':
                        imagejpeg($newImages, $pathNewImage, 90);
                        break;
                    case 'image/png':
                        imagepng($newImages, $pathNewImage);
                        break;
                }
        
                $pathOriginalImages = 'app/Assets/Images/users/'.$name;
        
                if(move_uploaded_file($file_tmp, $pathOriginalImages)){

                    try{
                    $rez=$admin->insertProducts($productName,$price,$productsText,$category,$user);

                    $getLastId=$admin->getLastId();
                    $insertImage=$admin->insertImages($getLastId,$pathNewImage,$pathOriginalImages,$alt);

                    $admin->crudActivity('products','Insert');
                    $this->code(200);
                    }catch(PDOException $e) {
                        $this->errorDB($e->getMessage());
                        $this->code(404);
                    }
                    
                }
            }
                
        }else{
            
        }
    }
    public function adminPage() {
        try{
            if($this->userLevelAdministrator()){
            $admin = new Admin($this->db);
            $file=$admin->getLogFile();
            $crud=$admin->getCrud();
            $users=$admin->getUsers(); 
            $contact=$admin->getContact(); 
            $product=$admin->getProduct(); 
            $category=$admin->getCategory(); 
            $reservation=$admin->getReservation();
            $this->data['reservation']=$reservation;
            $this->data['log']=$file;
            $this->data['crud']=$crud;
            $this->data['users']=$users;
            $this->data['contact']=$contact;
            $this->data['products']=$product;
            $this->data['category']=$category;
            $this->loadView("administrator",$this->data);
            $this->code(200);
            
            }else{
                $this->redirect("home");
            }
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function getAjaxUser(){
        try{
            $admin= new Admin($this->db);
            $users=$admin->getUsers();
            $this->data['users']=$users;
            $this->json($this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function deleteAjaxUser(){
        if(isset($_POST['id'])){
            try{
                $id=$_POST['id'];
                $admin= new Admin($this->db);
                $user=$admin->deleteUsers($id);
                $admin->crudActivity('users','Delete');
                $this->code(200);
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }

    public function getAjaxProduct(){
        try{
            $admin= new Admin($this->db);
            $product=$admin->getProduct();
            $this->data['product']=$product;
            $this->json($this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function deleteAjaxProduct(){
        if(isset($_POST['id'])){
            try{
                $id=$_POST['id'];
                $admin= new Admin($this->db);
                $images=$admin->deleteImages($id);
                $product=$admin->deleteProduct($id);
                $admin->crudActivity('products','Delete');
                $this->code(200);
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }

    
    public function getAjaxContact(){
        try{
            $admin= new Admin($this->db);
            $contact=$admin->getContact();
            $this->data['contact']=$contact;
            $this->json($this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function deleteAjaxContact(){
        if(isset($_POST['id'])){
            try{
                $admin= new Admin($this->db);
                $id=$_POST['id'];
                $contact=$admin->deleteContact($id);
                $admin->crudActivity('contact','Delete');
                $this->code(200);
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }

    public function getAjaxReservation(){
        try{
            $admin= new Admin($this->db);
            $reservation=$admin->getReservation();
            $this->data['reservation']=$reservation;
            $this->json($this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function deleteAjaxReservation(){
        if(isset($_POST['id'])){
            try{
                $admin= new Admin($this->db);
                $id=$_POST['id'];
                $reservation=$admin->deleteReservation($id);
                $admin->crudActivity('reservation','Delete');
                $this->code(200);
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }


    public function getEditUsers($id){
        try{
            $admin= new Admin($this->db);
            $user=$admin->getOneUser($id);
            $userLevel=$admin->userLevel();
            $this->data['userLevel']=$userLevel;
            $this->data['oneUser']=$user;
            $this->loadView("editUser",$this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function editUser($request){
        $admin = new Admin($this->db);
        if(isset($request['editUser'])){
            $id=$request['id'];
            $name=$request['name'];
            $lastName=$request['lastName'];
            $email=$request['email'];
            $level=$request['level'];

            try{
                $rez=$admin->updateUser($name,$lastName,$email,$level,$id);
                $admin->crudActivity('users','Update');
                $this->code(200);
                $this->redirect("administrator");
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }

    public function getEditProduct($id){
        try{
            $admin= new Admin($this->db);
            $produdct=$admin->getOneProduct($id);
            $category=$admin->getCategory();
            $this->data['categoryProduct']=$category;
            $this->data['editProduct']=$produdct;
            $this->loadView("editProduct",$this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function editProduct($request){
        if(isset($request['editProducts'])){
            $admin = new Admin($this->db);
            $id=$request['id'];
            $name=$request['name'];
            $text=$request['text'];
            $price=$request['price'];
            $category=$request['category'];

            try{
                $rez=$admin->updateProduct($name,$text,$price,$category,$id);
                $admin->crudActivity('products','Update');
                $this->code(200);
                $this->redirect("administrator");

            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        }
    }


}
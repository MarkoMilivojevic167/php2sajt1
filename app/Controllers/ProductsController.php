<?php
namespace App\Controllers;
use App\Models\Products;
use PDOException;

class ProductsController extends Controller{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function page() {
        try{
            $products= new Products($this->db);
            $food=$products->getProduct(1); 
            $drink=$products->getProduct(2); 
            $dessert=$products->getProduct(3); 
            $this->data['food']=$food;
            $this->data['drink']=$drink;
            $this->data['dessert']=$dessert;
            $this->loadView("products",$this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
    }

    public function printAjaxProducts(){
        try{
            $products= new Products($this->db);
            $food=$products->getProduct(1); 
            $drink=$products->getProduct(2); 
            $dessert=$products->getProduct(3); 
            $this->data['food']=$food;
            $this->data['drink']=$drink;
            $this->data['dessert']=$dessert;
            $this->json([$this->data]);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
        
    }
    
    public function oneProduct($id){
        if(isset($id)){
        try{
            $products= new Products($this->db);
            $oneProduct=$products->oneProduct($id);
            $this->data['oneProduct']=$oneProduct;
            $this->loadView("oneProduct",$this->data);
            $this->code(200);
        }catch(PDOException $e){
            $this->errorDB($e->getMessage());
            $this->code(404);
        }
        }else{
            $this->redirect('products');
        }   
    }

    public function filterAjaxProducts(){
        if(isset($_POST['price']) && isset($_POST['value'])){
            try{
                $products= new Products($this->db);
                $price=$_POST['price'];
                $search=$_POST['value'];
                $food=$products->getFilter($price,$search,1); 
                $drink=$products->getFilter($price,$search,2); 
                $dessert=$products->getFilter($price,$search,3); 
                $this->data['food']=$food;
                $this->data['drink']=$drink;
                $this->data['dessert']=$dessert;
                $this->json([$this->data]);
                $this->code(200);
            }catch(PDOException $e){
                $this->errorDB($e->getMessage());
                $this->code(404);
            }
        
        }

      
    }

}

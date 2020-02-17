<?php
session_start();
ob_start();
require_once "app/Config/autoload.php";
require_once "app/Config/database.php";
require_once "app/Config/config.php";


use App\Models\DB;
use App\Controllers\ProductsController;
use App\Controllers\LoginController;
use App\Controllers\RegistrationController;
use App\Controllers\AdminController;
use App\Controllers\ContactController;
use App\Controllers\PageController;
use App\Controllers\ReservationController;
use App\Controllers\UserController;

$db = new DB(SERVER,DB_SERVER, DB_DATABASE, DB_USERNAME, DB_PASSWORD);

$product=new ProductsController($db);
$login = new LoginController($db);
$page= new PageController($db);
$admin = new AdminController($db);
$user=new UserController($db);
$contact = new ContactController($db);
$reg = new RegistrationController($db);
$reservation= new ReservationController($db);




if(isset($_GET['page'])){
    switch($_GET['page']) {
        case "home":
            $page->home();
            exit;
            break;
        case "products":
            $product->page(); 
            exit;
            break;
        case "oneProduct":
            $product->oneProduct($_GET['idProducts']);
            exit;
            break;
        case "loginRegistration":
            $page->loginRegistration();
            exit;
            break;
        case "login":
            $login->login($_POST);
            exit;
            break;
        case "registration":
            $reg->registration($_POST); 
            exit;
            break;
        case "logout":
            $login->logout();
            exit;
            break;
        case "contact":
            $contact->sendContact($_POST);
            $page->contact(); 
            exit;
            break;
        case "administrator":
            $admin->addProducts($_POST);
            $admin->adminPage(); 
            exit;
            break;
        case "delete-ajax-contact":
            $admin->deleteAjaxContact();
            exit;
            break;
        case "get-ajax-contact":
            $admin->getAjaxContact();
            exit;
            break;
        case "delete-ajax-product":
            $admin->deleteAjaxProduct();
            exit;
            break;
        case "get-ajax-product":
            $admin->getAjaxProduct();
            exit;
            break;
        case "delete-ajax-users":
            $admin->deleteAjaxUser();
            exit;
            break;
        case "get-ajax-users":
            $admin->getAjaxUser();
            exit;
            break;
        case "delete-ajax-reservation":
            $admin->deleteAjaxReservation();
            exit;
            break;
        case "get-ajax-reservation":
            $admin->getAjaxReservation();
            exit;
            break;
        case "author":
            $page->author();
            exit;
            break;
        case "print-ajax-products":
            $product->printAjaxProducts();
            exit;
            break;
        case "ajax-products-filter":
            $product->filterAjaxProducts();
            exit;
            break;
        case "edit-user":
            $admin->getEditUsers($_GET['idUser']);
            $admin->editUser($_POST);
            exit;
            break;
        case "edit-product":
            $admin->getEditProduct($_GET['idProducts']);
            $admin->editProduct($_POST);
            exit;
            break;
        case "user":
            $user->getUser();
            exit;
            break;
        case "reservation":
            $reservation->insertReservation($_POST);
            exit;
            break;
        case "400":
            $page->error(400);
            exit;
            break;
        case "401":
            $page->error(401);
            exit;
            break;
        case "301":
            $page->error(301);
            exit;
            break;
        case "403":
            $page->error(403);
            exit;
            break;
        case "404":
            $page->error(404);
            exit;
            break;
        case "500":
            $page->error(500);
            exit;
            break;
        case "503":
            $page->error(503);
            exit;
            break;
    }
}else{
        $page->home();
}





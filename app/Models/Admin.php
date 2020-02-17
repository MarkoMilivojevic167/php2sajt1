<?php
namespace App\Models;


class Admin{
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function insertProducts($productName,$price,$productsText,$category,$user){
        return $this->db->insert("INSERT INTO products (name,price,textProduct,idCategories,idUsers) VALUES(?, ?, ?, ?, ?)",[$productName,$price,$productsText,$category,$user]);
    }

    public function getContact(){
        return $this->db->executeQuery("SELECT idContact,name,email,phone,text from contact");
    }
    public function getProduct(){
        return $this->db->executeQuery("SELECT idProducts, p.name as name, price, c.name as categories FROM products p INNER JOIN categories c ON p.idCategories=c.idCategories");
    }
    public function getCategory(){
        return $this->db->executeQuery("SELECT idCategories, name from categories");
    }
    public function getUsers(){
        return $this->db->executeQuery("SELECT idUsers, u.Name as name, lastName, email, l.name as level FROM users u INNER JOIN userlevel l ON u.idUserLevel=l.idUserLevel");
    }
    public function getOneUser($id){
        return $this->db->executeOneRow("SELECT idUsers, u.Name as name, lastName, email, l.name as level FROM users u INNER JOIN userlevel l ON u.idUserLevel=l.idUserLevel WHERE u.idUsers=?",[$id]);
    }
    public function getLastId(){
        return $this->db->executeOne("SELECT idProducts from products ORDER BY idProducts DESC LIMIT 1")->idProducts;
    }
    public function insertImages($id,$path,$pathOld,$alt){
        return  $this->db->insert("INSERT INTO images (idProducts,path,pathOld,alt) Values(?,?,?,?)",[$id,$path,$pathOld,$alt]);
    }
    public function deleteContact($id){
        return  $this->db->delete("DELETE FROM contact where idContact=?",[$id]);
    }
    public function deleteProduct($id){
        return  $this->db->delete("DELETE FROM products where idProducts=?",[$id]);
    }
    public function deleteImages($id){
        return  $this->db->delete("DELETE FROM images where idProducts=?",[$id]);
    }
    public function deleteUsers($id){
        return  $this->db->delete("DELETE FROM users where idUsers=?",[$id]);
    }
    public function userLevel(){
        return $this->db->executeQuery("SELECT idUserLevel, name from userlevel");
    }
    public function updateUser($name,$lastName,$email,$level,$id){
        return $this->db->update("UPDATE users SET Name= ?, lastName= ?, email= ?, idUserLevel= ? WHERE idUsers= ? ",[$name,$lastName,$email,$level,$id]);
    }
    public function getOneProduct($id){
        return $this->db->executeOneRow("SELECT p.idProducts,textProduct,i.path,i.alt, p.name as name, price, c.name as categories FROM products p INNER JOIN categories c ON p.idCategories=c.idCategories INNER JOIN images i on p.idProducts=i.idProducts WHERE p.idProducts = ?",[$id]);
    }
    public function updateProduct($name,$text,$price,$category,$id){
        return $this->db->update("UPDATE products SET name=?, textProduct=?, price=?,idCategories=? WHERE idProducts=?",[$name,$text,$price,$category,$id]);
    }
    public function crudActivity($tableName,$crud){
        return  $this->db->insert("INSERT INTO activitycrud (name,date,tableName,crud) Values(?,?,?,?)",[$_SESSION['user']->Name." ".$_SESSION['user']->lastName,date("Y/m/d"),$tableName,$crud]);
    }

    public function getLogFile(){
        $open=fopen(LOG_FAJL, "r");
        return $file=file(LOG_FAJL);
    }

    public function getCrud(){
        return $this->db->executeQuery("SELECT name,date,tableName,crud FROM activitycrud");
    }
    public function getReservation(){
        return $this->db->executeQuery("SELECT r.idReservation,u.Name,u.lastName,u.email,r.Indication,r.dateReservation,tr.name as timereservation,pn.name as peoplenumber FROM users u INNER JOIN reservation r ON u.idUsers=r.idUsers INNER JOIN timereservation tr ON r.idTime=tr.idTimeReservation INNER JOIN peoplenumber pn ON r.idPeopleNumber=pn.idPeople");
    }

    public function deleteReservation($id){
        return  $this->db->delete("DELETE FROM reservation where idReservation=?",[$id]);
    }


}
<?php
namespace App\Models;


class Products {
    private $db;

    public function __construct(DB $db){
        $this->db=$db;
    }

    public function getProduct($id){
        return $this->db->executeQuery("SELECT idProducts,name,price,idCategories,idUsers FROM products where idCategories=$id");
    }
    public function oneProduct($id){
        return $this->db->executeOneRow("SELECT p.idProducts,p.name,price,c.idCategories,idUsers,textProduct, i.path,i.alt,c.name as categories FROM products p INNER JOIN images i on p.idProducts=i.idProducts INNER JOIN categories c on p.idCategories=c.idCategories where p.idProducts=?",[$id]);
    }
    public function getFilter($price,$search,$idCategories){
        return $this->db->executeQuery("SELECT idProducts,name,price,idCategories,idUsers FROM products where idCategories=$idCategories and ( price BETWEEN 0 AND $price ) and name LIKE '%$search%'");
    }

}

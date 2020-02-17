<?php

namespace App\Models;

use PDOException;

class DB {
    private $sqlserver;
    private $server;
    private $database;
    private $username;
    private $password;

    public $conn;

    public function __construct($sqlserver,$server, $database, $username, $password){
        $this->sqlserver = $sqlserver;
        $this->server = $server;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password; 

        $this->connect();
        $this->zabeleziPristupStranici();
    }

    private function connect(){
        try{
        $this->conn = new \PDO("{$this->sqlserver}:host={$this->server};dbname={$this->database};charset=utf8", $this->username, $this->password);
        
        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            $this->insertDbErorr($e->getMessage());
        }
    }


    public function executeQuery(string $query){
        return $this->conn->query($query)->fetchAll();
    }
    public function executeOne(string $query){
        return $this->conn->query($query)->fetch();
    }

    public function executeOneRow(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }
    public function insert(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
    }
    public function delete(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);  
    }

    public function insertDbErorr($error){
        $open = fopen(DBERROR, "a");
        if($open){
                fwrite($open, $error."\n");
            fclose($open);
        }
    }

    public function update(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
    }

    function zabeleziPristupStranici(){
        $open = fopen(LOG_FAJL, "a");
        if($open){
            if(isset($_GET['page'])){
                fwrite($open, $_SERVER['PHP_SELF']."\t".$_SERVER['REMOTE_ADDR']."\t".date("Y/m/d")."\t".$_GET["page"]."\n");
            }else{
                fwrite($open, $_SERVER['PHP_SELF']."\t".$_SERVER['REMOTE_ADDR']."\t".date("Y/m/d")."\t"."home"."\n");
            }
    
            fclose($open);
        }
    }
}
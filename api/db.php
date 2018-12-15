<?php

class DB{
    const db_host = "mysql:host=localhost;dbname=serviciosphp";
    const db_user = "root";
    const db_pass = "";
    
    private $pdo;
    
    function __construct(){
        try{
            $this->pdo = new PDO(self::db_host, self::db_user, self::db_pass);
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
    function getConexion():PDO{
        return $this->pdo;
    }
    
    function closeConexion(){
        $this->pdo = null;
    }
}


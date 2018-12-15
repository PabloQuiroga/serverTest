<?php

include_once 'db.php';

class Usuario {
    private $pdo;
    
    function __construct(){
        $conexion = new DB();
        $this->pdo = $conexion->getConexion();
    }

    function obtenerUsuarios(){        
        $query = $this->pdo->query("SELECT * FROM usuarios");
        return $query;
    }
    
    function obtenerUsuario($mail){
        $query = $this->pdo->prepare("SELECT * FROM usuarios WHERE email=?");
        $query->execute([$mail]);
        
        return $query;
    }
    
    function accederUsuario($mail, $pass){
        $query = $this->pdo->prepare("SELECT * FROM usuarios WHERE email=? AND password=?");
        $query->execute([$mail, $pass]);
        
        return $query;
    }
    
    function nuevoUsuario($usuario){
        $query = $this->pdo->prepare("INSERT INTO usuarios (nombre, apellido, email, dni, password)VALUES(?,?,?,?,?)");
        $query->execute([$usuario['nombre'], $usuario['apellido'], $usuario['email'], $usuario['documento'], $usuario['password']]);
        
        return $query;
    }
}

<?php

include_once './apiUsuarios.php';
$api = new apiUsuarios();

if(isset($_POST['nombre']) 
        && isset($_POST['apellido']) 
        && isset($_POST['email']) 
        && isset($_POST['documento']) 
        && isset($_POST['password'])){
    
    $item = array(
        'nombre'=>$_POST['nombre'],
        'apellido'=>$_POST['apellido'],
        'email'=>$_POST['email'],
        'documento'=>$_POST['documento'],
        'password'=>$_POST['password']
    );
    $api->add($item);
    
}else{
    $api->error('Error al ingresar datos');
}


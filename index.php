<?php

include_once './api/apiUsuarios.php';
$api = new apiUsuarios();

if(isset($_GET['mail'])){
    $mail = $_GET['mail'];
    
    if(!empty($mail)){
        $api->getByMail($mail);
    }else{
        $api->error('Los parametros son incorrectos');
    }
    
}else{
    $api->getAll();
}



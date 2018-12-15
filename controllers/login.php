<?php
include_once '../api/apiUsuarios.php';
$api = new apiUsuarios();

if(isset($_POST['InputEmail']) && isset($_POST['InputPassword'])){
    $usuario = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
}else{
    $api->error('Los parametros son incorrectos');
}

#$api->getByMail($usuario);
$api->getLogin($usuario, $password);

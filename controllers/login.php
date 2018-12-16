<?php

include_once '../api/apiUsuarios.php';
$api = new apiUsuarios();

if (isset($_POST['InputEmail']) && isset($_POST['InputPassword'])) {
    $usuario = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
} else {
    $api->error('Los parametros son incorrectos');
}

#$api->getByMail($usuario);
$resultado = $api->getLogin($usuario, $password);
if ($resultado != '') {
    header('Location: ../web/welcome_user.php?param=' .$resultado);
}

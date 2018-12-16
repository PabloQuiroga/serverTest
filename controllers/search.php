<?php

include_once '../api/apiUsuarios.php';
$api = new apiUsuarios();

$resultado = $api->getAll();


function getAll() {
    global $resultado;
    
    //$listado = array();
    $lista = json_decode($resultado);
    foreach ($lista as $row){
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
    
//    echo '<pre>';
//    print_r($resultado);
//    echo '</pre>';
}

function getMail($mail){
    global $api;

    $user = $api->getByMail($mail);
    return $user;
//    echo '<pre>';
//    print_r($user);
//    echo '</pre>';
}

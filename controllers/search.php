<?php

include_once '../api/apiUsuarios.php';
$api = new apiUsuarios();


function getAll() {
    global $api;
    
    $resultado = $api->getAll();
    
    $lista = json_decode($resultado, true);
    foreach ($lista as $row){
        //echo $row['mail'] . '<br>';
        print_r($row);
        echo '<br>';
    }
}

function getMail($mail){
    global $api;

    $user = $api->getByMail($mail);
    return $user;
}

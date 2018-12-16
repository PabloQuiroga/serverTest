<?php
include_once '../controllers/search.php';
$params = $_GET['param'];

$user = getMail($params);
print_r($user); //solo para verlo
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listado</title>
    </head>
    <body>

        <?php
        echo '<h1>Welcome ' . $user['nombre'] . '</h1>';
        getAll();
        ?>
    </body>
</html>
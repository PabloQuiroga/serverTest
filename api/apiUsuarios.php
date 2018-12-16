<?php

include_once 'Usuario.php';

class apiUsuarios {

    function getAll() {
        $usuario = new Usuario();
        $usuarios = array();
        //$usuarios["usuarios"] = array();

        $res = $usuario->obtenerUsuarios();
        if ($res->rowCount()) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'mail' => $row['email'],
                    'dni' => $row['dni']
                );
                //array_push($usuarios['usuarios'], $item);
                $usuarios[] = $item;
            }
            #$this->printJson($usuarios);
            $retorno = json_encode($usuarios);
            return $retorno;
        } else {
            $this->error('No hay elementos');
        }
    }

    function getByMail($mail) {
        $usuario = new Usuario();
        $usuarios = array();
        $usuarios["usuarios"] = array();

        $res = $usuario->obtenerUsuario($mail);
        if ($res->rowCount() == 1) {
            $row = $res->fetch(PDO::FETCH_ASSOC);

            $item = array(
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'mail' => $row['email'],
                'dni' => $row['dni']
            );
            array_push($usuarios['usuarios'], $item);

            #$this->printJson($usuarios);
            $retorno = json_encode($usuarios);
            return $retorno;
        } else {
            $this->error('No hay elementos');
        }
    }

    function getLogin($mail, $pass) {
        $usuario = new Usuario();
        $loggedUser = array();
        $loggedUser["usuario"] = array();

        $res = $usuario->accederUsuario($mail, $pass);
        if ($res->rowCount() == 1) {
            $row = $res->fetch(PDO::FETCH_ASSOC);

            $item = array(
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'mail' => $row['email'],
                'dni' => $row['dni']
            );
            array_push($loggedUser['usuario'], $item);

            //$retorno = json_encode($loggedUser);
            $retorno = $row['email']; #de momento solo ocupo el mail
            return $retorno;
        } else {
            return $this->error('No hay elementos');
        }
    }

    function add($item) {
        $usuario = new Usuario();

        $res = $usuario->nuevoUsuario($item);
        $this->exito('Nuevo usuario registrado');
    }

    function printJson($array): string {
//echo '<code>'. json_encode($array) .'</code>';
        $resultado = json_encode($array);

        //echo $resultado;
        return $resultado;
    }

    function error($mensaje) {
        //echo '<code>' . json_encode(array('Status' => 'Error', 'mensaje' => $mensaje)) . '</code>';
        $retorno = json_encode(array('Status'=>'Error', 'mensaje'=> $mensaje));
        return $retorno;
    }

    function exito($mensaje) {
        echo '<code>' . json_encode(array('Status' => 'Ok', 'mensaje' => $mensaje)) . '</code>';
    }

}

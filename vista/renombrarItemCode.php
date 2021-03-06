<?php
/*este archivo coneta los archivos*/
include '../controlador/ItemControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtUsuario"])) {

        $txtUsuario  = validar_campo ($_POST["txtUsuario"]);
		// $txtUsuario = strtolower ($txtUsuario);
		$id = validar_campo($_POST["txtId"]);
        $resultado = array("estado" => "true");

        if (ItemControlador::renombrar($txtUsuario, $id)) {
           // $usuario             = ItemControlador::getUsuario($txtUsuario, $txtPassword);
          /*  $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "apellido"   => $usuario->getapellido(),
                "privilegio" => $usuario->getPrivilegio(),
            );*/
            setcookie("renombraritemtrue","true");
            return print(json_encode($resultado));
        }

    }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

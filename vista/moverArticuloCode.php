<?php
/*este archivo coneta los archivos*/
include '../controlador/InvetarioControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';
session_start();
header('Content-type: application/json');
$resultado = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtId"]) && isset($_POST["txtId_item"])) {
    $txtId  = validar_campo ($_POST["txtId"]);
    //$txtNombre  = validar_campo ($_POST["txtNombre"]);
  //  $txtDescricion = validar_campo($_POST["txtDescricion"]);
  //  $txtNota = validar_campo($_POST["txtNota"]);
    $txtId_item = validar_campo($_POST["txtId_item"]);
		//$txtAsociacion = validar_campo($_POST["txtAsociacion"]);
  //  $foto = "";
    $resultado = array("estado" => "true");
        if (InvetarioControlador::mover($txtId, $txtId_item)) {
           // $usuario             = InvetarioControlador::getUsuario($txtUsuario, $txtPassword);
          /*  $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "apellido"   => $usuario->getapellido(),
                "privilegio" => $usuario->getPrivilegio(),
            );*/
            setcookie("moverArticulotrue","true");
            return print(json_encode($resultado));
        }

    }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

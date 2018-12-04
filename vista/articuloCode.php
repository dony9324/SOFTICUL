<?php
/*este archivo coneta los archivos*/
include '../controlador/InvetarioControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';
session_start();
header('Content-type: application/json');
$resultado = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtDescricion"]) && isset($_POST["txtNota"])) {

    $txtNombre  = validar_campo ($_POST["txtNombre"]);
    $txtDescricion = validar_campo($_POST["txtDescricion"]);
    $txtNota = validar_campo($_POST["txtNota"]);
    $txtFecha  = ($_POST["fecha_adquisicion"]);
    $txtId_item = validar_campo($_POST["txtId_item"]);
		$txtAsociacion = validar_campo($_POST["txtAsociacion"]);
    $foto = "";
    $resultado = array("estado" => "true");

        if (InvetarioControlador::registrar($txtNombre, $txtDescricion, $txtNota, $txtFecha, $foto, $txtId_item, $txtAsociacion)) {
           // $usuario             = InvetarioControlador::getUsuario($txtUsuario, $txtPassword);
          /*  $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "apellido"   => $usuario->getapellido(),
                "privilegio" => $usuario->getPrivilegio(),
            );*/
            return print(json_encode($resultado));
        }

    }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

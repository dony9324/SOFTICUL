<?php
/*este archivo coneta los archivos*/
include '../controlador/PersonaControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';
session_start();
header('Content-type: application/json');
$resultado = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["txtNombre"])) {

    $txtNombre  = validar_campo ($_POST["txtNombre"]);
    $txtApellidos = validar_campo($_POST["txtApellidos"]);
    $txtidentificacion = validar_campo($_POST["txtidentificacion"]);
    $txtemail = validar_campo($_POST["txtemail"]);
    $txtdireccion = validar_campo($_POST["txtdireccion"]);
    $txtcell = validar_campo($_POST["txtcell"]);
    $txtAsociacion = validar_campo($_POST["txtAsociacion"]);
    $foto = "";
    $resultado = array("estado" => "true");

    if (PersonaControlador::registrar($txtNombre, $txtApellidos, $txtidentificacion, $txtemail, $txtdireccion, $txtcell, $txtAsociacion, $foto)) {
      // $usuario             = InvetarioControlador::getUsuario($txtUsuario, $txtPassword);
      /*  $_SESSION["usuario"] = array(
      "id"         => $usuario->getId(),
      "nombre"     => $usuario->getNombre(),
      "usuario"    => $usuario->getUsuario(),
      "apellido"   => $usuario->getapellido(),
      "privilegio" => $usuario->getPrivilegio(),
    );*/
      setcookie("nuevapersonatrue","true");
    return print(json_encode($resultado));
  }

}
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

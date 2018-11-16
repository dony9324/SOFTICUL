<?php
/*este archivo coneta los archivos*/
include '../controlador/UsuarioControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

    $txtUsuario  = validar_campo ($_POST["txtUsuario"]);
    $txtUsuario = strtolower ($txtUsuario);
    $txtPassword = validar_campo($_POST["txtPassword"]);

    $resultado = array("estado" => "true");

    if (UsuarioControlador::login($txtUsuario, $txtPassword)) {
      $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
      $_SESSION["usuario"] = array(
        "id"         => $usuario->getId(),
        "nombre"     => $usuario->getNombre(),
        "usuario"    => $usuario->getUsuario(),
        "apellido"   => $usuario->getapellido(),
        "privilegio" => $usuario->getPrivilegio(),
      );
      return print(json_encode($resultado));
    }

  }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

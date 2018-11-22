<?php
/*este archivo coneta los archivos*/
include '../controlador/PrestamosControlador.php';
/*Función que sirve para validar y limpiar  un campo*/
include '../helps/helps.php';
session_start();
header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $go = true;
  if(strtotime($_POST["start_at"])>strtotime($_POST["finish_at"])){
    $go=false;
    $resultado = array("estado" => "false");
    $resultado = array("estado2" => "false");
    return print(json_encode($resultado));
  }

  if( $go && isset($_SESSION["Prestar"]) && isset($_SESSION["Prestar2"] )){



    foreach($_SESSION["Prestar"] as $p){
      $inventario_id =  $p["id"];

    }
    foreach($_SESSION["Prestar2"] as $p){

      $persona_id =  $p["id"];
    }
    $comienzo = $_POST["start_at"];
    $terminar = $_POST["finish_at"];
    $txtAsociacion = validar_campo($_POST["txtAsociacion"]);
    $foto = "";
    $resultado = array("estado" => "true");

    //unset($_SESSION["Prestar"]);
  //  unset($_SESSION["Prestar2"]);
    setcookie("selled","selled");

    if (PrestamosControlador::registrar($inventario_id, $persona_id, $comienzo, $terminar, $txtAsociacion)) {
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

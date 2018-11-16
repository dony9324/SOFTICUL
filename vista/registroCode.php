<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtApellido"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

        $txtNombre     = validar_campo($_POST["txtNombre"]);
        $txtApellido      = validar_campo($_POST["txtApellido"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
		$txtUsuario	   = strtolower ($txtUsuario);
        $txtPassword   = validar_campo($_POST["txtPassword"]);
        $txtPrivilegio = 2;
		$txtAsociacion = validar_campo($_POST["txtAsociacion"]);

        if (UsuarioControlador::registrar($txtNombre, $txtApellido, $txtUsuario, $txtPassword, $txtPrivilegio,$txtAsociacion)) {
           /* $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
			 $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "apellido"      => $usuario->getApellido(),
                "privilegio" => $usuario->getPrivilegio(),
				"asociacion" => $usuario->getAsociacion(),
				
            );
			
            header("location:admin.php");
			*/
        }

    }
} else {
    header("location:registro.php?error=1");
}

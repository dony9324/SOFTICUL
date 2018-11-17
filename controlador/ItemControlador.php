<?php

include '../datos/ItemDao.php';

class ItemControlador
{

    public static function login($usuario, $password)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::login($obj_usuario);
    }

    public function getUsuario($usuario, $password)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::getUsuario($obj_usuario);
    }




    public function registrar($usuario, $asociacion)
    {
        $obj_usuario = new Item();
        $obj_usuario->setNombre($usuario);
		$obj_usuario->setEstado(1);
		$obj_usuario->setAsociacion($asociacion);
        return ItemDao::registrar($obj_usuario);
    }

	 public function renombrar($usuario, $id)
    {
		$nombr = $usuario;
		$is=$id;
        $obj_usuario = new Item();
        $obj_usuario->setNombre($usuario);
		$obj_usuario->setId($id);

        return ItemDao::renombrar($nombr, $is);
    }

	 public function desactivar( $id)
    {

		$is=$id;

        return ItemDao::desactivar($is);
    }
    public function activar( $id)
     {

 		$is=$id;

         return ItemDao::activar($is);
     }



}

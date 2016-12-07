<?php
use vista\Vista;
/**
 * Created by PhpStorm.
 * User: conve
 * Date: 06/12/2016
 * Time: 10:19 PM
 */
class UsuarioController
{
    public function index(){
        return Vista::crear("usuarios.index");
    }

    public function insertar(){
        echo "insertado correctamente";
    }
}
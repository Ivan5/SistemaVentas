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
        $usuarios = array(
            1=>array(
                "nombre"=>"Ivan",
                "apelido"=>"Jaramillo"
            ),
            2=>array(
                "nombre"=>"German",
                "apelido"=>"GRitti"
            ),
            3=>array(
                "nombre"=>"Davide",
                "apelido"=>"piazza"
            )
        );
        return Vista::crear("usuarios.index","usuarios",$usuarios);
    }

    public function insertar(){
        echo "insertado correctamente";
    }
}
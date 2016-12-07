<?php
/**
 * Created by PhpStorm.
 * User: conve
 * Date: 05/12/2016
 * Time: 10:38 PM
 */

//todas las rutas disponbles enn la aplicacion

$ruta = new Ruta();
$ruta->controladores(array(
    "/"=>"WelcomeController",
    "/usuarios"=>"UsuarioController"
));
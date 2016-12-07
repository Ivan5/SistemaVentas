<?php
/**
 * Created by PhpStorm.
 * User: conve
 * Date: 05/12/2016
 * Time: 08:22 PM
 */

include ("../config/config.php");
class Conexion{
    public static function conectar(){
        try{
            $cn = new PDO('mysql:host='.HOST.';dbname='.DB.'',USER,PASSWORD);
            return $cn;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        echo "conectado correctamento";
    }
}

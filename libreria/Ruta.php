<?php

/**
 * Created by PhpStorm.
 * User: conve
 * Date: 05/12/2016
 * Time: 10:37 PM
 */
class Ruta
{
    //metodo que nos permite ingresar controladores con las rutas
    private $_controladores = array();
    public function controladores($controlador){
        $this->_controladores = $controlador;
        //llamada al metodo que hace el proceso de las rutas
        self::submit();
    }

    //metodo que se ejecuta cada vez que se envia la peticion en la url
    public function submit(){
        $uri = isset($_GET['uri'])?$_GET['uri']:'/'; //recupera la url del navegador
        $paths = explode("/",$uri); //dvede la url en partes y forma un array
        //hacer condicional para saber si esta en un controlador o en la ruta principal
        if ($uri == "/")
        {
            //principal
            $res = array_key_exists("/",$this->_controladores); //buscando si existe la ruta / en el archivo de rutas.php
            if ($res !="" && $res==1){//comprobando
                foreach ($this->_controladores as $ruta => $controller){//recorrer los controladores
                    if ($ruta == "/"){ //comprobamos si las rutas son iguales
                        $controlador = $controller; //asignamos una variable la ruta
                    }
                }
                $this->getController("index",$controlador); //llmamos al metodo que nos recupera el controlador
            }
        }else{
            //controladores y metodos
            $estado = false;
            foreach ($this->_controladores as $ruta => $cont){
                if (trim($ruta,"/") == $paths[0]){
                    $estado = true;
                    $controlador =$cont;
                    $metodo = "";
                    if (count($paths)>1){
                        $metodo = $paths[1];
                    }
                    $this->getController($metodo,$controlador);
                }

            }
            if ($estado == false){
                die("error en la ruta");
            }
        }

    }

    public function getController($metodo,$controlador){
        $metodoController =""; //Alamcena el metodo que se va a ejecutar
        if ($metodo == "index" || $metodo == ""){ //comprobamos si es index o no la ruta
            $metodoController = "index"; //Asiganamos el metodo index
        }else{
            $metodoController = $metodo; //Sino
        }
        $this->incluirControlador($controlador); //inclimos el controlador
        if (class_exists($controlador)){//comprobar si la clase existe
            $claseTemp = new $controlador(); // creams una clase emponral en base a la variable controlador =(welcomeController)
            if (is_callable(array($claseTemp,$metodoController))){//comprobamos si se puede llamar a la funcion de esa clase
                $claseTemp->$metodoController();//hacemos una llamada al metodo de esa clase
            }else{
                die("Error no es correcto,no existe el metodo");
            }
        }else{
            die("Error no existe la clase");
        }

    }

    public function incluirControlador($controlador){
        //validar si existe el archivo o no
        if (file_exists(APP_PATH."controller/".$controlador.".php")){
            //si existe lo incluimos
            include APP_PATH."controller/".$controlador.".php";
        }else{
            die("Error al encontrar el archivo");
        }
    }

}
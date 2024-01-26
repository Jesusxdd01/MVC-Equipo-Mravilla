<?php

include_once "Crud/Crud/Vista/CrudVista.php";
include_once "Crud/Crud/Modelo/ModeloCrud.php";
include_once "Clases/pagina.php";


class CrudControlador{

    private
       $error;
    
    public function _CONSTRUCT(){
    }

    public function setError($error){
        $this->error=$error;
    }
    
    public function index(){
        Pagina::inicializaEncabezado();    
        Pagina::inicializaCrud();
        //pagina::setMensaje($this->error);
        //Pagina::inicializaPie($this->error);
        Pagina::inicializaPie();        
    }
}
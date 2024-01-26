<?php

include_once "Inicio/Inicio/Vista/InicioVista.php";
include_once "Inicio/Inicio/Modelo/ModeloInicio.php";
include_once "Clases/pagina.php";


class InicioControlador{

    //public $pagina;
    private $error;
    public function _CONSTRUCT(){
        //$this->pagina= new Pagina("Inicio");
    }
     //Esta funcion lo llevan todas las clases para el manejo de errores
     public function setError($error){
        $this->error=$error;
    }
    
    public function index(){
        Pagina::inicializaEncabezado();    
        Pagina::inicializaServicios();
        Pagina::inicializaPie();        
    }
}
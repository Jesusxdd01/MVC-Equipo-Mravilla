<?php

include_once "Clases/pagina.php";


class ContactoControlador{

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
        Pagina::inicializaContacto(); 
        //pagina::setMensaje($this->error);   
        Pagina::inicializaPie();  

    }

}
?>

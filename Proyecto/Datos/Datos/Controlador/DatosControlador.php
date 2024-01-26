<?php
include_once "Datos/Datos/Vista/DatosVista.php";
include_once "Datos/Datos/Modelo/DatosModelo.php";
include_once "Clases/pagina.php";



class DatosControlador {

    private $modelo,
            $pagina,
            $datos,
            $error;

    public function setError($error){
        $this->error=$error;
    }

    public function __CONSTRUCT()
    {
        $this->pagina = new Pagina("Datos");
        $this->modelo = new DatosModelo();
    }

    
    public function index(){
        Pagina::inicializaEncabezado();    
        //Pagina::leerRegistros();    
        if ($this->modelo->getStatus()){
            $datos = $this->modelo->obtenerDatos();
            
            if ($this->modelo->getStatus()){
                $vista = new DatosVista();
                $vista->template($datos);
            }else{
                echo $this->modelo->getMensaje();
            }
           }else{
            echo $this->modelo->getMensaje();
           } 
       
      //     Pagina::inicializaPie(); 
               
    }
}
?>
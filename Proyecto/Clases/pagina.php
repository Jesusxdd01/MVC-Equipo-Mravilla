<?php 
class Pagina{

    private $tipoPagina='externa';
    private $tituloPagina;
    private $mensaje;
    private $tipoMensaje;
    private $mensajeNoHayDatos;
    private $datos;

    public function setMensaje($mensaje, $tipoMensaje='error'){
        $this->mensaje= (strcmp(trim($mensaje),
            trim($this->mensaje)) !==0 ) ? $this->mensaje . ' '
            . $mensaje : $this->mensaje;
        $this->$tipoMensaje = $tipoMensaje;
    }

    public function setMensajeNoHayDatos($mensajeNoHayDatos){
        $this->mensajeNoHayDatos=$mensajeNoHayDatos;
    }

   public function __CONSTRUCT($tituloPagina, $tipoPagina='externa'){
        $this->tipoPagina=$tipoPagina;
        $this->tituloPagina=$tituloPagina;
    }

    static function inicializaEncabezado(){
        include_once "Clases/html/encabezadoExterno.php";
        EncabezadoExterno::template("Equipo");
    }
    static function inicializaPie(){
        include_once "Clases/html/pieExterno.php";
        PieExterno::template();
    }

    static function inicializaServicios(){
        include_once "Inicio/Inicio/html/serviciosInterno.php";
        ServiciosInterno::template();
    }
    static function inicializaContacto(){
        include_once "Contacto/Contacto/html/contactoInterno.php";
        ContactoInterno::template();
    }
    static function inicializaCrud(){
        include_once "Crud/Crud/html/crudInterno.php";
        CrudInterno::template();
    }
     

}
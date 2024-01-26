<?php

include_once "Error/Error/Vista/VistaError.php";
include_once "Clases/pagina.php";
    class ErrorControlador
    {
        private
            $pagina,
            $error; //esta variable la llevan todos los controladores para el manejo de errores

        public function __CONSTRUCT(){
            $this->pagina = new Pagina("Error");
        }

        //Esta funcion lo llevan todas las clases para el manejo de errores
        public function setError($error){
            $this->error=$error;
        }

        public function error($error){
            //se construye el encabezado externo
            $this->error=$error;
            $this->pagina->inicializaEncabezado("Clases/html/encabezadoExterno.php");
            //aca se incluye el encabezado interno
            $vista = new VistaError();
            $vista->template($error);
            //se termina de construir encabezado externo, incluyendo el pie y los divs de cierre 
            //se envia el error al pie de pagina para su visualizacion
            $this->pagina->setMensaje($error);
            $this->pagina->inicializaPie("Clases/html/pieExterno.php");
        }

    }
?>
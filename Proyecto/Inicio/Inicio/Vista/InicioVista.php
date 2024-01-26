<?php
include_once "Inicio/Inicio/Modelo/ModeloInicio.php";
include_once "Clases/pagina.php";

class Inicio{
    public function template($datos){
        echo"Bienvenido a Inicio <BR>";
        //echo"El";

        echo"<pre>";
        print_r ($datos);
        echo"<pre>";

    }
}
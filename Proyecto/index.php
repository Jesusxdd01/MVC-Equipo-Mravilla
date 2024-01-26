
<?php

include_once "Error/Error/Controlador/ErrorControlador.php";


$errorControlador = new ErrorControlador();

if(isset($_GET['modulo'])){
    $modulo = $_GET['modulo'];    
    if(isset($_GET['controlador'])){

        $controlador = $_GET['controlador'];
        if(isset($_GET['accion'])){
            $accion = $_GET['accion']."<br>";

            // instanciar el controlador
            $ruta = $modulo . "/" . $controlador . "/Controlador/" . $controlador . "Controlador.php";
            // se comprueba si existe ruta 
            if(is_file($ruta)){
                require_once $ruta;
                $controlador = ucwords($controlador)."Controlador";
                $controlador = new $controlador();

                if(!method_exists($controlador, $accion)){
                    // si no existe el controlador por omisión, llama a inicio al index con la variable error
                    $error = 'No existe la acción ' . $accion . ' en el controlador ' . $_GET['controlador'];
                    $controlador = $_GET['controlador'];
                   // $controlador = ucwords($controlador). "Controlador";
                    $nombreControlador = ucwords($controlador)."Controlador";
                    $controlador = new $nombreControlador();
                    //var_dump($controlador);

                    $controlador->setError($error); // se coloca la variable error
                    $accion = 'index';
                    $controlador->$accion();

                } else {
                    $error = ""; // en caso de error poner mensaje
                    $controlador->setError($error);
                    $controlador->$accion();
                }
            } else {
                $error="No existe la ruta dada: " . $ruta;
                $errorControlador->error($error);
               
            }            
        } else {
            $error="No se encuentra la acción";
            $errorControlador->error($error);
        }
    } else {
        $error= "No se encuentra el controlador";
        $errorControlador->error($error);
    }
} else {
    $error="No se encuentra el módulo";
    $errorControlador->error($error);
}



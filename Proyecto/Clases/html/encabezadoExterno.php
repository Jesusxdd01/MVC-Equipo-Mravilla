<?php 
class EncabezadoExterno{
    static function template($tituloPagina){
        //$encriptador=new Encriptar();
?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Equipo Maravilla</title>
                <link rel="preload" href="Clases/css/normalize.css" as="style">
                <link rel="stylesheet" href="Clases/css/normalize.css">
                <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
                <link rel="preload" href="Clases/css/styles.css" as="style">
                <link href="Clases/css/styles.css" rel="stylesheet">
            </head>
            <body>
                <header>
                    <h1 class="titulo">Equipo <span>Maravilla</span></h1>
                </header>
                
                <div class="nav-bg">
                    <nav class="navegacion-principal contenedor">
                        <a href="?modulo=Inicio&controlador=Inicio&accion=index">Inicio</a>
                        <a href="?modulo=Contacto&controlador=Contacto&accion=index">Contacto</a>
                        <a href="?modulo=Crud&controlador=Crud&accion=index">CRUD</a>
                        <a href="?modulo=Datos&controlador=Datos&accion=index">Paginado</a>
                    </nav>
                </div>

<?php 
    }
}

?>
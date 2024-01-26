<head>
    <link rel="stylesheet" type="text/css" href="Clases/css/paginador.css">
    <link rel="stylesheet" type="text/css" href="Clases/css/tabla.css">
</head>
<?php

include_once "Clases/pagina.php";

class DatosVista
{
    public  function template($datos)
    {

        // Número de datos por página
        $datosPorPagina =2;

        // Página actual
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el número total de páginas
        $totalPaginas = ceil(count($datos) / $datosPorPagina);

        // Calcular el índice inicial y final de los datos a mostrar
        $indiceInicio = ($paginaActual - 1) * $datosPorPagina;
        $indiceFin = $indiceInicio + $datosPorPagina;

        // Obtener los datos a mostrar en la página actual
        $datosPagina = array_slice($datos, $indiceInicio, $datosPorPagina);

?>
    <body>
     <table class="tabla" align="center">
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
     </tr>
    <?php foreach ($datosPagina as $dato) {?>
        <tr>
            <td><?php echo $dato->idAlumno?></td>
            <td><?php echo $dato->nombre?></td>
            <td><?php echo $dato->apPaterno?></td>
            <td><?php echo $dato->apMaterno?></td>
        </tr>
              
    </body>
    <footer>
<?php          
        }
       

        // Mostrar el paginador con estilos CSS
        echo "<div class='paginador'>";
       
        for ($i = 1; $i <= $totalPaginas; $i++) {
           // echo "<a class='pagina" . ($paginaActual == $i ? " activa" : "") . "' href='http://localhost/Proyecto/?modulo=Datos&controlador=Datos&accion=index=$i'>$i </a>";

           echo "<a class='boton' href='?modulo=Datos&controlador=Datos&accion=index&pagina=" . ($i) . "'>$i</a>";
        }
        echo "</div>";

    }

}

        // Mostrar los datos en la página actual
      /*  echo "<h2>Datos:</h2>";
        foreach ($datosPagina as $dato) {
            echo "<p>ID: " . $dato->idAlumno . "</p>";
            echo "<p>Nombre: " . $dato->nombre . "</p>";
            echo "<p>Apellido Paterno: " . $dato->apPaterno . "</p>";
            echo "<p>Apellido Materno: " . $dato->apMaterno . "</p>";
            echo "<hr>";
        }*/
?>
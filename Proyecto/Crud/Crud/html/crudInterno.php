<?php
include_once "Conexiones/ConexionBase.php";

class CrudInterno{
    private $conexion;
    static function template(){
        
?>

        <div class="busqueda">
            <form class="formulario" method="post" action="#" >
                <input type="text" id="busqueda" name="busqueda" placeholder="Buscar por Nombre">
                <input type="submit" value="Buscar" class="boton">
            </form>
        </div>

        <?php
            if(isset($_POST['busqueda'])){
                $valorBusqueda = $_POST['busqueda'];
            
                // Establecer la conexión
                $conexion = ConexionBase::iniciarConexion();
            
                // Realizar la consulta
                $query = "SELECT * FROM Alumnos WHERE nombre LIKE :valor";
                $statement = $conexion->prepare($query);
                $valorBusqueda = "%{$valorBusqueda}%";
                $statement->bindParam(':valor', $valorBusqueda);
                $statement->execute();
            
                // Obtener los resultados
                $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        ?>
        

        <div id="contacto" class="contacto">
            <h2>Tabla Alumnos</h2>
            <form class="formulario" action="#" method="POST">
                <legend>Consulta a la base de datos</legend>

                <?php if(isset($resultados)): ?>
                    <?php foreach($resultados as $registro): ?>

                        <div class="contenedor-campos">
                            <div class="campo">
                                <label>Numero de Control</label>
                                <input type="text" name="idAlumno" value="<?php echo $registro['idAlumno']; ?>" >
                            </div>
                            <div class="campo">
                                <label>Nombre</label>
                                <input type="text" name="nombre" value="<?php echo $registro['nombre']; ?>" >
                            </div>
                            <div class="campo">
                                <label>Apellido Paterno</label>
                                <input type="tel" name="apPaterno" value="<?php echo $registro['apPaterno']; ?>">
                            </div>
                            <div class="campo">
                                <label>Apellido Materno</label>
                                <input type="text" name="apMaterno" value="<?php echo $registro['apMaterno']; ?>">
                            </div>
                        </div><!--.contenedor-campos-->

                        <nav class="navegacion-principal contenedor">
                            <div class="enviar">
                                <input class="boton" type="submit" name="modificar" value="Modificar">
                            </div>
                            <div class="enviar">
                                <input class="boton" type="submit" name="agregar" value="Agregar">
                            </div>
                            <div class="enviar">
                                <input class="boton" type="submit" name="eliminar" value="Eliminar">
                            </div>  
                        </nav>

                    <?php endforeach; ?>
                <?php endif; ?>

        <?php 
            if(isset($_POST['modificar'])){
                $idAlumno= $_POST['idAlumno'];
                $nombre= $_POST['nombre'];
                $apPaterno= $_POST['apPaterno'];
                $apMaterno= $_POST['apMaterno'];

                // Establecer la conexión
                $conexion = ConexionBase::iniciarConexion();

                // Realizar la consulta de actualización
                $query= "UPDATE Alumnos SET nombre=:nombre, apPaterno=:apPaterno,
                apMaterno=:apMaterno WHERE idAlumno=:idAlumno";
                $statement = $conexion->prepare($query);
                $statement->bindParam(':nombre',$nombre);
                $statement->bindParam(':apPaterno',$apPaterno);
                $statement->bindParam(':apMaterno',$apMaterno);
                $statement->bindParam(':idAlumno',$idAlumno);
                $statement->execute();
                if($statement->execute()){
                    echo "<h1 class='mensaje'>Registro modificado exitosamente</h1>";
                }else{
                    echo "<h1 class='mensaje'>Error al modificar el registro</h1>";
                }
                    
            }
        ?>

        <?php
            // Procesar el formulario de inserción
            if(isset($_POST['agregar'])){
                $valor1 = $_POST['nombre'];
                $valor2 = $_POST['apPaterno'];
                $valor3 = $_POST['apMaterno'];
                $valor4 = $_POST['idAlumno'];
                // Obtener los demás valores de los campos de texto

                // Establecer la conexión
                $conexion = ConexionBase::iniciarConexion();
                
                // Realizar la consulta de inserción
                $query = "INSERT INTO Alumnos (idAlumno, nombre, apPaterno, apMaterno) VALUES (:idAlumno, :nombre, :apPaterno, :apMaterno)";
                $statement = $conexion->prepare($query);
                $statement->bindParam(':nombre', $valor1);
                $statement->bindParam(':apPaterno', $valor2);
                $statement->bindParam(':apMaterno', $valor3);
                $statement->bindParam(':idAlumno', $valor4);
                // Asignar los demás valores a los parámetros correspondientes

                if($statement->execute()){
                    echo "<h1 class='mensaje'>Registro agregado exitosamente</h1>";
                }else{
                    echo "<h1 class='mensaje'>Error al agregar el registro</h1>";
                }
            } 
        ?>

        <?php 
            if(isset($_POST['eliminar'])){
                $valorEliminar = $_POST['nombre'];

                // Establecer la conexión
                $conexion = ConexionBase::iniciarConexion();

                // Realizar la consulta de eliminación
                $query = "DELETE FROM Alumnos WHERE nombre = :nombre";
                $statement = $conexion->prepare($query);
                $statement->bindParam(':nombre', $valorEliminar);
                $statement->execute();
                if($statement->execute()){
                    echo "<h1 class='mensaje'>Registro eliminado exitosamente</h1>";
                }else{
                    echo "<h1 class='mensaje'>Error al eliminar el registro</h1>";
                }
            }
        ?>
            </form>    
        </div>

<?php
    }
}
?>
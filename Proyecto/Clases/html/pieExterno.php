<?php
class PieExterno {

        private $error;

        public  function setError($error){
            $this->error=$error;
        }
        static function template(){

?>
            <footer class="footer">
                <p>Todos los derechos reservados. Equipo Maravilla</p>
            </footer>
                      
            </html>

<?php
        }
    }


/*    
   // public static function template($error = '') {
    public static function template($mensaje,$tipoMensaje, $mensajeNoHayDatos = ''){

     if(isset($mensaje)&& $mensaje != '')

?>
        <div class="myAlert-bottom alert alert-danger">
            <a href="#" class="close" data-dismiss="alert"
            aria-label="close">&times;</a>
            <strong>Error</strong><?php echo $mensaje; ?>

        </div>

        
    </div>
  

    </body>
</html>
        <style type ="text/css">
            .myAlert-bottom{
                position: fixed;
                bottom: 5px;
                left: 2%;
                width: 96%;
            }
        </style>
<?php
    }
}*/
?>


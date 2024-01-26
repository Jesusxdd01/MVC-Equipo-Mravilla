<?php

class ContactoInterno{
    static function template(){

?>

        <div id="contacto" class="contacto">
            <h2>Contacto</h2>
            <form class="formulario" action="#" method="POST">
                <legend>Contactános llenando todos los campos</legend>
                <div class="contenedor-campos">
                    <div class="campo">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="campo">
                        <label>Teléfono</label>
                        <input type="tel" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="campo w-100">
                        <label>Correo</label>
                        <input type="mail" name="correo" placeholder="Mail">
                    </div>
                    <div class="campo w-100">
                        <label>Mensaje:</label>
                        <textarea></textarea>
                    </div>
                    </div><!--.contenedor-campos-->
                    <div class="enviar">
                        <input class="boton" type="submit" value="Enviar">
                    </div>
                </form>    
        </div>


<?php
    }
}
?>
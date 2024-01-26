<?php

class ConexionBase{
    public static function iniciarConexion(){
        $host     ='127.0.0.1';
        $dbname   ='Escuela';
        $username ='saturno69';
        $password ='1234';

      
        try{
            $conexion = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo"Conexion exitosa. <br>";
            return $conexion;
        }catch(PDOException $e){
            die("no se pudo establecer conexion:" . $e->getMessage());
        }   
    }  
}

<?php

    require_once "Conexiones/ConexionBase.php";

    class ModeloInicio{

        private $conexion,
                $status,
                $mensaje,
                $lugarDeError,
                $datos;

        //getters y setters
        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status= $status;
        }

        public function getMensaje(){
            return $this->mensaje;
        }
        public function setMensaje($mensaje){
            $this->mensaje= $mensaje;
        }

        public function getlugarDeError(){
            return $this->lugarDeError;
        }
        public function setlugarDeError($lugarDeError){
            $this->lugarDeError= $lugarDeError;
        }

        public function __CONSTRUCT(){
            try{
                $this->conexion= ConexionBase::iniciarConexion();
                $this->status=true;
            }catch(Exception $e){
                $this->status=false;
                $this->mensaje= 'Error al conectarse a la bd: ' . 
                $this->lugarDeError . ' codigo ' . $e->getCode() . 'Modelo ' . 
                $e->getLine();
            }
        }

        public function obtenerAlumnos(){
            
            try{
                $consulta = $this-> conexion -> prepare('select * from Alumnos');
                $consulta->execute();
                $this->datos = $consulta -> fetchAll(PDO::FETCH_OBJ);
                $this->status=true; 
                return $this->datos;
            }catch(PDOException $e){
                $this->status=false;                
                $this-> mensaje= 'Error en la consulta';
                return $this->mensaje;
                return $this->datos =null;
            }
        }

    }

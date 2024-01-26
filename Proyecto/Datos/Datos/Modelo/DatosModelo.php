<?php
require_once "Conexiones/ConexionBase.php";

class DatosModelo{
    private $conexion,
            $status,
            $mensaje,  
            $lugarDeError,
            $datos,

            $clave,  
            $obtenerpor,
            $idAlumno,
            $nombre,
            $ApPaterno,
            $ApMaterno;
    
    public function __CONSTRUCT()
    {
        try{
            $this->conexion = ConexionBase::iniciarConexion();
            $this->status = TRUE;
        }catch (Exception $e){
            $this->status = FALSE;
            $this->mensaje = 'Error al conectarse a la BD: '. $this->lugarDeError. 'codigo';
        }
        $this->lugarDeError='';
    }
    public function setStatus($status){$this->clave = $status;}
    public function getStatus(){return $this->status;}

    public function setMensaje($mensaje){$this->clave = $mensaje;}
    public function getMensaje(){return $this->mensaje;}

    public function setLugarDeError($lugarDeError){$this->clave = $lugarDeError;}
    public function getLugarDeError(){return $this->lugarDeError;}


    public function setId ($idAlumno){$this->idAlumno = $idAlumno;}
    public function getId(){return $this->idAlumno;} 

    public function setNombre ($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setApellidoP ($ApPaterno){$this->ApPaterno = $ApPaterno;}
    public function getApellidoP(){return $this->ApPaterno;}

    public function setApellidoM ($ApMaterno){$this->ApMaterno = $ApMaterno;}
    public function getApellidoM(){return $this->ApMaterno;}
    
    public function obtenerDatos()
    {
        $this-> datos = (object) array('Alumnos' => NULL);
        try{
            $sql = "SELECT * FROM Alumnos";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0]== 0000)
            {
                $this->status = TRUE;
                $this->datos = $consulta->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception($errores[2]);
            }
        }
        catch (PDOException $e){
            $this->status = FALSE;
            $this->mensaje= 'Error al obtener la informacion: '. $this->lugarDeError. 'codigo'. $e->getCode() . 'Modelo linea'. $e->getLine();
        }
        catch (Exception $e)
        {
            $this->status=FALSE;
            $this->mensaje=$e->getMessage();
            
        }
        return $this->datos;
    }
} 
<?php
require_once('includes/bd.php'); 

class consultasBD{
    protected $bd; 

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }

    public function login($userID, $pass){
        $conn = $this->bd->conexionBD();
        $consulta = "SELECT * FROM socio WHERE id = '$userID' ";
        $result = $conn->query($consulta); 
        $fila = $result->fetch_assoc(); // De la consulta anterior que hemos hecho solo nos interesa una fila por lo que la separamos para trabajar mejor. 
        
        if($result->num_rows === 1){ // comprobamos que se ese usuario existe 
            if($pass === $fila['pass']){
                return true; //existe usuario, ademas coincide con la contraseña introducida
            }
            else{
                return false; // contraseña incorrecta 
            }
        }
        else{
            return false; 
        }
    }

    public function existeSocio($id){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT * FROM socio WHERE id = '$id'";
        $result = $conn->query($consulta);

        if($result->num_rows === 0){// no se ha conseguido ninguna coincidencia, no esta resgistrado
            return false; 
        }
        else{
            return true; 
        }

    }

    public function getNombreSocio($id){
        $conn = $this->bd->conexionBD(); 
        $consulta = " SELECT nombre FROM socio WHERE id = '$id'";
        $result = $conn->query($consulta);
        $fila = $result->fetch_assoc(); // De la consulta anterior que hemos hecho solo nos interesa una fila por lo que la separamos para trabajar mejor. 

        return $fila['nombre']; 
    }

    public function registrarSocio($nombre, $id, $pass){
        $conn = $this->bd->conexionBD(); 


        //Por mas seguridad encriptamos la clave, por eso usamos esta funcion: 

        $consulta = "INSERT INTO socio (id, nombre, pass) VALUES ('$id','$nombre','$pass')";

        $result = $conn->query($consulta);

        if($result === TRUE){
            return true; 
        }
        else{
            return false; 
        }

    }

    public function obtenerPeliculas(){
        $conn = $this->bd->conexionBD();
        $map = []; 
        $consulta = "SELECT * FROM pelicula"; //hacemos la consulta para todos los productos
        $reslut = $conn->query($consulta); 

        if($reslut){ // no hay problema en la consulta realizada 
            if($reslut->num_rows > 0){//comprobamos que hay mas de una fila 
                foreach($reslut as $fila){
                    $map[] = $fila; 
                }

            }

        }
        return $map; 

    }
    public function getPelicula($id){
        $conn = $this->bd->conexionBD();
        $consulta = "SELECT * FROM pelicula WHERE id = '$id'";
        $result = $conn->query($consulta); 
        $fila = $result->fetch_assoc();
        return $fila; 

    }

    public function contarPrestamo(){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT COUNT(*) FROM prestamo";
        $result = $conn->query($consulta);
        $numPed = $result->fetch_assoc();
        return $numPed['COUNT(*)'];
    }

    public function resgistrarPrestamo($id,$idSocio,$idPeli){
        $conn = $this->bd->conexionBD(); 

        $consulta = "INSERT INTO prestamo (id, fechaInicio, idSocio, idPelicula) VALUES ('$id', NOw(),'$idSocio','$idPeli')";

        $conn->query($consulta);


    }

    public function obtenerPrestamoSocio($idSocio){
        $conn = $this->bd->conexionBD();
        $map = []; 
        $consulta = "SELECT * FROM prestamo WHERE idSocio = '$idSocio'"; 
        $result = $conn->query($consulta); 

        if($result){ // no hay problema en la consulta realizada 
            if($result->num_rows > 0){//comprobamos que hay mas de una fila 
                foreach($result as $fila){
                    $map[] = $fila; 
                }

            }

        }
        return $map;
    }

    public function eliminarPrestamo($idSocio, $idPeli){
        $conn = $this->bd->conexionBD(); 
        $consulta = "DELETE FROM prestamo WHERE idSocio = '$idSocio' AND idPelicula = '$idPeli' ";
        $conn->query($consulta);

    }

    public function datosPrestamo($idSocio, $idPeli){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT * FROM prestamo WHERE idSocio = '$idSocio' AND idPelicula = '$idPeli' ";
        $result = $conn->query($consulta);
        $fila = $result->fetch_assoc();

        return $fila; 
    }

    public function ampliarFechaPrestamo($idPrestamo,$nuevaFecha){
        $conn = $this->bd->conexionBD();
        $consulta = "UPDATE prestamo SET fechaInicio = '$nuevaFecha' WHERE id = '$idPrestamo'  ";
        $conn->query($consulta);
        
    }

    public function addPeliculaRota($idPeli, $idSocio, $motivo){
        $conn = $this->bd->conexionBD();
        $consulta = "INSERT INTO peliculaRota (idPeli, idSocio, motivo) VALUES ('$idPeli', '$idSocio', '$motivo')"; 
        $conn->query($consulta);


    }
    public function peliculaNoDisponible($idPeli){
        $conn = $this->bd->conexionBD(); 
        $consulta = "UPDATE pelicula SET disponible = 'no' WHERE id = '$idPeli' ";
        $conn->query($consulta);
        

    }


    public function existePeliRota($idPeli){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT * FROM peliculaRota WHERE idPeli = '$idPeli'";
        $result = $conn->query($consulta);

        if($result->num_rows === 0){// no se ha conseguido ninguna coincidencia, no esta resgistrado
            return false; 
        }
        else{
            return true; 
        }

    }


    






}//clase




?>
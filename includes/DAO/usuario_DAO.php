<?php

require_once('includes/clases/Usuario.php');
require_once('includes/bd.php'); 

class usuario_DAO{

    //dado que esta clase se comunica con la bd vamos a tener un atributo con la instancia de la bd
    // como hacemos uso del patron singleton en la BD solo tendremos una instancia de la bd en toda la app
    protected $bd; 

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }

    public function login(Usuario $usr){
        //obtenemos la concexion a la bd 
        $conn = $this->bd->conexionBD(); 
        //extraemos los dos datos necesarios para hacer el login, con estos haremos una consulta para comprobar que los dos existen y son correcotos. Para validar el login del usr
        $id = $usr->getUsuarioID(); 
        $pass = $usr->getPassword(); 

        // queremos toodas las filas de la tabla Usuarios cuyo idUsuario sea igual a $id
        $consulta = "SELECT * FROM usuario WHERE id = '$id' ";
        $result = $conn->query($consulta); 
        
        //creamos instancia usuario. comrpobamos y asignamos los balores de la bd a los demas campos
        
        // asociamos lo que tenemos con los campos de la tabla 
        if($result->num_rows === 1){
            $fila = $result->fetch_assoc(); // De la consulta anterior que hemos hecho solo nos interesa una fila por lo que la separamos para trabajar mejor. 
            $ok = password_verify($pass,$fila['pass']); //fila['password'] es lo que estan en la bd como atributo

            //if($pass === $fila['pass']){
                if(password_verify($pass,$fila['pass'])){
                //creamos una instancia usuario y le asignamos todoos los valores extraidos de la base de datos
                $usr = new Usuario(); 
                $usr->setUsuarioID($fila['id']); 
                $usr->setNombre($fila['nombre']); 
                $usr->setEmail($fila['email']); 
                $usr->setNumTelefono($fila['telefono']); 
                $usr->setPassword($fila['pass']);
                $usr->setTipoUsuario($fila['rol']);

                //cuando tenga toda la informacion devolvemos la instancia para que usuario_SA trabaje con ella
                return $usr; 

            }
            else{// en caso de que no este bien la contraseña devolvemos false para poder tratar el fallo 
                return false; 
            }
        }
        else{
           return false; 

        }



    }

    public function existeUsuario($id){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT * FROM usuario WHERE id = '$id'";
        $result = $conn->query($consulta);

        if($result->num_rows === 0){// no se ha conseguido ninguna coincidencia, no esta resgistrado
            return true; 

        }
        else{
            return false; 
        }

        
    }

    public function registrarUsr(Usuario $usr){
        $conn = $this->bd->conexionBD(); 

        $nombre = $usr->getNombre(); 
        $id = $usr->getUsuarioID();
        $email = $usr->getEmail();
        $telefono = $usr->getNumTelefono();
        $pass = $usr->getPassword();
        $tipoUser = $usr->getTipoUsuario(); 

        //Por mas seguridad encriptamos la clave, por eso usamos esta funcion: 
        $encripPass = password_hash($pass, PASSWORD_BCRYPT);

        $consulta = "INSERT INTO usuario (id, nombre, email, pass, telefono, rol) VALUES ('$id','$nombre','$email','$encripPass',$telefono,'$tipoUser')";

        $result = $conn->query($consulta);

        if($result === TRUE){
            return true; 
        }
        else{
            return false; 
        }

    }



}


?> 
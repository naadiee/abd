<?php

require_once('includes/DAO/usuario_DAO.php'); 
require_once('includes/clases/Usuario.php'); 

class usuario_SA{
    //esta clase se comunica con la clase DAO respectiva, por lo que la tendra como atributo. 

    protected $DAO; // es protected porque solo se accede desde la misma clase o clases con herencia, asi respetamos la encapsulación

    public function __construct(){
        $this->DAO = new usuario_DAO(); // lo vinculamos con su DAO
        
    }

    public function login($id, $pass){
        $usr = new Usuario(); // creamos una instancia
        $usr->setUsuarioID($id); 
        $usr->setPassword($pass); 

        return $this->DAO->login($usr);
    }

    public function nuevoUsrRegristro($nombre, $id, $email, $telefono,$pass){
        $usr = new Usuario(); // creamos una instancia para el nuevo usuario a quien le vamos a asignar todos los valores recibidos por parametro
        $usr->setNombre($nombre); 
        $usr->setUsuarioID($id);
        $usr->setEmail($email); 
        $usr->setNumTelefono($telefono);
        $usr->setPassword($pass);
        $usr->setTipoUsuario(0);  // Dado que esta funcion es llamada desde el registro "regular" quien se registra es un usuario normal por ello le asignamos directamente el 0 para identificarlo

        //devolvemos pero en forma de objeto DAO por ello llamaos a esta clase para que comunique lo que acabamos de hacer con la base de datos y asi haga el INSERT correspondiente
        //antes haremos una comprobacion, para saber si el usuario que queremos agregar existe, en caso negativo llamamos a la clase DAO, en caso contrario notificamos.
        if($this->DAO->existeUsuario($id)){
            return $this->DAO->registrarUsr($usr);
        }
        
    }


}



?> 
<?php

class Usuario {
    //definimos los atributos que identifican a la entidad Usuario
    private $dni; // id usuario 
    private $nombre;
    private $email; 
    private $numTelefono; 
    private $contrasena; 
    private $tipoUsuario;  // 0 = usuario regular | 1 = admin 

    public function __construct(){}

//**************************************************** GETTERS **************************************************** 

    public function getUsuarioID(){
        return $this->dni;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getNumTelefono(){
        return $this->numTelefono;
    }

    public function getPassword(){
        return $this->contrasena;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    //**************************************************** SETTERS **************************************************** 

    public function setUsuarioID($dni){
        $this->dni = $dni;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }

    public function setPassword($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }
}

?>
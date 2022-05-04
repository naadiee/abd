<?php

class BD {



    private $serverName = "localhost"; // 
    private $userBD = "root"; 
    private $contrasena = ""; 
    private $nameBD = "videoClub"; 
    private $conn = null; // variable con la conexion a la bd 
    private static $instancia = null; // para que solo haya una
    private $hayInstancia = false; 

    public static function getSingleton(){

        if(null === self::$instancia){ // comprobamos, en caso de que no exista la creamos con un new
            self::$instancia = new self(); 
        }

        return self::$instancia; // devuelve la instancia, si existe la devuelve directamente.
    }

    public function conexionBD(){
        
        if(!$this->conn){
            $this->conn = new mysqli($this->serverName, $this->userBD, $this->contrasena, $this->nameBD); // creamos la conexion 

            if($this->conn->connect_errno){ // comprobamos que no ha habido problemas
                echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
                exit(); 
            }
            if(!$this->conn->set_charset("utf8mb4")){
                echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);

            }
        }
        return $this->conn;

    }

    public function terminarConexion(){
        if(!isset($this->conn)){
            echo "BD no inicializada"; 
            exit(); 
        }

        if($this->conn !== null){
            $this->conn->close();
        }
    }
}




?>
<?php

class ValoracionProduc {
    //definimos los atributos que identifican a la entidad ValoracionProduc
    private $idUsu;
    private $idArticulo; 
    private $puntuacion; 

    public function __construct(){}

//**************************************************** GETTERS **************************************************** 


    public function getIdUsu(){
        return $this->idUsu;
    }

    public function getIdArticulo(){
        return $this->idArticulos;
    }

    public function getPuntuacion(){
        return $this->puntuacion;
    }


    //**************************************************** SETTERS **************************************************** 

    public function setIdUsu($idUsuario){
        $this->idUsu = $idUsuario;
    }

    public function setIdArticulo($idArt){
        $this->idArticulos = $idArt;
    }

    public function setPuntuacion($punt){
        $this->puntuacion = $punt;
    }
}

?>
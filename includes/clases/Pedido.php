<?php

class Pedido {
    //definimos los atributos que identifican a la entidad Pedido
    private $idPedido; // id usuario 
    private $idUsu;
    private $articulos; 
    private $direccion; 
    private $precioTotal;
    private $numArt;

    public function __construct(){}

//**************************************************** GETTERS **************************************************** 

    public function getPedidoID(){
        return $this->idPedido;
    }

    public function getIdUsu(){
        return $this->idUsu;
    }

    public function getArticulos(){
        return $this->articulos;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getPrecioTotal(){
        return $this->precioTotal;
    }

    public function getNumArticulos(){
        return $this->numArt;
    }

    //**************************************************** SETTERS **************************************************** 

    public function setPedidoID($id){
        $this->idPedido = $id;
    }

    public function setIdUsu($idUsuario){
        $this->idUsu = $idUsuario;
    }

    public function setArticulos($productos){
        $this->articulos = $productos;
    }

    public function setDireccion($dir){
        $this->direccion = $dir;
    }

    public function setPrecioTotal($precioTot){
        $this->precioTotal = $precioTot;
    }

    public function setNumArticulos($numA){
        $this->numArt = $numA;
    }
}

?>
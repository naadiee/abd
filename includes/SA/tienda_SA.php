<?php
require_once('includes/DAO/tienda_DAO.php'); 

class tienda_SA{

    protected $DAO; // protected porque solo podemos acceder desde la misma clase y desde clases que heredan de esta

    public function __construct(){
        $this->DAO = new tienda_DAO();
        
    }

    public function datosTienda(){
        return $this->DAO->obtenerProductos();
    }

}
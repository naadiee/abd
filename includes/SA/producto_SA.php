<?php
require_once('includes/DAO/producto_DAO.php'); 
require_once('includes/clases/Producto.php');
class producto_SA{
    protected $DAO; // solo se peude acceder desde la clase SA o las que hereden de esta

    public function __construct(){
        $this->DAO = new producto_DAO();
        
    }

    public function getProductoPorID($id){
        $producto = new Producto(); 
        $datos = $this->DAO->getProducto($id);
        $producto = $producto->createProduct($datos); 
        return $producto; 

    }
    public function getDatosProducto($id){
        $producto = $this->DAO->getProducto($id);
        return $producto; 
    }

    public function reducirStock($id,$und){
        $this->DAO->cambiarStock($id, $und);
    }

    public function añadirStock($id,$und){
        $this->DAO->cambiarStock($id, -$und);
    }
}

?>
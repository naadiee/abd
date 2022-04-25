<?php
require_once('includes/DAO/pedido_DAO.php'); 
require_once('includes/clases/Pedido.php');

class pedido_SA{
    protected $DAO; // solo se peude acceder desde la clase SA o las que hereden de esta

    public function __construct(){
        $this->DAO = new pedido_DAO();
    }

    public function contarPedidosUsuario($idUsu){
        return $this->DAO->contarPedidosUsu($idUsu);
    }

    public function obtenerPed($idUsu){
        return $this->DAO->obtenerPedidos($idUsu);
    }

    public function registrarPedido($idUsu,$productos,$direccion,$precioTotal,$numArt){
        $ped = new Pedido(); 
        $id = $this->DAO->contarPedidos() + 1;
        $ped->setPedidoId($id); 
        $ped->setIdUsu($idUsu);
        $ped->setArticulos($productos);
        $ped->setDireccion($direccion);
        $ped->setPrecioTotal($precioTotal); 
        $ped->setNumArticulos($numArt); 

        return $this->DAO->registrarPedido($ped);
    }

    public function obtenerPedidoConId($idP){
        return $this->DAO->obtenerPedIdP($idP);
    }

    public function eliminarPedido($idPed){
        return $this->DAO->eliminarPed($idPed);
    }

}


?>
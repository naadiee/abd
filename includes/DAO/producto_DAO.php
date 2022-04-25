<?php
require_once('includes/bd.php'); 

class producto_DAO{
    protected $bd; // solo podemos acceder desde la clase dao o las que hereden de esta

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }

    public function getProducto($id){
        $conn = $this->bd->conexionBD();
        $consulta = "SELECT * FROM producto WHERE id = '$id'";
        $result = $conn->query($consulta); 
        $fila = $result->fetch_assoc();

        return $fila; 

    }

    public function cambiarStock($id, $und){
        $conn = $this->bd->conexionBD();
        $actualizar = "UPDATE producto SET stock = stock - '$und' WHERE id = '$id'";
        $conn->query($actualizar);
    }


}




?>
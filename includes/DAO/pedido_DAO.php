<?php

require_once('includes/clases/Pedido.php');
require_once('includes/bd.php'); 

class pedido_DAO{
    protected $bd; // solo podemos acceder desde la clase dao o las que hereden de esta

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }

    public function registrarPedido(Pedido $ped){
        $conn = $this->bd->conexionBD(); 

        $idPed = $ped->getPedidoId(); 
        $idUsu = $ped->getIdUsu();
        $articulos = $ped->getArticulos();
        $direccion = $ped->getDireccion();
        $precioTotal = $ped->getPrecioTotal();
        $numArt = $ped->getNumArticulos(); 

        $consulta = "INSERT INTO pedido (id, idUsuario, articulos, direccion, precioTotal, numArticulos) VALUES ('$idPed','$idUsu','$articulos','$direccion','$precioTotal', '$numArt')";

        $result = $conn->query($consulta);

        if($result === TRUE){
            return true; 
        }
        else{
            return false; 
        }
    }

    public function contarPedidosUsu($idUsu){
        if($this->contarPedidos() > 0){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT COUNT(*) FROM pedido WHERE idUsuario = '$idUsu'" ;
        $result = $conn->query($consulta);
        $numPed = $result->fetch_assoc();

        return $numPed['COUNT(*)'];  
        }
        
    }

    public function obtenerPedIdP($idP){
        
        $conn = $this->bd->conexionBD();
        $consulta = "SELECT * FROM pedido WHERE id = '$idP'"; //hacemos la consulta para todos los productos
        $result = $conn->query($consulta);
        $fila = $result->fetch_assoc();
        if($fila){
            $ped = new Pedido();
            $ped->setPedidoID($fila['id']);
            $ped->setIdUsu($fila['idUsuario']);
            $ped->setArticulos($fila['articulos']);
            $ped->setDireccion($fila['direccion']);
            $ped->setPrecioTotal($fila['precioTotal']);
            $ped->setNumArticulos($fila['numArticulos']);
            return $ped; 
        }
        return false;

    }

    public function obtenerPedidos($idUsu){
        $conn = $this->bd->conexionBD();
        $map = []; 
        $consulta = "SELECT * FROM pedido WHERE idUsuario = '$idUsu'"; 
        $result = $conn->query($consulta); 

        if($result){ // no hay problema en la consulta realizada 
            if($result->num_rows > 0){//comprobamos que hay mas de una fila 
                foreach($result as $fila){
                    $map[] = $fila; 
                }

            }

        }
        return $map;
    }

    public function contarPedidos(){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT COUNT(*) FROM pedido";
        $result = $conn->query($consulta);
        $numPed = $result->fetch_assoc();

        return $numPed['COUNT(*)'];
    }

    public function eliminarPed($idPed){
        $conn = $this->bd->conexionBD(); 
        $consulta = "DELETE  FROM pedido WHERE id = '$idPed'";
        $result = $conn->query($consulta);

        return $result;
    }

}


?>
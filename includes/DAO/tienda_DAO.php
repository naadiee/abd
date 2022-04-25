<?php
require_once('includes/bd.php');

class tienda_DAO{

    protected $bd; 

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }


    public function obtenerProductos(){
        $conn = $this->bd->conexionBD();
        $map = []; 
        $consulta = "SELECT * FROM producto"; //hacemos la consulta para todos los productos
        $reslut = $conn->query($consulta); 

        if($reslut){ // no hay problema en la consulta realizada 
            if($reslut->num_rows > 0){//comprobamos que hay mas de una fila 
                foreach($reslut as $fila){
                    $map[] = $fila; 
                }

            }

        }
        return $map; 

    }

       





}

?>
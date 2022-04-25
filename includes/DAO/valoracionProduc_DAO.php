<?php

require_once('includes/clases/ValoracionProduc.php');
require_once('includes/bd.php'); 

class valoracionProduc_DAO{
    protected $bd; // solo podemos acceder desde la clase dao o las que hereden de esta

    public function __construct(){
        $this->bd = BD::getSingleton(); // se llama de esta manera ya que es un metodo estatico 
    }

    public function existeValoracion($idU, $idP){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT * FROM valoraciones WHERE (idUsuario = '$idU') AND (idArticulo = '$idP')";
        $result = $conn->query($consulta);

        if($result->num_rows === 0){// no se ha conseguido ninguna coincidencia, no esta resgistrado
            return false; 
        }
        else{
            return true; 
        }
    }

    public function agregarVal(ValoracionProduc $val){
        $conn = $this->bd->conexionBD(); 
        $idU = $val->getIdUsu();
        $idP = $val->getIdArticulo();
        $punt = $val->getPuntuacion();

        $consulta = "INSERT INTO valoraciones (idUsuario, idArticulo, puntuacion) VALUES ('$idU','$idP','$punt')";

        $result = $conn->query($consulta);

        if($result === TRUE){
            return true; 
        }
        else{
            return false; 
        }
    }

    public function valoracionProd($idProd){
        $conn = $this->bd->conexionBD(); 
        $consulta = "SELECT SUM(puntuacion) FROM valoraciones WHERE (idArticulo = '$idProd')";
        $consulta1 = "SELECT COUNT(puntuacion) FROM valoraciones WHERE (idArticulo = '$idProd')";

        $result = $conn->query($consulta);
        $result1 = $conn->query($consulta1);

        $suma = $result->fetch_assoc();
        $num = $result1->fetch_assoc();

        $numVal = $num['COUNT(puntuacion)'];
        $sum = $suma['SUM(puntuacion)'];

        if($result && $numVal){
           return $punt = round($sum / $numVal);
        }

        return -1;

    }

}

?>
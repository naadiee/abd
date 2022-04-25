<?php
require_once('includes/DAO/valoracionProduc_DAO.php'); 
require_once('includes/clases/ValoracionProduc.php');

class valoracionProduc_SA{
    protected $DAO; // solo se peude acceder desde la clase SA o las que hereden de esta

    public function __construct(){
        $this->DAO = new valoracionProduc_DAO();
    }

    public function existeVal($idUsu, $idProd){
        return $this->DAO->existeValoracion($idUsu, $idProd);
    }

    public function nuevaVal($idUsu, $idProd, $punt){
        $val = new ValoracionProduc();
        $val->setIdUsu($idUsu);
        $val->setIdArticulo($idProd);
        $val->setPuntuacion($punt);

        return $this->DAO->agregarVal($val);
    }

    public function valoracionProducto($idProd){
        return $this->DAO->valoracionProd($idProd);
    }

}

?>
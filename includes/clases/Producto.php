<?php

    class Producto{
        private $id; 
        private $nombre; 
        private $des; 
        private $categoria; 
        private $estado; 
        private $precio; 
        private $talla; 
        private $img; 
        private $stock; 

        public function __construct($id="",$nombre="",$des="",$categoria="",$estado="",$precio=0,$talla="", $img="", $stock=""){
            $this->id = $id; 
            $this->nombre = $nombre; 
            $this->des = $des; 
            $this->categoria = $categoria;  
            $this->estado = $estado; 
            $this->precio = $precio; 
            $this->talla = $talla; 
            $this->img = $img; 
            $this->stock = $stock;
        }
        

        //**************************************************** GETTERS **************************************************** 

        public function getProductoID(){
           return $this->id;
        }

        //**************************************************** SETTERS **************************************************** 

        public function setProductoId($id){
            $this->id = $id;
        }

        public function createProduct($fila)
        {   
            $this->id = $fila['id'];
            $this->nombre = $fila['nombre']; //
            $this->des = $fila['descripcion']; //
            $this->categoria = $fila['categoria']; //0 -> en venta 1 -> vendido 2 -> reservado
            $this->estado = $fila['estado']; //
            $this->precio = $fila['precio']; //
            $this->talla = $fila['talla'];
            $this->img = $fila['img'];
            $this->stock = $fila['stock'];
        }
        
        
    }



?>
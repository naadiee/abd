<?php
// Para hacer mas escalable la aplicacion vamos a hacer uso de clases genericas (abstracta), la cual adaptaremos sus metodos dependiendo del uso que queremaos 
//Gracias a las clases abstractas que a partir de una clase general nos permite crear una mas concrear vamos a desarrollar el script para subir productos.
//Partimos de la clase abstracta Formulario la cual se ha sacado del campus virtual.

use es\ucm\fdi\aw\Formulario;

require_once('Formulario.php'); 
require_once('includes/clases/Producto.php'); 
require_once('includes/SA/producto_SA.php');

class subirProductoForm extends Formulario{

    public function __construct(){
        parent::__construct('subirProductoForm'); 
    }

    protected function generaCamposFormulario(&$datos){

        $html = <<<EOF
        
            
        <!--RADIO BUTTON-->
        <div class="radioBtn">
        <input type="radio" id="venta" name="estado" value="venta" onchange="mostrar(this.value);">
        <label for="venta">Venta</label>
        <input type="radio" id="alquiler" name="estado" value="alquiler" onchange="mostrar(this.value);">
        <label for="alquiler">Alquiler</label>
        <input type="radio" id="ventaYalquiler" name="estado" value="todo" onchange="mostrar(this.value);">
        <label for="alquiler">Venta y alquiler</label>
        </div>
            
        <!--NOMBRE DEL PRODUCTO-->
        <div class="nombreProduc">
        <input name="nombre-producto" type="text" placeholder="nombre producto" required>
        </div>

        <!--TALLA-->
        <div class="talla">
        <label for="talla-producto">Talla:</label>
        <input name="talla-producto" id="talla-producto" type="number" min="32" max="46" step="1" value="40" required>
        </div>

        <!--precios-->
        <div class="preciosAll">
        <div class="form-group" id="precio-venta-alquiler" style="display:none;">
            
            <label for="precio-venta-todo">Precio venta:</label>
            <input name="precio-venta-todo" id="precio-alquiler-venta" type="number" min="1" step="1" value="90" >
            
            <label for="precio-alquiler-todo">Precio al dia:</label>
            <input name="precio-alquiler-todo" id="precio-alquiler-todo" type="number" min="1" step="1" value="90" >
            
        </div>

        <div class="form-group" id="precio-venta" style="display:none;">
            <label for="precio-producto-venta">Precio venta:</label>
            <input name="precio-producto-venta" id="precio-producto-venta" type="number" min="1" step="1" value="90" >
        </div>

        <div class="form-group" id="precio-alquiler-dia" style="display:none;">
            <label for="precio-producto-alquiler">Precio al dia:</label>
            <input name="precio-producto-alquiler" id="precio-producto-alquiler" type="number" min="1" step="1" value="90" >
        </div>
        </div>
        
        <!--imagen-->
        <div class="imgContenedor">
        <label for="img">Imagen producto:</label>
        <input type="file" name="img" />
        </div>
        
        <div class="btnSubmit">
        <input type="submit" id="file-producto" name="subir" value="Subir producto"> 
        </div>
    
    EOF;
    return $html;
    }
    



}


?>
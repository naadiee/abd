<?php

    $datos = $producto_SA->getDatosProducto($_GET['id']); // conseguimos toda la info para mostrarla 
    
    $nombre = $datos['nombre']; 
    $precio = $datos['precio']; 
    $talla = $datos['talla'];
    $descripcion = $datos['descripcion'];
    $img = $datos['img'];
    $stock = $datos['stock'];
    $id = $_GET['id']; 

    if(isset($_SESSION['login']) && ($_SESSION['login'] === true) && $stock > 0){
        $sePuede = 'enabled';
    }
    else{
        $sePuede = 'disabled';
    }
    
   
   

echo "
   
<div class='mostrarProd'>
<div class='producto_img'> 
    <img src='img/$img' alt='imagen' class='imgProducto'>
</div> 

<div class='datosProductos'>
    <p><strong>$nombre</strong></p> 
    <p>Precio: <strong>$precio</strong> €</p>
    <p>Descripcion: </p>
    <p><strong>$descripcion</strong></p>
    <form action='gestionCarro.php' method='POST'>
    <input type='hidden' name='hidden_id' value='$id'>
    <select name='talla' id='talla'>
    <option value='S'>S</option>
    <option value='M'>M</option>
    <option value='L'>L</option>
    <option value='XL'>XL</option>
    </select>
    <br>
    <p>Unidades: <input type='number' name='unidades_compra' min='1' max='$stock'> 
    <input type='submit' id='add' name='add_car' value='Añadir al carrito' $sePuede></p>
    </form>
    <p>Stock: <strong>$stock</strong> </p>
</div>
</div>";
    ?>

    <?php
        require_once('includes/SA/ValoracionProduc_SA.php');
        
        $result = $tienda_SA->datosTienda(); 

        function valoracion($idP){
            $val = new valoracionProduc_SA();
            $valoracion = $val->valoracionProducto($idP);
            if($valoracion > -1){
                echo 'Valoracion: ' . $valoracion .'/5';
            }
            else{
                echo 'No hay valoraciones de este producto';
            }
        }
    ?>

    <div class="filaProductos">
    <?php
        foreach($result as $fila){ //falta corchete fin 
            $link = "producto.php?id=" . $fila["id"];

        ?>
        
          
            
                <div class="producto">
                    <a href=<?php echo "'$link'"?>> <img src='img/<?php echo $fila["img"]?>' alt='imagen'></a>
                    <h3 class="info-texto"><?php echo $fila["nombre"];?></h3>
                    <h3 class="info-texto"><?php echo $fila["precio"];?> €</h3>
                    <h4 class="info-texto"><?php valoracion($fila["id"])?></h4>

                </div>






           
        
        <?php } ?>
    


    </div>



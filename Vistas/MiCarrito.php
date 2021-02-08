<?php namespace Vistas;
$todos=null;




$total=0;

 ?>

<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-1 bg-alpha" style="text-align: center;">
	    	 <span class="glyphicon glyphicon-shopping-cart"></span>
	    	 <label class="titulo">Mi Carrito</label>
	    </div>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 bg-alpha">
			<table align="center" class="table" style="margin-top: 1%; width:70%">
				<tr bgcolor="#2154AE">

					<th width="400px">nombre</th>
					<th width="400px">$</th>
					<th width="400px">cantidad</th>
					<th width="400px">subtotal</th>
					<th width="400px"></th>
					
				</tr>
				
				<?php
				if(isset($_SESSION['productos'])){
				$todos=$_SESSION['productos'];	

					foreach ($todos as $producto) {
				?>
					<tr>   
					 <td>
					 <form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Productos/EliminardelCarrito" method="get" >
						<input type="hidden" name="id_producto" value="<?php echo $producto->getID(); ?>">
						
					   <?php echo $producto->getNombre(); ?></td>
					    <td><?php echo"$". $producto->getPrecio(); ?></td>
					     <td><?php echo $producto->getCantidad(); ?></td>
					     <td><?php  $subtotal=$producto->getCantidad()*$producto->getPrecio(); 
					     echo "$".$subtotal;
					      $total+=$subtotal; ?>
					      </td><td>
					      	<input type="submit" class="btn btn-danger btn-xs " name="" value="x">
					      </td>
					
					  
						
						</form>
						


					    		
					</tr>
					
				<?php 
					}
					 }else{
				echo "No hay productos agregados al carrito";
				} 
				 ?><tr><th>Total:</th>
				 </tr>
				 <tr>
				 <td><?php echo "$" .$total; ?></td>	
				</tr>
				
			</table>

			
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a> | <a href="../Inicio/ListarProductos">volver a Listado de Productos</a>
</div>
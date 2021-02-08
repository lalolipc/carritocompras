<?php namespace Vistas;
use Controladores\ProductosControlador as ProductoControlador;
$controller=new ProductoControlador();
$todos=$controller->TraerTodos();

 ?>


<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-1 bg-alpha" style="text-align: center;">
	    	<label class="titulo">LISTADO DE productos</label><br>
	    	<label style="font-size: 15px">Ingrese el nombre del producto que desea Eliminar</label>
	    	<form action="<?php echo FRONT_ROOT; ?>/Productos/EliminarProducto">
	    		<input type="text" required="required" name="nombre" style="width: 150px">
	    		<input type="submit" class="btn-danger" value="Eliminar">
	    	</form><br>
	    </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 bg-alpha">
			<table align="center" border="2" class="table" style="margin-top: 1%">
				<tr bgcolor="#2154AE">
					<th width="400px">NOMBRE</th>
					<th width="400px">PRECIO</th>
					<th width="400px"></th>
					
				</tr>
				
				<?php
					foreach ($todos as $producto) {
				?>
					<tr>
						
					    <td><?php echo $producto->getNombre(); ?></td>
					    <td><?php echo $producto->getPrecio(); ?></td>
					     <td><button class="btn btn-sm btn-info">AGREGAR AL CARRO</button></td>

					    		
					</tr>
				<?php 
					}
				 ?>
				 
			</table>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a> | <a href="../Inicio/AltaProducto">NUEVO Producto</a>
</div>
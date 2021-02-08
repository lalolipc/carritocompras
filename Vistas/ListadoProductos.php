<?php namespace Vistas;

use Controladores\ProductosControlador as ProductosControlador;
$controller=new ProductosControlador();
$todos=$controller->TraerTodos();
 ?>

<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-1 bg-alpha" style="text-align: center;">
	    	<label class="titulo">LISTADO DE PRODUCTOS</label>
	    </div>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 bg-alpha">
			<table align="center" class="table" style="margin-top: 1%; width:70%">
				<tr  bgcolor="#2154AE">
					<th  width="100px">Foto</th>
					<th  width="100px">Nombre</th>
					<th  width="100px">Pecio</th>
					<th  width="100px"></th>
					<th  width="100px"></th>
				


					
				</tr>
				
				<?php
					foreach ($todos as $producto) {
				?>
					<tr>
						<!--style="padding-top:  20px;-->
					    <td>
<?php /* <img src="/GocellaCarrito/<?php echo  URL_THEME ?><?php echo '../Controladores/img/'. $producto->getImgRuta(); ?>" style="width:100%"></td>*/ ?>
					    <img src="<?php echo "/GocellaCarrito/Vistas/images/". $producto->getImgRuta(); ?>" style="width:100%"></td>
					    <td ><?php echo $producto->getNombre(); ?></td>
					    <td ><?php echo $producto->getPrecio(); ?></td>
					   
					  
<form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Productos/AgregarACarrito" method="get" >
<td>
cantidad: <input min="1" name="cantidades" type="number" style="width:30%" value="1">
<span class="glyphicon glyphicon-shopping-cart">

<input type="hidden" name="id_producto" value="<?php echo $producto->getID(); ?>">

<input type="submit" name=""  class="btn btn-info btn-xs " value="+ MICARRITO"></td>
</form>

		
		
	

					    		
					</tr>
				<?php 
					}
				 ?>
				 
			</table>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a> | <a href="../Inicio/IrAmiCarrito">Mi  Carrito</a>
</div>
 
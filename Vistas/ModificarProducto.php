<?php namespace Vistas;
use Controladores\ProductosControlador as ProductosControlador;
use Modelo\Producto as Producto;
$controller=new ProductosControlador();
$todos=$controller->TraerTodos();



 ?>

 <div class="container">
    <div class="col-md-6 col-md-offset-3 bg-alpha" style="text-align: center;">
    	<label class="titulo">Modificar Producto</label>
    	<br>
    	<label>seleccionar producto</label>
    	<br>
    	<table><tr>
    	
    	<form action="<?php echo FRONT_ROOT; ?>/Productos/SelectModificarProducto" method="post">
    	<select style="color:black" name="SelectProducto"> <!--Supplement an id here instead of using 'name'-->
    	<?php foreach ($todos as $p){ ?>
    	<option value="<?php echo $p->getID(); ?>"><p style="color:black;"><?php echo $p->getNombre(); ?></p></option> 
    	<?php }?>
    	</tr>
    	<tr>
    	<input type="submit" name="" value="aceptar">
    	
    	</form>
    	</tr></table>
    	<br>
    	<br>
  		
  		
</select>
    </div>
</div>  



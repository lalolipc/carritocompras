  <?php $p=$_SESSION['producto'];  ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Productos/Update" method="post" >
				<p>
				<label class="lab" for="nombre">nombre</label><br>
				<input type="text" name="nombre" id="nombre" required="required" size="30" value="<?php echo $p->getNombre(); ?>">
				<br>
				<label class="lab" for="precio">precio</label><br>
				<input type="text" name="precio" id="precio"  required="required" size="30" value="<?php echo $p->getPrecio(); ?>">
				<br>
				<input type="hidden" name="id_producto" id="id_producto"  size="30" value="<?php echo $p->getID(); ?>">
				<input type="submit" class="btn btn-success" value="Cargar Producto">
				<br><br>
				<input type="reset" class="btn btn-danger" value="Limpiar Campos">
				</p>
            </form>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a>
</div>
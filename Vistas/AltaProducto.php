<?php $foto_perfil=""; ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-alpha" style="text-align: center;">
    	<label class="titulo">ALTA DE Productos</label>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="bg-alpha"  action="/Productos/AltaProducto" method="post" enctype="multipart/form-data">
				<p>
				<label class="lab" for="nombre">nombre</label><br>
				<input type="text" name="nombre" id="nombre" required="required" size="30">
				<br>
				<label class="lab" for="precio">precio</label><br>
				<input type="text" name="precio" id="precio"  required="required" size="30">
				<br>
				
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



<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-alpha" style="text-align: center;">
    	<label class="titulo">ALTA DE CLIENTES</label>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Clientes/AltaCliente" method="post" >
				<p>
				<label class="lab" for="apellido">Apellido</label><br>
				<input type="text" name="apellido" id="apellido" required="required" size="30">
				<br>
				<label class="lab" for="nombre">Nombre</label><br>
				<input type="text" name="nombre" id="nombre"  required="required" size="30">
				<br>
				<label class="lab" for="dni">DNI</label><br>
				<input type="number" name="dni" id="dni" maxlength="5" required="required" style="width: 200px">
				<br>
				<label class="lab" for="domicilio">Domicilio</label><br>
				<input type="text" name="domicilio" required="required" size="30">
				<br>
				<label class="lab" for="email">Email</label><br>
				<input type="email" name="email" id="email" required="required" size="30">
				<br><br>
				<input type="submit" class="btn btn-default" value="CARGAR CLIENTE">
				<br><br>
				<input type="reset" class="btn btn-edit btn-sm btn-info" value="Limpiar Campos">
				</p>
            </form>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a>
</div>


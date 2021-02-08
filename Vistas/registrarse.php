<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-alpha" style="text-align: center;">
    	<label class="titulo">ALTA DE CLIENTES</label>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Usuarios/AltaUsuario" method="post" >
				<p>
				<label class="lab" for="nick">nick</label><br>
				<input type="text" name="nick" id="nick" required="required" size="30">
				<br>
				<label class="lab" for="pass">pass</label><br>
				<input type="text" name="pass" id="pass"  required="required" size="30">
				<br>
				<br>
				<input type="submit" class="btn btn-success" value="CARGAR USUARIO">
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
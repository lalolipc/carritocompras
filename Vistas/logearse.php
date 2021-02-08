	
<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-alpha" style="text-align: center;">
    	<label class="titulo">LOGIN</label>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="inicio" class="bg-alpha" action="<?php echo FRONT_ROOT; ?>/Usuarios/logearse" method="post" >
				
				<br>
				<?php echo "podes usar nick : mario y  contraseña:1"; ?>
				<br>
				<label class="lab" for="nick">nick</label><br>
				<input type="text" name="nick" id="nick" required="required" size="30">
				<br>
				<label class="lab" for="pass">pass</label><br>
				<input type="password" name="pass" id="pass"  required="required" size="30">
				<br>
				<br>
				<input type="submit" class="btn btn-default" value="Ingresar">
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
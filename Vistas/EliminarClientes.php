<?php namespace Vistas; 

use Controladores\ClientesControlador as ClientesControlador;

$controller = new ClientesControlador();

$listaClientes = $controller->TraerTodos();

?>
<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-1 bg-alpha" style="text-align: center;">
	    	<label class="titulo">LISTADO DE CLIENTES</label><br>
	    	<label style="font-size: 15px">Ingrese el DNI del Cliente que desea Eliminar</label>
	    	<form action="<?php echo FRONT_ROOT; ?>/Clientes/EliminarCliente">
	    		<input type="number" required="required" name="dni" style="width: 150px">
	    		<input type="submit" class="btn-danger" value="Eliminar">
	    	</form><br>
	    </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 bg-alpha">
			<table align="center" border="2" class="table" style="margin-top: 1%">
				<tr bgcolor="#BD1919">
					<th width="400px">APELLIDO</th>
					<th width="400px">NOMBRE</th>
					<th width="130px">DNI</th>
					<th width="300px">DOMICILIO</th>
					<th width="300px">EMAIL</th>
					<th width="200px">FECHA ALTA</th>
				</tr>
				
				<?php
					foreach ($listaClientes as $cliente) {
				?>
					<tr>
						<td><?php echo $cliente->getApellido(); ?></td>
					    <td><?php echo $cliente->getNombre(); ?></td>
					    <td><?php echo $cliente->getDni(); ?></td>
					    <td><?php echo $cliente->getDomicilio(); ?></td>
					    <td><?php echo $cliente->getEmail(); ?></td>
						<td><?php echo $cliente->getFechaAlta(); ?></td>		
					</tr>
				<?php 
					}
				 ?>
				 
			</table>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a>
</div>

<?php namespace Vistas; 

use Controladores\ClientesControlador as ClientesControlador;

$controller = new ClientesControlador();

$listaClientes = $controller->TraerTodos();

?>
<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-1 bg-alpha" style="text-align: center;">
	    	<label class="titulo">LISTADO DE CLIENTES</label>
	    </div>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 bg-alpha">
			<table align="center" border="2" class="table" style="margin-top: 1%;width:70%;">
				<tr bgcolor="#2154AE">
					<th width="400px">APELLIDO</th>
					<th width="400px">NOMBRE</th>
					<th width="130px">DNI</th>
					
				</tr>
				
				<?php
					foreach ($listaClientes as $cliente) {
				?>
					<tr>
						<td><?php echo $cliente->getApellido(); ?></td>
					    <td><?php echo $cliente->getNombre(); ?></td>
					    <td><?php echo $cliente->getDni(); ?></td>
								
					</tr>
				<?php 
					}
				 ?>
				 
			</table>
        </div>
    </div>
</div>
<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a> | <a href="../Inicio/AltaCliente">NUEVO CLIENTE</a>
</div>

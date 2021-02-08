<?php namespace Controladores;

use Modelo\Cliente as Cliente;
use Dao\DaoClientes as DaoClientes;
use \Exception as Exception;
use \PDOException as PDOException;

class ClientesControlador{

	#Atributes
	private $Clientes = array();
	private $DaoClientes;
	

	#Contruct
	function __construct(){
		$this->DaoClientes = DaoClientes::getInstance();
	}

	#Methodss
	public function AltaCliente($ape, $nomb, $dni, $domi, $email)
	{
		if( strlen($dni) == 8 && $this->BuscarClientePorDni($dni) == null)
		{	
			try{
				$nuevo = new Cliente($ape, $nomb, $dni, $domi, $email);
				
				$this->DaoClientes->Agregar($nuevo);

				echo "<script> if(alert('Nuevo Cliente ingresado!'));</script>";
				include_once URL_THEME . 'ListadoClientes.php';
			}
			catch(PDOException $ex)
			{
				echo "<script>alert('ERROR, NO FUE POSIBLE AGREGAR EL CLIENTE.\\nVuelva a intentarlo! ');</script>";
				include_once URL_THEME . 'AltaCliente.php';
			}
			catch(Exception $e)
			{
				echo "<script> if(alert('SE ROMPIO EN OTRO LADO, BYE!'));</script>";
				include_once URL_THEME . 'AltaCliente.php';
			}
		}
		else
		{
			echo "<script> if(alert('Ya se encuentra un Cliente con ese DNI.\\n\\n Ingrese un Nuevo Cliente!'));</script>";  
			include_once URL_THEME . 'AltaCliente.php';
		}
	}

	private function BuscarClientePorDni($dni)
	{
		$resp = null;

		if(isset($dni) && !empty($dni))
		{
			try {
				$resp = $this->DaoClientes->TraerPorDni($dni);
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar traer un Cliente!');</script>";  
				include_once URL_THEME . 'AltaCliente.php';
			}
		}

		return $resp;
	}

	public function TraerTodos(){

		try {
			return $this->DaoClientes->TraerTodos();
		} catch (Exception $e) {
			echo "<script>alert('Upps, hubo un error al intentar Listar todos los Clientes!');</script>";
		}
	}

	function EliminarCliente($dni) 
	{
		if(isset($dni) && !empty($dni))
		{
			try 
			{
				if($this->BuscarClientePorDni($dni) != null)
				{
					$this->DaoClientes->Eliminar($dni);

					echo "<script>alert('Cliente Eliminado!');</script>";
				}
				else{
					echo "<script>alert('Upps, el DNI ingresado no es Valido, vuelva a intentar!');</script>";
				}

				include_once URL_THEME . 'EliminarClientes.php';
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar Eliminar el Cliente!');</script>";  
				include_once URL_THEME . 'Inicio.php';
			}			
		}
	}
}
?>
<?php namespace Dao;

use Dao\Connection as Connection;
use Dao\IDao as IDao;
use \Exception as Exception;
use \PDOException as PDOException;
use Modelo\Cliente as Cliente;

class DaoClientes implements IDao
{
	private $Clientes;
	protected $table = 'clientes';
	private static $instance;


public static function getInstance(){
	if(!self::$instance instanceof self){
		self::$instance=new self();
	}
	return self::$instance;
}


    public function Agregar($cliente)
    {
    	try 
    	{
    		$query = 'INSERT INTO '.$this->table.' (Apellido, Nombre, Dni, Domicilio, Email, FechaAlta) VALUES (:apellido, :nomb, :dni, :domicilio, :email, now())';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$apellido = $cliente->getApellido();
			$nombre = $cliente->getNombre();
			$dni = $cliente->getDni();
			$domicilio = $cliente->getDomicilio();
			$email = $cliente->getEmail();

			$command->bindParam(':apellido', $apellido);
			$command->bindParam(':nomb', $nombre);
			$command->bindParam(':dni', $dni);
			$command->bindParam(':domicilio', $domicilio);
			$command->bindParam(':email', $email);
			$command->execute();

    	}
    	catch (PDOException $ex) {
			throw $ex;
    	}
    	catch (Exception $e) {
			throw $e;
    	}
    }
    //public function actualizar($value);
    public function Eliminar($value){
    	try 
    	{
    		$query = 'DELETE FROM '.$this->table.' WHERE Dni = :dni ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':dni', $value );
			$command->execute();
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}
    }

    public function TraerUno($value)
    {
    	try 
    	{
    		$equipo = null;

    		$query = 'SELECT * FROM '.$this->table.' WHERE Nombre = :nombre ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':nombre', $value );
			$command->execute();

			while ($row = $command->fetch())
			{
				$id = $row['IdEquipo'];
				$nomb = $row['Nombre'];	
				$dire = $row['Direccion'];
				$FechFun = $row['FechaFundacion'];

				$equipo = new Equipo($nomb, $dire, $FechFun);
				$equipo->setID($id);
			}

			return $equipo;
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}
    }

    public function TraerPorDni($value)
    {
    	try 
    	{
    		$cliente = null;

    		$query = 'SELECT * FROM '.$this->table.' WHERE Dni = :dni ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':dni', $value);
			$command->execute();

			while ($row = $command->fetch())
			{
				$clienteId = $row['ID'];
				$ape = $row['Apellido'];
				$nomb = $row['Nombre'];
				$dni = $row['Dni'];
				$domi = $row['Domicilio'];
				$email = $row['Email'];
				$fech = $row['FechaAlta'];

				$cliente = new Cliente($ape, $nomb, $dni, $domi, $email);
				$cliente->setFechaAlta($fech);
				$cliente->setID($clienteId);
			}

			return $cliente;
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}
    }

    public function TraerTodos(){
    	try 
    	{
    		$this->Clientes = array();

    		$query = 'SELECT * FROM ' . $this->table . ' ORDER BY Apellido, Nombre';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->execute();

			while ($row = $command->fetch())
			{
				$clienteId = $row['ID'];
				$ape = $row['Apellido'];
				$nomb = $row['Nombre'];
				$dni = $row['Dni'];
				$domi = $row['Domicilio'];
				$email = $row['Email'];
				$fech = $row['FechaAlta'];

				$cliente = new Cliente($ape, $nomb, $dni, $domi, $email);
				$cliente->setFechaAlta($fech);
				$cliente->setID($clienteId);

				array_push($this->Clientes, $cliente);
			}

			return $this->Clientes;
		}
		catch(Exception $e)
		{
			throw new Exception("Error Processing Request", 1);
		}
    }
    
}

 ?>
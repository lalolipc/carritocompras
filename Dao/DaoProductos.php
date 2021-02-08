<?php namespace Dao;
use Dao\Connection as Connection;
use Dao\IDaoProductos as IDaoProductos;
use \Exception as Exception;
use \PDOException as PDOException;
use Modelo\Producto as Producto;

class DaoProductos implements IDaoProductos{
	private static $instance;
	private $productos;
	private $table='productos';



public static function getInstance(){
	if(!self::$instance instanceof self){
		self::$instance=new self();
	}
	return self::$instance;
}
	public function Agregar($producto){
		
		try{
			

		
		$sql='INSERT INTO '.$this->table.'(nombre,precio,foto)VALUES(:nombre,:precio,:ruta)';
		$pdo=new Connection();
		$connection=$pdo->Connect();
		$command=$connection->prepare($sql);
		$nombre=$producto->getNombre();
		$precio=$producto->getPrecio();
		$ruta=$producto->getImgRuta();
		
  		//$query = "INSERT INTO tbl_images(name) VALUES ('$file')";

		$command->bindParam(':nombre',$nombre);
		$command->bindParam(':precio',$precio);
		$command->bindParam(':ruta',$ruta);
		$command->execute();
		}
		catch(PDOException $ex){
			throw $ex;
		}
		catch(Exception $e){
			throw $e;
		}
	}

	public function TraerPorNombre($nombre){
		try 
    	{
    		$producto = null;

    		$query = 'SELECT * FROM '.$this->table.' WHERE nombre = :nombre ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':nombre', $nombre);
			$command->execute();

			while ($row = $command->fetch())
			{
				$id = $row['ID'];
				$nombre = $row['nombre'];
				$precio = $row['precio'];
				

				$producto = new Producto($nombre, $precio);
				
				$producto->setID($id);
			}

			return $producto;
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}



		
	}
	public function TraerPorID($ID){
		try 
    	{
    		$producto = null;

    		$query = 'SELECT * FROM '.$this->table.' WHERE ID = :ID ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':ID', $ID);
			$command->execute();

			while ($row = $command->fetch())
			{
				$ID = $row['ID'];
				$nombre = $row['nombre'];
				$precio = $row['precio'];
				

				$producto = new Producto($nombre, $precio);
				
				$producto->setID($ID);
			}

			return $producto;
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}



	}

	public function TraerTodos(){
		
		try{
			$this->productos=array();
			$sql='SELECT *from '.$this->table;
			$pdo=new Connection();
			$connection=$pdo->Connect();
			$command=$connection->prepare($sql);
			$command->execute();
			while($row = $command->fetch()){

				$nombre=$row['nombre'];
				$precio=$row['precio'];
				$imgRuta=$row['foto'];
				$id=$row['ID'];
				$nuevoProducto=new Producto($nombre,$precio);
				$nuevoProducto->setImgRuta($imgRuta);
				$nuevoProducto->setID($id);
				array_push($this->productos, $nuevoProducto);

				
			}
			return $this->productos;
			}catch(Exception $ex){
				throw new Exception("Error Processing Request", 1);
				
			}
		}


    public function Eliminar($value){
    	try 
    	{
    		$query = 'DELETE FROM '.$this->table.' WHERE nombre = :value ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':value', $value );
			$command->execute();
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}
    }

     public function Update($nombre,$precio,$id_producto){
    	try 
    	{
    		$sql = "Update  productos set  nombre= (:nombre),precio=(:precio) where ID=:id_producto ";
    		

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($sql);

			$command->bindParam(':nombre', $nombre );
			$command->bindParam(':precio', $precio );
			$command->bindParam(':id_producto', $id_producto );
			$command->execute();
		}
		catch(PDOException $pdoEx){
			throw $pdoEx;
		}
		catch(Exception $ex){
			throw $ex;
		}
    }

		
}

 ?>
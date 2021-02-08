<?php namespace Dao;
use Dao\Connection as Connection;
use Dao\IDaoUsuario as IDaoUsuario;
use \Exception as Exception;
use \PDOException as PDOException;
use Modelo\Usuario as Usuario;

class DaoUsuarios implements IDaoUsuario{

	private $Usuarios;
	protected $table = 'usuarios';
	private static $instance;


public static function getInstance(){
	if(!self::$instance instanceof self){
		self::$instance=new self();
	}
	return self::$instance;
}




	public function Agregar($usuario){
		try 
    	{
    		$query = 'INSERT INTO '.$this->table.' (nick, pass) VALUES (:nick, :pass)';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$nick = $usuario->getNick();
			$pass = $usuario->getPass();
		

			$command->bindParam(':nick', $nick);
			$command->bindParam(':pass', $pass);
			
			$command->execute();

    	}
    	catch (PDOException $ex) {
			throw $ex;
    	}
    	catch (Exception $e) {
			throw $e;
    	}
	}

	public function BuscarPorNick($nick){
		try 
    	{
    		$usuario = null;

    		$query = 'SELECT * FROM '.$this->table.' WHERE nick = :nick ';

			$pdo = new Connection();
			$connection = $pdo->Connect();
			$command = $connection->prepare($query);

			$command->bindParam(':nick', $nick);
			$command->execute();

			while ($row = $command->fetch())
			{
				$usuarioId = $row['ID'];
				$nick = $row['nick'];
				$pass = $row['pass'];
				

				$usuario = new Usuario($nick, $pass);
				$usuario->setID($usuarioId);
			}

			return $usuario;
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

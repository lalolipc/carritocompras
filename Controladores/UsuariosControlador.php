<?php namespace Controladores;

use Modelo\Usuario as Usuario;
use Dao\DaoUsuarios as DaoUsuarios;
use \Exception as Exception;
use \PDOException as PDOException;

class UsuariosControlador{

	#Atributes
	private $Clientes = array();
	private $DaoUsuarios;
	

	#Contruct
	function __construct(){
		$this->DaoUsuarios = DaoUsuarios::getInstance();
	}
	 public function index() 
        {
        	include_once URL_THEME .'Inicio.php';
        }

	#Methodss
	public function AltaUsuario($nick,$pass)
	{
		if(isset($nick) && isset($pass) && $this->existeNick($nick)==null){


	try{
				$nuevo = new Usuario($nick,$pass);
				
				$this->DaoUsuarios->Agregar($nuevo);

				echo "<script> if(alert('Nuevo Usuario ingresado!'));</script>";
				include_once URL_THEME . 'Inicio.php';
			}
			catch(PDOException $ex)
			{
				echo "<script>alert('ERROR, Vuelva a intentar.\\nVuelva a intentarlo! ');</script>";
				include_once URL_THEME . 'AltaUsuario.php';
			}
			catch(Exception $e)
			{
				echo "<script> if(alert('ERROR, Vuelva a intentar'));</script>";
				include_once URL_THEME . 'AltaUsuario.php';
			}
		}
		else
		{
			echo "<script> if(alert('Ya se encuentra un Cliente con ese usuaio.\\n\\n Ingrese un Nuevo Cliente!'));</script>";  
			include_once URL_THEME . 'AltaUsuario.php';
		}
	}

	public function logearse($nick,$pass){
		

		$user=$this->DaoUsuarios->BuscarPorNick($nick);
		if($user!=null && $user->getNick()==$nick){
		
			if($user->getPass()==$pass){


			try{
				$_SESSION['usuario']=$user;
			
				echo'
				<script language=javascript>
					alert("bienvenido")
					self.location="../index.php";
				</script>
				';
			
			}catch(PDOException $ex)
			{
				echo "<script>alert('ERROR, Vuelva a intentar.\\nVuelva a intentarlo! ');</script>";
					include_once URL_THEME . 'logearse.php';
			}
			catch(Exception $e)
			{
				echo "<script> if(alert('ERROR, Vuelva a intentar'));</script>";
					include_once URL_THEME . 'logearse.php';
			}
		}else{
			echo "<script> if(alert('error al ingresar password'));</script>";  
				include_once URL_THEME . 'logearse.php';

		} 
		 

		}else
		{
			echo "<script> if(alert('error al ingresar los datos'));</script>";  
				include_once URL_THEME . 'logearse.php';
			
		}
	
	
			
	}


public function CloseSession(){


session_destroy();
echo'
<script language=javascript>
alert("su sesion ha terminado")
self.location="../index.php";
</script>
';
    
}

	public function existeNick($nick){
		
		$usuario = null;

		if(isset($nick) && !empty($nick))
		{
			try {
				$usuario = $this->DaoUsuarios->BuscarPorNick($nick);
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar traer un usurio!');</script>";  
				include_once URL_THEME . 'AltaUsuario.php';
			}
		}

		return $usuario;

	}

	


}
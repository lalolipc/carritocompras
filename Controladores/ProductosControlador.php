<?php namespace Controladores;

use Modelo\Producto as Producto;
use Dao\DaoProductos as DaoProductos;
use \Exception as Exception;
use \PDOException as PDOException;


class ProductosControlador{

	#Atributes
	private $productos;
	private $DaoProductos;
	

	

	#Contruct
	function __construct(){
		$this->DaoProductos = DaoProductos::getInstance();
	}

	#Methodss
	/*
	public function AltaProducto()
	{
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		//$foto=$_FILES["image"]["name"];

		$imgRuta=basename($_FILES['foto_perfil']['name']);
	
		try{
				$nuevo = new Producto($nombre,$precio);
				$nuevo->setImgRuta($imgRuta);
				
				$this->DaoProductos->Agregar($nuevo);

				echo "<script> if(alert('Nuevo producto ingresado!'));</script>";
				include_once URL_THEME . 'ListadoProductos.php';
			}
			catch(PDOException $ex)
			{
				echo "<script>alert('ERROR, NO FUE POSIBLE AGREGAR EL CLIENTE.\\nVuelva a intentarlo! ');</script>";
				include_once URL_THEME . 'AltaProducto.php';
			}
			catch(Exception $e)
			{
				echo "<script> if(alert('error general!'));</script>";
				include_once URL_THEME . 'AltaProducto.php';
			}
	}*/

	private function BuscarProductoPorNombre($nombre)
	{
		$resp = null;

		if(isset($nombre) && !empty($nombre))
		{
			try {
				$resp = $this->DaoProductos->TraerPorNombre($nombre);
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar traer un producto!');</script>";  
				include_once URL_THEME . 'AltaProducto.php';
			}
		}

		return $resp;
	}


	private function BuscarProductoPorID($ID)
	{
		$resp = null;

		if(isset($ID) && !empty($ID))
		{
			try {
				$resp = $this->DaoProductos->TraerPorID($ID);
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar traer un producto!');</script>";  
				
			}
		}

		return $resp;
	}

	public function TraerTodos(){

		try {
			return $this->DaoProductos->TraerTodos();
		} catch (Exception $e) {
			echo "<script>alert('Upps, hubo un error al intentar Listar todos los productos!');</script>";
		}
	}

	function EliminarProducto($nombre) 
	{
		if(isset($nombre) && !empty($nombre))
		{
			try 
			{

				if($this->BuscarProductoPorNombre($nombre) != null)
				{
					$this->DaoProductos->Eliminar($nombre);

					echo "<script>alert('Producto Eliminado!');</script>";
				}
				else{
					echo "<script>alert('Upps, el nombre ingresado no es Valido, vuelva a intentar!');</script>";
				}

				include_once URL_THEME . 'EliminarProductos.php';
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar Eliminar el Producto!');</script>";  
				include_once URL_THEME . 'Inicio.php';
			}			
		}
	}


	public function AgregarACarrito($cantidades,$id_producto){
		if(isset($id_producto) && !empty($id_producto))
		{
			try 
		
			{	
			$ElProducto=$this->BuscarProductoPorID($id_producto);
			$ExisteEnArreglo=$this->buscarProductoEnArreglo($id_producto);
			if($ExisteEnArreglo== null)
				{
				$this->ListaEnSession();
				$ElProducto->setCantidad($cantidades);
				array_push($this->productos, $ElProducto);

				
				$_SESSION['productos'] = $this->productos;
				echo "<script>alert('producto agregado exitosamente!');</script>"; 
			
				}
				else{
					
					$_SESSION['productos'] = $this->sumarCantidadProducto($id_producto,$cantidades);
					echo "<script>alert('producto agregado exitosamente!');</script>"; 
					
				}

				include_once URL_THEME . 'ListadoProductos.php';
			} 
			catch (Exception $e) {
				echo "<script>alert('Upps, hubo un error al intentar agregar el Producto!');</script>";  
				include_once URL_THEME . 'ListadoProductos.php';
			}			
		}

	
	}

	public function traerProductos(){
		return $productos;
	}
	public function buscarProductoEnArreglo($id_producto){
		$this->ListaEnSession();
		$producto=null;
	    	foreach ($this->productos as $key => $p) 
	    	{    		
	    		if ( $p->getID() == $id_producto) {
						$producto=$p;
					}
				}
	    	
	    	return $producto;
	}
	public function sumarCantidadProducto($id_producto,$cantidades){
		$this->ListaEnSession();
		$anterior=0;
	    	foreach ($this->productos as $key => $p) 
	    	{    		
	    		if ( $p->getID() == $id_producto) {
						$anterior=$p->getCantidad();
						$anterior+=$cantidades;
						$p->setCantidad($anterior);
					
					}
				}
	    	
	    	return $this->productos ;
	}
	public function EliminardelCarrito($id_producto){


			if(isset($id_producto)){
			$this->ListaEnSession();
	    	foreach ($this->productos as $key => $p) 
	    	{    		
	    		if ( $p->getID() == $id_producto) {
						unset($this->productos[$key]);
					}
				}
	    	}
	    	$_SESSION['productos'] = $this->productos;


				include_once URL_THEME . 'MiCarrito.php';
	}
	
		
	
	public function ListaEnSession(){
    	if(isset($_SESSION['productos']) && !empty($_SESSION['productos'])){
			$this->productos = $_SESSION['productos'];
		}
		else{
			$this->productos = array();
			$_SESSION['productos'] = $this->productos;
		}
    }

    public function SelectModificarProducto($SelectProducto){
    	
    	$p=$this->BuscarProductoPorID($SelectProducto);
    	$_SESSION['producto']=$p;
    	$this->ListaEnSession();
    	include_once URL_THEME . 'ModificarProducto.php';
    	include_once URL_THEME . 'ProductoFormularioUpdate.php';
    
    }
    public function Update($nombre,$precio,$id_producto){
    	$this->DaoProductos->Update($nombre,$precio,$id_producto);
    	$p=$this->BuscarProductoPorID($id_producto);
    	$_SESSION['producto']=$p;
    	$this->ListaEnSession();
    	include_once URL_THEME . 'ModificarProducto.php';
    	include_once URL_THEME . 'ProductoFormularioUpdate.php';
    	include_once URL_THEME . 'ListadoProductos.php';

    }

}
?>
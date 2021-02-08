<?php namespace Modelo;
use Modelo\Producto;
class Carro{
	private $cantidad;
	private $producto;
	private $total;
	private $productos;


	/**
	 * Class Constructor
	 * @param    $cantidad   
	 * @param    $precioSubTotal   
	 * @param    $producto   
	 * @param    $total   
	 */
	public function __construct($cantidad, $precioSubTotal, $producto, $total)
	{
		$this->cantidad = $cantidad;
		$this->precioSubTotal = $precioSubTotal;
		$this->producto = $producto;
		$this->total = $total;
	}

public function agregar($p){
	$resp = true;
		foreach ($this->productos as $p) 
		{
			if($p->getID() == $p->getID())
			{
				$resp = false;
			}
		}
		if($resp){
			array_push($this->productos, $emp);
		}
}


	public function AgregarACarrito($id_producto){
		if(isset($id_producto) && !empty($id_producto))
		{
			try 
		
			{	
			//$p=$this->BuscarProductoPorID($id_producto);
			$p=buscarProductoEnArreglo($id_producto);
			if($p!= null)
				{
				$this->ListaEnSession();
				array_push($this->productos, $p);
				$_SESSION['productos'] = $this->productos;
				include_once URL_THEME . 'ListadoProductos.php';
				}
				else{

					echo "<script>alert('Upps, el producto ingresado no es Valido, vuelva a intentar!');</script>";
					include_once URL_THEME . 'ListadoProductos.php';
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
	    	}
	    	return $producto;
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




}

 ?>
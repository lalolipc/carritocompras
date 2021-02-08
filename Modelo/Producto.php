<?php namespace Modelo;
class Producto{
	
	private $ID;
	private $nombre;
	private $precio;
    private $cantidad;
    private $subtotal;
    private $imgRuta;



	/**
	 * Class Constructor
	 * @param    $nombre   
	 * @param    $precio   
	 */
	public function __construct($nombre, $precio)
	{
		$this->nombre = $nombre;
		$this->precio = $precio;
        
	}



    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     *
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }


  


    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     *
     * @return self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
    

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     *
     * @return self
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

   

    /**
     * @return mixed
     */
    public function getImgRuta()
    {
        return $this->imgRuta;
    }

    /**
     * @param mixed $imgRuta
     *
     * @return self
     */
    public function setImgRuta($imgRuta)
    {
        $this->imgRuta = $imgRuta;

        return $this;
    }
}
 ?>

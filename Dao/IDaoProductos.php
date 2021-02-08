<?php namespace Dao;
interface IDaoProductos{
	public function Agregar($producto);
	public function TraerPorNombre($nombre);
	public function TraerTodos();
	public function Eliminar($value);
	public function TraerPorID($ID);
	public function Update($nombre,$precio,$id_producto);
}
 ?>

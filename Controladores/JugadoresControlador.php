<?php namespace Controladores;

use Modelo\Jugador as Jugador;
use Dao\DaoJugadores as DaoJugadores;
use Dao\DaoEquipos as DaoEquipos;

class JugadoresControlador {

	protected $jugadores = array();
	protected $DaoJugadores;
	protected $DaoEquipos;

	public function __construct() {
		$this->DaoEquipos = new DaoEquipos();
		$this->DaoJugadores = new DaoJugadores();
	}

	public function getJugadores(){
		return $this->jugadores;
	}

	public function AltaJugador($nomb, $ape, $dni, $alt, $numCam, $idEquipo) {
		//
		if($this->BuscarJugadorPorDni($dni) == null && strlen($dni) == 8)
		{
			$nuevo = new Jugador($nomb, $ape, $dni, $alt, $numCam, $idEquipo);
			$this->DaoJugadores->Agregar($nuevo);

			echo "<script> if(alert('Nuevo Jugador ingresado!'));</script>";
			include_once URL_THEME . 'ListadoJugadores.php';
		}
		else
		{
			echo "<script> if(alert('Ya se encuentra un jugador con ese DNI.\\n\\nVerifique que todos los datos sean Correctos!'));</script>";  
			include_once URL_THEME . 'AltaJugador.php';
		}
	}

	private function BuscarJugadorPorDni($dni){
		$resp = null;

		if(isset($dni) && !empty($dni))
		{
			return $this->DaoJugadores->TraerUno($dni);
		}

		return $resp;
	}

	private function BuscarEquipoPorId($id){ 
		$resp = null;

		if(isset($id) && !empty($id))
		{
			return $this->DaoJugadores->TraerUnoPorID($id);
		}

			return $resp;
	}

	function TraerUno($dni){
		return $this->DaoJugadores->TraerUno($dni);
	}

	function TraerTodos(){
		try {
			return $this->DaoJugadores->TraerTodos();
		} catch (PDOException $pdoEx) {
			echo "<script>alert('Upps, hubo un Error al intentar traer todos los Jugadores!'));</script>";
		}
	}

	function EliminarJugador($id) {
		try {
			$this->DaoJugadores->Eliminar($id);

			echo "<script> if(alert('Jugador Eliminado!'));</script>";
			
		} catch (Exception $e) {
			echo "<script>alert('Upps, hubo un Error al intentar Eliminar al Jugador!'));</script>";
		}

		include_once URL_THEME . 'ListadoJugadores.php';
	}

	public function Alistar($idEquipo){
		try {
			$this->jugadores = $this->DaoJugadores->JugadoresPorEquipo($idEquipo);
			
		} catch (Exception $e) {
			echo "<script>alert('Upps, hubo un Error al intentar Listar Los Jugadores por Equipo!'));</script>";
		}

		include_once URL_THEME . 'ListadoJugadores.php';
	}

}
?>
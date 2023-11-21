<?php
/*

	Clase jugador


*/

class Jugador
{
	//Atributos de la clase
	private $id;
	private $nombre;
	private $numero;
	private $pais;
	private $equipo;
	private $posiciones;
	private $contrato;


	// Creamos el constructor
	public function __construct($id = null, $nombre = null, $numero = null, $pais = null, $equipo = null, $posiciones = [], $contrato = null)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->numero = $numero;
		$this->pais = $pais;
		$this->equipo = $equipo;
		$this->posiciones = $posiciones;
		$this->contrato = $contrato;

	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self
	{
		$this->id = $id;
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
	 * @return self
	 */
	public function setNombre($nombre): self
	{
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * @param mixed $numero 
	 * @return self
	 */
	public function setNumero($numero): self
	{
		$this->numero = $numero;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPais()
	{
		return $this->pais;
	}

	/**
	 * @param mixed $pais 
	 * @return self
	 */
	public function setPais($pais): self
	{
		$this->pais = $pais;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEquipo()
	{
		return $this->equipo;
	}

	/**
	 * @param mixed $equipo 
	 * @return self
	 */
	public function setEquipo($equipo): self
	{
		$this->equipo = $equipo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPosiciones()
	{
		return $this->posiciones;
	}

	/**
	 * @param mixed $posiciones 
	 * @return self
	 */
	public function setPosiciones($posiciones): self
	{
		$this->posiciones = $posiciones;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContrato()
	{
		return $this->contrato;
	}

	/**
	 * @param mixed $contrato 
	 * @return self
	 */
	public function setContrato($contrato): self
	{
		$this->contrato = $contrato;
		return $this;
	}
}




?>
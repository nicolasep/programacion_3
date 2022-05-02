<?php

include "Auto.php";

class Garage
{
	private $_razonSocial;
	private $_precioPorHora;
	private $_autos;

	public function __construct($razonSocial, $precioPorHora = 0)
	{
		$this->_razonSocial = $razonSocial;
		$this->_precioPorHora = $precioPorHora;
		$this->_autos = Array();
	}

	public function MostrarGarage()
	{
		echo "Garage: ".$this->_razonSocial."</br>";
		echo "Precio por hora: ".$this->_precioPorHora."</br>";
		foreach ($this->_autos as $auto) 
		{
			echo "</br>";
			echo Auto::MostrarAuto($auto);
			echo "</br>";
		}
	}

	public function Equals(Auto $auto)
	{
		foreach ($this->_autos as $au) 
		{
			if($auto->Equals($au))
			{
				return true;
			}

		}
		return false;
	}

	public function Add(Auto $auto)
	{
		if(!$this->Equals($auto))
		{
			array_push($this->_autos, $auto);
			echo "Auto cargado con exito!!! </br>";	
		}
		else
		{
			echo "El auto ya se encuentra cargado</br>";
		}
	}
	public function Remove(Auto $auto)
	{
		if($this->Equals($auto))
		{
			for($i=0;$i<count($this->_autos);$i++)
			{
				if($auto->Equals($this->_autos[$i]))
				{
					unset($this->_autos[$i]);
					return true;
				}
			}
			
		}
		return false;
	}


}

?>
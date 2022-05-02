<?php

class Producto
{
	public $_id;
	public $_codigoDeBarra;
	public $_nombre;
	public $_tipo;
	public $_stock;
	public $_precio;

	function __construct($codigoDeBarra, $nombre, $tipo, $stock, $precio, $id=0)
	{
		

		if(!$id)
			$this->_id = rand(1,1000);
		else
			$this->_id = $id;

		$this->_codigoDeBarra = $codigoDeBarra;
		$this->_nombre = $nombre;
		$this->_tipo = $tipo;
		$this->_stock = $stock;
		$this->_precio = $precio;
	}
	public function AgregarStock($stock)
	{
		$this->_stock += $stock;
	}

	public function Equals($prod)
	{
		return $this->_codigoDeBarra == $prod->_codigoDeBarra &&
			   $this->_nombre == $prod->_nombre &&
			   $this->_tipo == $prod->_tipo;
	}
	public function ProductoExistente($lista)
	{
		$index = 0;
		if(!is_null($lista))
		{
			foreach ($lista as $producto) 
			{
				if($producto->Equals($this))
				{
					return $index;
				}
				$index++;
			}
		}
		
		return -1;
	}
	public function Add($lista)
	{
		$index = -1;
		$resultado = -1;

		if(count($lista)>0)
			$index = $this->ProductoExistente($lista);

		if($index == -1)
		{
			array_push($lista,$this);
			$resultado = 1;
		}
		else
		{
			$lista[$index]->AgregarStock($this->_stock);
			$resultado = 0;
		}
		Producto::GuardarJson($lista);

		return $resultado;
	}
	static function GuardarJson($lista)
	{

		if(!is_null($lista))
		{

			$miArchivo = fopen("productos.json", "w");

			if($miArchivo != null)
			{
				foreach ($lista as $producto) 
				{
					if(!is_null($producto))
					{
						$json = json_encode($producto,JSON_UNESCAPED_UNICODE)."\n";
						fwrite($miArchivo,$json);
					}
					
					
				}
				fclose($miArchivo);

				return true;
			}
		}
		return false;
	}
	static function CargarProductosJson($nombreLista)
	{
		if(file_exists($nombreLista.".json"))
		{

			$miArchivo = fopen($nombreLista.".json", "r");
			$lista = array();

			if($miArchivo != null)
			{

				while (!feof($miArchivo)) 
				{
					$lineaLeida = fgets($miArchivo);
					$usJson = json_decode($lineaLeida,true);
					if(!is_null($usJson))
					{
						$producto = new Producto($usJson["_codigoDeBarra"],
												 $usJson["_nombre"],
												 $usJson["_tipo"],
												 (int)$usJson["_stock"],
												 (float)$usJson["_precio"],
												 (int)$usJson["_id"]);
					
						if(!array_push($lista, $producto))
						{
							fclose($miArchivo);
							throw new Exception("Error al cargar los productos!!!\n");

						}
					}
					
				}

				fclose($miArchivo);

				return $lista;
			}
			
		}
		else
		{
			//throw new Exception("El archivo no exciste");
			return -1;
		}
	}

}

?>
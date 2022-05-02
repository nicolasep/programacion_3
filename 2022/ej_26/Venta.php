<?php
include_once "Producto.php";
include_once "Usuario.php";


class Venta
{
	public $_id;
	public $_productos;
	public Usuario $_usuario;
	public $_totalAPagar;
	public $_cantidad;


	function __construct(Usuario $usuario, $id=0)
	{
		if(!$id)
			$this->_id = rand(1, 1000);
		else
			$this->_id = $id;

		$this->_usuario = $usuario;

		$this->_productos = array();
		$this->_totalAPagar = 0;
		$this->_cantidad = 0;

	}

	public function AgregarProducto(Producto $producto, $cantidad)
	{
		if($producto->DescontarStock($cantidad))
		{
			array_push($this->_productos , $producto);
			$this->_totalAPagar += ($producto->_precio * $cantidad);
			$this->_cantidad = $cantidad;
			return 1;
		}
		return 0;
	}
	public function CerrarVenta()
	{

		$miArchivo = fopen("ventas.json", "a");

		if($miArchivo != null)
		{
			
			$json = json_encode($this,JSON_UNESCAPED_UNICODE)."\n";
			fwrite($miArchivo,$json);
				
			fclose($miArchivo);

			return true;
		}
		
		return false;
	}
}


?>
<?php
/* Nicolas Eduardo Perez
Aplicación Nº 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems
,por POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases
*/
include "Producto.php";
include "Usuario.php";
include "Venta.php";


if(isset($_POST["codigoDeBarra"]) && strlen($_POST["codigoDeBarra"]) == 6 &&
   isset($_POST["idUsuario"]) && !empty($_POST["idUsuario"]) &&
   isset($_POST["cantidad"]) && !empty($_POST["cantidad"]))
{
	try
	{
		$resultado = -1;
		$userVenta = Usuario::BuscarUsuarioPorId((int)$_POST["idUsuario"]);
		$prodVenta = Producto::BuscarProductoPorCodigo($_POST["codigoDeBarra"]);

		if(!is_null($userVenta) && !is_null($prodVenta))
		{

			$venta = new Venta($userVenta);
			$resultado = $venta->AgregarProducto($prodVenta,(int) $_POST["cantidad"]);

			if($resultado)
				$venta->CerrarVenta();

		}

		if($resultado)
			echo "Venta Realizada";
		else
			echo "No se pudo hacer";



	}
	catch(Exception $ex)
	{
		echo $ex->getMessage();
	}
}
else
{
	echo "Faltan datos para la operacion";
}




?>
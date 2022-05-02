<?php
/* Nicolas Eduardo Perez
Aplicación Nº 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un
objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe
el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo
renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

include "Producto.php";

if(isset($_POST["codigoDeBarra"]) && !empty($_POST["codigoDeBarra"]) &&
   isset($_POST["nombre"])&& !empty($_POST["nombre"]) &&
   isset($_POST["tipo"])&& !empty($_POST["tipo"]) &&
   isset($_POST["stock"])&& !empty($_POST["stock"]) &&
   isset($_POST["precio"])&& !empty($_POST["precio"]))
{
	try
	{
		$resultado = -1;

		if(strlen($_POST["codigoDeBarra"])== 6)
		{
			$lista = Producto::CargarProductosJson("productos");
			if($lista == -1)
			{
				$lista = array();
			}
			
			$prod = new Producto($_POST["codigoDeBarra"],
								 $_POST["nombre"],
								 $_POST["tipo"],
								 (int)$_POST["stock"],
								 (float)$_POST["precio"]);

			//var_dump($prod);
			if(!is_null($prod))
			{
				$resultado = $prod->Add($lista);
			}

			if($resultado)
				echo "Ingresado!";
			elseif(!$resultado)
				echo "Actualizado";
			else
				echo "No se pudo hacer";
	
		}
		else
		{
			echo "El codigo de barra debe tener 6 sifras";
		}
		
	}
	catch( Exception $ex)
	{
		echo $ex->getMessage();
	}

	

}
else
{
	echo "Falta uno o mas campos o estan vacios";
}


?>
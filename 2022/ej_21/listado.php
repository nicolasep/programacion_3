<?php

/* Nicolas Eduardo Perez
Aplicación Nº 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
*/
include "Usuario.php";



if(isset($_GET["archivo"])&& !empty($_GET["archivo"]))
{
	
	$archivo = $_GET["archivo"];
	$lista = Array();
	

	
	if($archivo == "usuarios.csv")
	{
		$lista = Usuario::LeerArchivo($archivo,"Usuario", 3,"r");

		if(!is_null($lista))
		{

			echo "Usuarios cargados \n";
			foreach ($lista as $us) 
			{
				echo $us->MostrarUsuario();
				echo "\n";
			
			}
		}
		else
		{
			echo "Lista vacia\n";
		}
	}
}
else
{
	echo "El campo archivo no existe o esta vacio";
}

?>
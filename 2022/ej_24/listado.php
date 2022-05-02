<?php
/* Nicolas Eduardo Perez
Aplicación Nº 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
*/
include "Usuario.php";


try
{
	if(isset($_GET['archivo']) && !empty($_GET['archivo']))
	{
		$lista = Usuario::CargarUsuariosJson($_GET['archivo']);
		
		if(!is_null($lista))
		{
			$usuarios = Usuario::MostrarListaUsuarios($lista);
			echo $usuarios;
		}
	}
	else
	{
		throw new Exception("Debe ingresar el nombre del archivo");
	}

}
catch(Exception $ex)
{
	echo $ex->getMessage();
}


?>
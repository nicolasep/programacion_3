<?php

/* Nicolas Eduardo Perez
Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
*/
include "Usuario.php";



if(isset($_POST["clave"])&& !empty($_POST["clave"])&&isset($_POST["mail"])&& !empty($_POST["mail"]))
{
	
	$us = new Usuario($_POST["clave"],trim($_POST["mail"]));

	$resultado = $us->UsuarioRegistrado();

	switch ($resultado) 
	{
		case -2:
			echo "No hay usuarios en la lista \n";
			break;
		case -1:
			echo "El usuario no existe \n";
			break;
		case 0:
			echo "No coincide la clave del usuario \n";
			break;
		case 1:
			echo "Usuario registrado \n";
			break;
	}
	
}
else
{
	echo "Los campos clave y mail no existen o estan vacios";
}

?>
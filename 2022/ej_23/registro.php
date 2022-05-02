<?php
/* Nicolas Eduardo Perez
Aplicación Nº 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
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




	$nuevoUsuario;


	if(isset($_POST["nombre"])&&isset($_POST["clave"])&&isset($_POST["mail"])&&isset($_FILES["archivo"]["name"])&&
	   !empty($_POST["nombre"])&& !empty($_POST["clave"])&& !empty($_POST["mail"])&& !empty($_FILES["archivo"]["name"]))
	{

		
		$string = explode(".", $_FILES["archivo"]["name"]);
		$extension = $string[1];
		$nombreArchivo = $string[0]. date("d-m-y").".".$extension;
		$destino = "Usuario/Fotos/".$nombreArchivo;
		


		$nuevoUsuario = new Usuario($_POST["clave"],$_POST["mail"],$nombreArchivo,$_POST["nombre"]);

		if(!is_dir("Usuario/Fotos/"))
		{
			if(!is_dir("Usuario"))
			{
				mkdir("Usuario");
			}
			
			if(!is_dir("Fotos"))
			{
				mkdir("Usuario/Fotos/");
			}
			
		}
		if($nuevoUsuario != null)
		{
			if(($resultado=$nuevoUsuario->AddJson()) && move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino))
			{
				echo "Usuario agregado con exito!!\n";
				echo $resultado;
			}
			else
			{
				echo "El usuario no se pudo agregar\n";
			}
		}
		else
		{
			echo "Faltan datos para crear el usuario\n";
		}

		
	}
	else
	{
		echo "Hay campos sin rellenar!!!\n";
	}


?>
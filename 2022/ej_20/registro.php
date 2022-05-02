<?php
/* Nicolas Eduardo Perez
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
include "Usuario.php";


if(isset($_POST["nombre"]) &&
   isset($_POST["clave"]) &&
   isset($_POST["mail"]))
   {
   		$usuario = new Usuario($_POST["nombre"],$_POST["clave"],$_POST["mail"]);

   		if(Usuario::Add($usuario))
   			echo "Usuario agregado con exito!!\n";
   		else
   			echo "El usuario no se pudo agregar\n";

   }

   else
   {
   		echo "Hay campos sin rellenar!!!\n";
   }


?>
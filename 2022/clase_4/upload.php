<?php

//var_dump($_FILES);
//is_dir(filename)


foreach ($_FILES["archivos"]["name"] as $archivo => $nombre) 
{
	

	$string = explode(".", $nombre);
	$extension = $string[1];

	$destino = "upload/".$string[0]. date("d-m-y").".".$extension;
	
	$resultado = move_uploaded_file($_FILES["archivos"]["tmp_name"][$archivo], $destino);

	if(!$resultado)
	{
		echo "Ocurrio un error al guardar";
		break;
	}
	
}



/*
$directorio = "upload/";

$archivos =$_FILES["archivos"]["name"];

foreach ($archivos as $ar) 
{
	$nombre = explode(".",$ar);

	$nombreCompleto = $directorio. $archivo[0].date("d-m-y").".".$archivo[1];

	move_uploaded_file($nombreCompleto, $destino);
}
*/
////




/*

$archivo = explode(".",$_FILES["archivo"]["name"]);

$destino = $directorio. $archivo[0].date("d-m-y").".".$archivo[1];

if($destino!= null)
{

}


if(is_file($destino))
{
	move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
}
else
{
	mkdir("upload");
}
*/


?>
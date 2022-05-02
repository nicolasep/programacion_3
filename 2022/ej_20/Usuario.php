<?php


class Usuario
{
	private $_nombre;
	private $_clave;
	private $_mail;


	function __construct($nombre, $clave, $mail)
	{
		$this->_nombre = $nombre;
		$this->_clave = $clave;
		$this->_mail = $mail;
	}

	static function Add($usuario)
	{
		if($usuario->ValidarUsuario())
		{
			$archivo = fopen("usuarios.csv", "a");
			fwrite($archivo, $usuario->_nombre.",".
							 $usuario->_clave.",".
							 $usuario->_mail."\n");

			if(feof($archivo))
				fclose($archivo);

			return true;
		}
		return false;
	}
	
	private function ValidarUsuario()
	{
		if(empty($this->_nombre)
		 ||empty($this->_clave)
		 ||empty($this->_mail) )
		{
			return false;
		}
		return true;
	}
}



?>
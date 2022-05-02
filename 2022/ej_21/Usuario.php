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

	public function MostrarUsuario()
	{
		return "<ul>\n".
					" <li>".$this->_nombre."\n".
					" <li>".$this->_clave."\n".
					" <li>".$this->_mail.
				"</ul>\n";
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

	static function LeerArchivo($nombreArchivo,$nombreClase, $cantidadPropiedades,$modo="r")
	{
		if(file_exists($nombreArchivo))
		{
			$lista = Array();
			$archivo = fopen($nombreArchivo, $modo);

			while (!feof($archivo)) 
			{
				$linea = fgets($archivo);
				$arraylectura = explode(",", $linea);
				if(count($arraylectura)==$cantidadPropiedades)
				{
					$objetoLeido = null;
					switch ($nombreClase) 
					{
						case 'Usuario':
							$objetoLeido = new Usuario($arraylectura[0],$arraylectura[1],$arraylectura[2]);
							break;
					}

					if(!is_null($objetoLeido))
						array_push($lista, $objetoLeido);
				}
			}

			fclose($archivo);

			return $lista;
		}
		else
		{
			return null;
		}
	}
}



?>
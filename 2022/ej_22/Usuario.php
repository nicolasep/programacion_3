<?php


class Usuario
{
	public $_nombre;
	public $_clave;
	public $_mail;


	function __construct($clave, $mail,$nombre=null)
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

	private function Equal($usuario)
	{

		$retorno = -1;
		
		if(strcmp($this->_clave, $usuario->_clave)==0 && strcmp($this->_mail, $usuario->_mail)==0)
		{
			$retorno= 1;
		}
		else if(strcmp($this->_clave,$usuario->_clave)!=0 && strcmp($this->_mail,$usuario->_mail)==0)
		{
			$retorno = 0; 
		}
		
		return $retorno;
	}

	public function UsuarioRegistrado()
	{
		$lista = Usuario::LeerArchivo("usuarios.csv","Usuario",3);

		if(!is_null($lista))
		{

			foreach ($lista as $us) 
			{
				
				$resultado = $this->Equal($us);
				if($resultado >= 0)
				{

					return $resultado;
				}
			}

			return -1;
		}

		return -2;
		
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
							$objetoLeido = new Usuario($arraylectura[1],trim($arraylectura[2]),$arraylectura[0]);
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
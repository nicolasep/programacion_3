<?php


class Usuario
{
	public $_id;
	public $_nombre;
	public $_clave;
	public $_mail;
	public $_imagen;
	public $_fechaRegistro;




	function __construct($clave, $mail,$imagen,$nombre=null,$id=null,$fechaRegistro=null)
	{
		if(is_null($id))
			$this->_id = rand(1,1000);
		else
			$this->_id = $id;

		$this->_nombre = $nombre;
		$this->_clave = $clave;
		$this->_mail = $mail;
		$this->_imagen = $imagen;

		if(is_null($fechaRegistro))
			$this->_fechaRegistro = date("d-m-y");
		else
			$this->_fechaRegistro = $fechaRegistro;
		
	}

	public function MostrarUsuario()
	{
		return "<ul>\n".
					" <li>".$this->_id.
					" <li>".$this->_nombre.
					" <li>".$this->_mail.
					" <li>".$this->_imagen.
					" <li>".$this->_fechaRegistro."\n".
				"</ul>\n";
	}

	
	
	private function ValidarUsuario()
	{
		if(empty($this->_nombre)
		 ||empty($this->_clave)
		 ||empty($this->_mail)
		 ||empty($this->_imagen) )
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

	static function BuscarUsuarioPorId($id)
	{
		$lista = Usuario::CargarUsuariosJson("usuarios");
		if($lista)
		{
			foreach ($lista as $user) 
			{
				if($user->_id == $id)
				{
					return $user;
				}
			}
		}
		return null;
		
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
	public function AddCsv()
	{
		if($usuario->ValidarUsuario())
		{
			$archivo = fopen("usuarios.csv", "a");
			fwrite($archivo, $this->_id.",".
							 $this->_nombre.",".
							 $this->_clave.",".
							 $this->_mail.
							 $this->_imagen.
							 $this->_fechaRegistro."\n");

			if(feof($archivo))
				fclose($archivo);

			return true;
		}
		return false;
	}

	private function SetId($id)
	{
		$this->_id = id;
	}
	private function SetFecha($fecha)
	{
		$this->_fechaRegistro = $fecha;
	}

	static function LeerArchivoCsv($nombreArchivo,$nombreClase, $cantidadPropiedades,$modo="r")
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
							$objetoLeido = new Usuario($arraylectura[2],$arraylectura[3],$arraylectura[4],$arraylectura[1]);
							$objetoLeido->SetId($arraylectura[0]);
							$objetoLeido->SetFecha(trim($arraylectura[5]));
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


	public function AddJson()
	{
		if(Usuario::ValidarUsuario($this))
		{

			$miArchivo = fopen("usuarios.json", "a");
			if($miArchivo != null)
			{
				$json = json_encode($this,JSON_UNESCAPED_UNICODE)."\n";
				fwrite($miArchivo,$json);
				fclose($miArchivo);
				return $json;
			}
		}
		return false;
	}
	static function CargarUsuariosJson($nombreLista)
	{
		if(file_exists($nombreLista.".json"))
		{

			$miArchivo = fopen($nombreLista.".json", "r");
			$lista = array();

			if($miArchivo != null)
			{

				while (!feof($miArchivo)) 
				{
					$lineaLeida = fgets($miArchivo);
					$usJson = json_decode($lineaLeida,true);
					if(!is_null($usJson))
					{
						$usuarioN = new Usuario($usJson["_clave"],
												$usJson["_mail"],
												$usJson["_imagen"],
												$usJson["_nombre"],
												$usJson["_id"],
												$usJson["_fechaRegistro"]);
					
						if(!array_push($lista, $usuarioN))
						{
							fclose($miArchivo);
							throw new Exception("Error al cargar usuarios!!!\n");

						}
					}
					
				}

				fclose($miArchivo);

				return $lista;
			}
			
		}
		else
		{
			throw new Exception("El archivo no existe");
		}

	}
	static function MostrarListaUsuarios($lista)
	{
		if(!is_null($lista))
		{
			$usuarios="";
			foreach ($lista as $usuario) 
			{
				$usuarios .= $usuario->MostrarUsuario()."\n";
			}
			return $usuarios;
		}
		return null;
	}
	

}

?>
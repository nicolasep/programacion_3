<?php


class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio=0,$fecha= new DateTime())
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;

    }

    public function AgregarImpuestos($impuesto)
    {

        $this->_precio += $impuesto;
    }

    static function MostrarAuto(Auto $auto)
    {
        return "Marca: ".$auto->_marca."</br>"
              ."Color: ".$auto->_color."</br>"
              ."Precio: ".$auto->_precio."</br>"
              ."Fecha: ".$auto->_fecha->format("d/m/Y");
    }
    public function Equals(Auto $auto)
    {
        return ($this->_marca == $auto->_marca)&&($this->_color == $auto->_color);
    }

    static function Add(Auto $auto1, Auto $auto2)
    {
        if($auto1->Equals($auto2) && $auto1->_color == $auto2->_color)
            return $auto1->_precio + $auto2->_precio;

        return 0;
    }
}

?>
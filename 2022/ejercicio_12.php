<?php
/*Perez Nicolas Eduardo
Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$palabra = "Hola";

$reverso = InvertirPalabra($palabra);

echo "La palabra es: ". $reverso;

function InvertirPalabra($palabra)
{
    $palabraRetorno="";

    for($i=strlen($palabra)-1;$i>=0;$i--)
    {
        $palabraRetorno .= $palabra[$i];
    }

    return $palabraRetorno;
}

?>
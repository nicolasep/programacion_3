<?php
/*Perez Nicolas Eduardo
Aplicación Nº 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).
*/
echo "</br></br>";
echo "-----Ejercicio 11----- </br>";

$potencia = array();



for($i=1;$i<=4;$i++)
{
    $potencia[$i-1] = PotenciaDeNumeros($i);
}

function PotenciaDeNumeros($numero)
{
    $vec = array();
    $acumulador=0;
    $resultado =$numero;
    for($i=1;$i<=4;$i++)
    {
        $resultado = pow($resultado,2);
        $vec[$i-1]=$resultado;
    }

    return $vec;
}

foreach($potencia as $pot)
{
    foreach($pot as $value)
    {
        echo $value . "</br>";
    }
    echo "</br>";
}


?>
<?php
/* Nicolas Eduardo Perez
Aplicación Nº 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá
TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).Ejemplo: $miGarage->Remove($autoUno);
En
testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
*/

include_once "Garage.php";


$garage = new Garage("garageSinPrecio");

$garage2 = new Garage("garage2",5);

$au1 = new Auto("Fiat","Rojo");
$au2 = new Auto("Fiat","Verde");

$au3 = new Auto("Ford","Blanco",25000);
$au4 = new Auto("Ford","Blanco",30000);

$au5 = new Auto("Ferrari","Rojo",90000,new DateTime());

$garage->Add($au1);
$garage->Add($au3);

echo "</br>";
echo "Garage 1: </br>";

$garage->MostrarGarage();

echo "</br>";

echo "</br> Elimino un elemento y lo muestro";
if($garage->Remove($au1))
{
	echo "</br>Se elimino un auto</br>";
}
echo "Garage 1: </br>";

$garage->MostrarGarage();

echo "</br>";


?>
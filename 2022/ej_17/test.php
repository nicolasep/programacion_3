<?php
/* Nicolas Eduardo Perez
Aplicación Nº 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá
TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
En
testAuto.php:
Neiner, Maximiliano – Villegas, Octavio PHP- 2016 Página 1
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/
require "Auto.php"; 

$au1 = new Auto("Fiat","Rojo");
$au2 = new Auto("Fiat","Verde");

$au3 = new Auto("Ford","Blanco",25000);
$au4 = new Auto("Ford","Blanco",30000);

$au5 = new Auto("Ferrari","Rojo",90000,new DateTime());

$au3->AgregarImpuestos(1500);
$au4->AgregarImpuestos(1500);
$au5->AgregarImpuestos(1500);


echo "La suma del precio del primer y segundo auto es: ".Auto::Add($au1,$au2). "</br>";
echo"</br>";
if($au1->Equals($au2) && $au1->Equals($au5))
	echo "Los autos 1, 2 y 5 son iguales </br>";
else
	echo "Los autos 1, 2 y 5 no son iguales </br>";

echo"</br>";
echo "Auto 1: </br>".Auto::MostrarAuto($au1)."</br>";
echo"</br>";
echo "Auto 3: </br>".Auto::MostrarAuto($au3)."</br>";
echo"</br>";
echo "Auto 5: </br>".Auto::MostrarAuto($au5)."</br>";
?>
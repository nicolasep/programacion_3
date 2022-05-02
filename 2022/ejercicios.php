<?php
/*Perez Nicolas Eduardo
Aplicación Nº 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

echo "-----Ejercicio 1----- </br>";

$contador = 1;
$acumulador = 0;

do
{
	$acumulador += $contador;
	$contador++;
}while(($acumulador+$contador)  <= 1000);

printf("La suma es: %d",$acumulador);




/*Perez Nicolas Eduardo
Aplicación Nº 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función
date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/
echo "</br></br>";
echo "-----Ejercicio 2----- </br>";



$tiempo = date("F j, Y");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$tiempo = date("j n Y");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$tiempo = date("Ymd");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$dia = date("j");

$mes = date("n");


switch (($mes)) {
	case '1':
	case '2':
		echo "Es verano";
		break;
	case '3':
		if($dia<='20')
		{
			echo "Es verano";
		}
		else
		{
			echo "Es otoño";
		}
		break;
	case '4':
	case '5':
		echo "Es otoño";
		break;
	case '6':
		if($dia<='20')
		{
			echo "Es otoño";
		}
		else
		{
			echo "Es invierno";
		}
		break;
	case '7':
	case '8':
		echo "Es invierno";
		break;
	case '9':
		if($dia<='20')
		{
			echo "Es invierno";
		}
		else
		{
			echo "Es primavera";
		}
		break;
	case '10':
	case '11':
		echo "Es primavera";
		break;
	case '12':
		if($dia<='20')
		{
			echo "Es primavera";
		}
		else
		{
			echo "Es verano";
		}
		break;
		
}



/*Perez Nicolas Eduardo
Aplicación Nº 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

echo "</br></br>";
echo "----Ejercicio 3---- </br>";



$a = 5;
$b = 5;
$c = 4;

$resultado;


if(($a < $b && $a > $c)||($a>$b && $a <$c))
{
	$resultado = $a;
}
else if(($b < $a && $b > $c)||($b>$a && $b <$c))
{
	$resultado = $b;
}
else if(($c < $b && $c > $a)||($c>$b && $c <$a))
{
	$resultado = $c;
}
else
{
	$resultado = "No hay valor del medio";
}
echo "Numero del medio</br>";
print($resultado);



/*Perez Nicolas Eduardo
Aplicación Nº 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.

*/

echo "</br></br>";
echo "-----Ejercicio 4---- </br>";

$operador = '+';
$op1 = 4;
$op2 = 3;
$resultado;

if(!empty($operador))
{
	switch ($operador) {
		case '+':
			$resultado = $op1 + $op2;
			break;
		case '-':
			$resultado = $op1 - $op2;
			break;
		case '*':
			$resultado = $op1 * $op2;
			break;
		case '/':
		if($op2 > 0)
			$resultado = $op1 / $op2;
		else
			$resultado = "no se puede dividir por cero";
			break;
		default:
			# code...
			break;
	}
	echo "El resultado de ", $operador , " es: " , $resultado;
}
else
{
	echo "No se ingresaron datos";
}

/*Perez Nicolas Eduardo
Aplicación Nº 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

echo "</br></br>";
echo "----Ejercicio 5----- </br>";


$num=21;
$decenas=0;
$unidades ="";

$respuesta;
if($num >= 10)
{
	$decenas = substr($num, 0,1);
	$unidades = substr($num, 1,1);
}
else
{
	$unidades = substr($num, 0,1);
}

switch ($decenas) {
	case '2':
		$resultado = "Veinti";
		break;
	case '3':
		$resultado = "Treinta";
		break;
	case '4':
		$resultado = "Cuarenta";
		break;
	case '5':
		$resultado = "Cincuenta";
		break;
	case '6':
		$resultado = "Sesenta";
		break;
}

if($decenas==2 && $unidades==0)
{
	$resultado = "Veinte";
}
else if($decenas !=2 && $unidades != 0)
{
	$resultado .= " y ";
}

switch ($unidades) {
	case '1':
		$resultado .= "uno";
		break;
	case '2':
		$resultado .= "dos";
		break;
	case '3':
		$resultado .= "tres";
		break;
	case '4':
		$resultado .= "cuatro";
		break;
	case '5':
		$resultado .= "cinco";
		break;
	case '6':
		$resultado .= "seis";
		break;
	case '7':
		$resultado .= "siete";
		break;
	case '8':
		$resultado .= "ocho";
		break;
	case '9':
		$resultado .= "nueve";
		break;
}

printf ("El resultado es: %s",$resultado);



/*Perez Nicolas Eduardo
Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

echo "</br></br>";
echo "----Ejercicio 6----- </br>";

$numeroComparacion = 6;
$vec[5] = array();
$total=0;
$promedio =0;
$resultado="";

for($i=0;$i<5;$i++)
{
	$vec[$i] = rand(1,9);
	$total += $vec[$i];
}

$promedio =(int) ($total /5);

if($promedio > $numeroComparacion)
{
	$resultado = "El promedio: ".$promedio." es mayor que: ".$numeroComparacion;
}
else if($promedio < $numeroComparacion)
{
	$resultado = "El promedio: ".$promedio." es menor que: ".$numeroComparacion;
}
else
{
	$resultado = "El promedio: ".$promedio." es igual que: ".$numeroComparacion;
}
echo $resultado;


/*Perez Nicolas Eduardo
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.
*/

echo "</br></br>";
echo "----Ejercicio 7----- </br>";

$contador = 0;
$numerosImpares = array();

for($i=0;$contador<10;$i++)
{
	if($i%2 !=0)
	{
		$numerosImpares[$contador] = $i;
		$contador++;
	}

}

echo "Primera impresion for </br>";
for($i=0;$i<count($numerosImpares);$i++)
{
	echo "Numero impar: ". $numerosImpares[$i]."</br>";
}
echo "Segunda impresion while</br>";

$i=0;
while($i<count($numerosImpares))
{
	echo "Numero impar: ". $numerosImpares[$i]."</br>";
	$i++;
}

echo "Tercera impresion foreach</br>";

foreach ($numerosImpares as $numero) {
	echo "Numero impar: ". $numero."</br>";
}



/*Perez Nicolas Eduardo
Aplicación Nº 8 (Carga aleatoria)
Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';

*/

echo "</br></br>";
echo "----Ejercicio 8----- </br>";


$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';

foreach ($v as $key => $value) {
	echo $value . "</br>";
}



/*Perez Nicolas Eduardo
Aplicación Nº 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.

*/

echo "</br></br>";
echo "----Ejercicio 9----- </br>";


$contador =1;
$lapicera1 = array('color' =>'azul' ,'marca' =>'marca1','trazo'=>'fino1','precio'=>11);
$lapicera2 = array('color' =>'verde' ,'marca' =>'marca2','trazo'=>'gruezo2','precio'=>22);
$lapicera3 = array('color' =>'rojo' ,'marca' =>'marca3','trazo'=>'fino3','precio'=>33);


echo "Lapicera: 1 </br>";
	foreach ($lapicera1 as $value ) {

		echo $value . "</br>";
	}
	$contador++;
	echo "</br>";

echo "Lapicera: 2 </br>";
	foreach ($lapicera2 as $value ) {

		echo $value . "</br>";
	}
	$contador++;
	echo "</br>";

echo "Lapicera: 3 </br>";
	foreach ($lapicera3 as $value ) {

		echo $value . "</br>";
	}
	$contador++;
	echo "</br>";

/*Perez Nicolas Eduardo
Aplicación Nº 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

echo "</br></br>";
echo "----Ejercicio 10----- </br>";


$lapicera = array($lapicera1 = array('color' =>'azul' ,'marca' =>'marca1','trazo'=>'fino1','precio'=>11)
				 ,$lapicera2 = array('color' =>'verde' ,'marca' =>'marca2','trazo'=>'gruezo2','precio'=>22)
				 ,$lapicera3 = array('color' =>'rojo' ,'marca' =>'marca3','trazo'=>'fino3','precio'=>33) );

foreach ($lapicera as $key ) {
	echo "Lapicera: ".$contador."</br>";
	foreach ($key as $value ) {

		echo $value . "</br>";
	}
	$contador++;
	echo "</br>";
}
?>
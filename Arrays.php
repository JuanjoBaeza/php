<?php

// [PHP] Tipos de Arrays

// Arrays indexados (índice numérico)
// ----------------------------------

// Es un tipo de array que tiene índices numéricos y se accede con un número entero a cada valor del mismo.

$variable = array($valor1, $valor2, $valor2,...);

// Explicación:

// $variable: Es la variable donde se guardará el array.
// $valor1, $valor2 y $valor3: Valores de cada elemento.

// Ejemplo:

$nombre = "Ana"; 
$array = array(1, 2, 3, "edificio", $nombre);
 
$longitud = count($array);
 
for($i=0; $i<$longitud; $i++) {

      //imprimimos el valor de cada elemento
	  echo $array\[$i\] . "<br>";
}


// Arrays asociativos (clave => valor)
// -----------------------------------

// Este es un array cuyos valores se asignan mediante claves:

$variable = array(clave1=>valor1, clave2=>valor2, clave3=>valor3...);

// Explicación:

// $variable: Elemento donde se quedará almacenado el array.
// $clave1, $clave2 y $clave3: Claves por las cuales se asignarán y asociarán los valores 1, 2 y 3.

// Ejemplo:

$equipo = array(acuatico=>'barco', aereo=>'avión', espacio=>'transbordador');

foreach($equipo as $medio=>$aparato) {

	echo "Para el medio " . medio$ . " el transporte es " . $aparato . "<br>";
}


// Arrays multidimensionales
// -------------------------

// Se trata de un array de arrays, os dejo su sintaxis con un ejemplo de array bidimensional y cómo lo recorremos.

// Ejemplo:

$pilotos = array
		(
		array("Alonso","Hamilton","Vetel"),
		array("Rosberg"),
		array("Sainz","Di Ricciardo","Schumacher")
		);

 foreach($pilotos as $piloto) {

 	echo "Los pilotos de F1 son: ";

 	foreach($piloto as $quien) {

	 	echo $quien ." ";
 		}

 	echo "<br>";
 }

// Explicación:

// $pilotos: Es un array contenedor de otros 3 arrays con pilotos.
// Luego recorro el array con PHP foreach() $pilotos y a su vez recorro cada array que encontramos para mostrar sus elementos (pilotos).

// Para mostrar un elemento en concreto:
	
// echo $pilotos[2][1]; (mostrará Di Ricciardo)

// Otros comandos útiles relacionados con arrays.

//  PHP implode(): Convierte un array en una cadena de texto.
//  PHP explode(): Convierte un string en un array.
//  PHP foreach(): Función para recorrer arrays.
//  PHP unset(): Elimina elementos de un array.
//  PHP count(): Cuenta la longitud o el número de elementos en un array.

// Añadir un elemento a un array:

$array[] = $valor;
$array[] = 'Pedro';
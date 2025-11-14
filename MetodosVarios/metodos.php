<?php


// Calcular media, máximo y mínimo de un array de objetos
// delante de function va public si está dentro de una clase
function calcularMediaAlturas(array $plantas): float {
   if (count($plantas) === 0) return 0;


   $suma = 0;
   foreach ($plantas as $p) {
       $suma += $p->getAltura();
   }
   return $suma / count($plantas);
}


function alturaMaxima(array $plantas): float {
   $max = PHP_FLOAT_MIN;
   foreach ($plantas as $p) {
       $max = max($max, $p->getAltura());
   }
   return $max;
}


function alturaMinima(array $plantas): float {
   $min = PHP_FLOAT_MAX;
   foreach ($plantas as $p) {
       $min = min($min, $p->getAltura());
   }
   return $min;
}


// Método para ordenar objetos por atributo


function ordenarPorAltura(array &$plantas): array {
   usort($plantas, function($a, $b) {
       return $a->getAltura() <=> $b->getAltura();
   });
   return $plantas;
}


// Método estático para validar DNI 
// delante de function va public static si está dentro de una clase


function validarDNI(string $dni): bool {
   if (!preg_match("/^[0-9]{8}[A-Z]$/", $dni)) return false;


   $numeros = intval(substr($dni, 0, 8));
   $letra = substr($dni, -1);


   $tabla = "TRWAGMYFPDXBNJZSQVHLCKE";
   return $letra === $tabla[$numeros % 23];
}


// Método para devolver la edad a partir de fecha de nacimiento
// delante de function va public static si está dentro de una clase
function calcularEdad(DateTime $fechaNacimiento): int {
   $hoy = new DateTime();
   $edad = $hoy->diff($fechaNacimiento);
   return $edad->y;
}


// Calcular el precio total de un array de productos
// delante de function va public static si está dentro de una clase


function calcularPrecioTotal(array $productos): float {
   $total = 0;
   foreach ($productos as $p) {
       $total += $p->precioConIVA();
   }
   return $total;
}




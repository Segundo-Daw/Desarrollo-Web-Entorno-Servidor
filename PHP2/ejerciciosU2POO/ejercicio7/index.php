<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Producto.php";    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Producto.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/CuentaBancaria.php";    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Producto.php";




    echo "<h3>Ejercicio 2: Productos</h3>";

    $p1 = new Producto("Teclado", 25, 21);
    $p2 = new Producto("Ratón", 15, 21);
    $p3 = new Producto("Monitor", 150, 21);

    $p2->rebajar(15); // rebaja del 15%

    echo "<ul>";
    echo "<li>$p1</li>";
    echo "<li>$p2</li>";
    echo "<li>$p3</li>";
    echo "</ul>";

    echo "<h3>Ejercicio 3: Cuenta Bancaria</h3>";

    $cuenta = new CuentaBancaria("Carlos Pérez", 1000);

    $cuenta->ingresar(500);
    $ret1 = $cuenta->retirar(3000); // no debería poder
    $ret2 = $cuenta->retirar(200);  // sí debería

    echo "<p>Retirada 3000€: " . ($ret1 ? "OK" : "Saldo insuficiente") . "</p>";
    echo "<p>Retirada 200€: " . ($ret2 ? "OK" : "Fallo") . "</p>";

    echo "<p>Estado final: $cuenta</p>";

    ?>
    
</body>
</html>
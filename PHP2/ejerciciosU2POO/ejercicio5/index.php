<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/CuentaBancaria.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/CuentaAhorro.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Banco.php";


    $cuenta1 = new CuentaAhorro("Ana", 1000, [], 0.05);
    $cuenta1->aplicarInteres();
    $cuenta1->depositar(200);
    $cuenta1->retirar(100);

    $banco = new Banco();
    $banco->agregarCuenta($cuenta1);
    

    echo "Total en el banco: " . $banco->calcularTotalDepositos() . "\n";




    ?>
    
</body>
</html>
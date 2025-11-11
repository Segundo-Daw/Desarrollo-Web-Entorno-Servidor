<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro examen</title>
</head>
<body>

    <h2>Ejercicio 2</h2>
    <?php
    require $_SERVER["DOCUMENT_ROOT"] . "/clases/Arboles.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/clases/Flores.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Planta.php";

    // Crear Flor
    $flor = new Flores("Orquídea", 21.5, "Marzo");

    $flor->crecer(1.3);

    // Crear Arboles
    $arbol1 = new Arboles("Pino", 120, true);
    $arbol2 = new Arboles("Roble", 250, false);

    ?>

    <ul>
        <li>
            <?php echo $flor;?>
        </li>
        <li>
            <?php echo $arbol1;?>
        </li>
        <li>
            <?php echo $arbol2;?>
        </li>
    </ul>
    
</body>
</html>
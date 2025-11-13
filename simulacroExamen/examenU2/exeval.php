<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen simulacro 2</title>
</head>
<body>
    <?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Flower.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Plant.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Tree.php";


    //Crear objetivo tipo flor
    $flower = new Flower("Orquídea", 21.5, "marzo");

    //Crear dos objetos tipo arbol
    $tree1 = new Tree("Pino", 120, true);
    $tree2 = new Tree("Roble", 250, false);

    //Hacer que las flores crecan 1.3cm
    $flower->crecer(1.3);

    echo "<ul>
            <li>$flower</li>
            <li>$tree1</li>
            <li>$tree2</li>
    </ul>";
    ?>
    
</body>
</html>
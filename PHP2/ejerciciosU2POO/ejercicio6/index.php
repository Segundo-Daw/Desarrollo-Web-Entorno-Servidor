<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Circulo.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Rectangulo.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Figura.php";
    
    echo "<h3>Ejercicio 1: Figuras Geométricas</h3>";

    $circulo = new Circulo("rojo", 4.5);
    $rect1 = new Rectangulo("azul", 5, 10);
    $rect2 = new Rectangulo("verde", 2.5, 7);

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Figura</th><th>Color</th><th>Área</th><th>Perímetro</th></tr>";

    function filaFigura($fig) {
        echo "<tr>";
        echo "<td>" . get_class($fig) . "</td>";
        echo "<td>" . $fig->getColor() . "</td>";
        echo "<td>" . number_format($fig->area(), 2) . "</td>";
        echo "<td>" . number_format($fig->perimetro(), 2) . "</td>";
        echo "</tr>";
    }

    filaFigura($circulo);
    filaFigura($rect1);
    filaFigura($rect2);

    echo "</table>";

    ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/PHP2/sports/Tennis.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/PHP2/sports/Rugby.php";


    //Construyo un objeto de la clase Sport (no se puede pero vamos a probar)
    //$s1 = new Sport("equipo", true, 5); //NO se puede CONSTRUIR un objeto de una clase Abstracta

    //Objeto Rugby:

    $r1 = new Rugby("Los pumas", "equipo", true, 15);
    echo "<p>$r1</p>";
    //Puedo llamar a los métodos de la superclase:
    $r1->addPlayers(6);
    echo "<p>$r1</p>";


    
    

    ?>
    
</body>
</html>
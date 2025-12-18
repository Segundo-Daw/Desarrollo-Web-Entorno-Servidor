<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichero en el que trabajamos con POO</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/Tree.php";

    //Conexión a la base de datos
    try{
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default 3306
    }catch(Exception $e){
        echo "<p>Error en la conexión: {$e->getMessage()}</p>";
        echo "<p>no puedo continuar</p>";
        exit();
    }
    $t = new Tree (26.9, 47.9, "wood");

    //llamamos al método estático
    $id = Tree::insert($t, $conn);
    echo "<p>Se ha insertado un ábol $t con id $id.</p>";


    $t = Tree::select( 8, $conn);
    echo "<p>Árbol con select : $t</p>";

    $trees = Tree::selectAll($conn);
    foreach($trees as $t){
        echo "<p>$t</p>";
    }

    ?>
    
</body>
</html>
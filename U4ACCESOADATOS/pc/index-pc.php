<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/pc/Component.php";

    //Conexión a la base de datos
    try{
        $conn = new mysqli("127.0.0.1", "root", "Sandia4you", "shop"); //Puerto default 3306
    }catch(Exception $e){
        echo "<p>Error en la conexión: {$e->getMessage()}</p>";
        echo "<p>no puedo continuar</p>";
        exit();
    }

    $c = new Component("ordenador", "LG", "WV23");

    //llamamos al método estático
    $id = Component::create($c, $conn);
    echo "<p>Se ha insertado un componente con $c con id $id</p>";




    ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/PcDAO.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/Pc.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/Component.php";

    $pc = new Pc("asus199", "dani", "Asus", 1364.1);
    $c1 = new Component("ssd", "samsung", "58H");
    $c2 = new Component("ram", "samsung", "w526");
    $c3 = new Component("mouse", "logitech", "asd");

    // Añadir al pc los componentes
    $pc->addComponent($c1);
    $pc->addComponent($c2);
    $pc->addComponent($c3);

    //guardarlo en la base de datos
    //PcDAO::create($pc);  
    echo PcDAO:: read("asus199");








    ?>
    
</body>
</html>
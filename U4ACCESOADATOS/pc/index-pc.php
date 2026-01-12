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
    require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/UserDAO.php";

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
    //echo PcDAO:: read("asus199");

    $u = new User("sete", "admin123987!!!---");
    $u2 = new User("diego", "a");

    //Guardo los users en la BD:
    //UserDAO::create($u);
    //UserDAO::create($u2);

    var_dump(UserDAO::verifyPassword("asdf", "asdf"));
    var_dump(UserDAO::verifyPassword("sete", "asdf"));
    var_dump(UserDAO::verifyPassword("sete", "admin123987!!!---"));

    ///
    if (PcDAO::create($pc)){
        echo "Se ha creado :)";
    }else{
        echo "no se ha creado :(";
    }







    ?>
    
</body>
</html>
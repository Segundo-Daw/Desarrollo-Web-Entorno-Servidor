<?php
session_start();


if(!(isset($_COOKIE["stay-connected"]) or isset($_SESSION["origin"]))){
    //esto es para que aparezca un mensajito de que se ha intentado colar en el index
    $_SESSION["error"] = "· Te has intentado colar en el index ·";
    header("Location: form-login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Incluir css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Incluir cabecera -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php";?>

    <main>

    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/UsuarioDAO.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";

    $usuario1 = new Usuario("carolina", "carol@gmail.com", "carol123");
    UsuarioDAO::create($usuario1);



    ?>
       
    </main>





     

    <!-- Incluir footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>
    
</body>
</html>
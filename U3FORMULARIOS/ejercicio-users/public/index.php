<?php
session_start();

//Voy a verificar que ha llegado:
    //1. tiene cookie
    //2. form-login
    //3. form-signup
/* esto es lo mismo que lo de abajo pero más largo
if(isset($_COOKIE["stay-connected"])){
    //me quedo
}else if(isset($_SESSION["origin"])){
    //me quedo
}else{
    header("Location: form-login.php");
    exit();
}*/


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
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php";
    ?>
    <main>

        <?php
        //verificar si viene desde signup
        if(isset($_SESSION["origin"]) and $_SESSION["origin"] == "signup"){
            //creo un objeto User
            require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/User.php";
            
            /*$region = "madrid";
            $u = new User("nombre", "a@a.com", "asdf", constant("Region::$region"));*/
            $region = $_SESSION["region"];
            $u = new User(
                $_SESSION["fullname"],
                $_SESSION["signup-email"],
                "",
                constant("Region::$region")
            );
            //Lo imprimo
            echo $u;
        }

        if (isset($_SESSION["origin"]) and $_SESSION["origin"] == "login") {
            echo "<p>Te damos la bienvenida, {$_SESSION['email']}</p>";
        }

        // Ver si tiene cookies de permanecer registrado. Coger su nombre
        // Si no tiene cookie pero tiene sesión, recuperar su nombre
        // Si no, a signup.

        ?>

    <?php //include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/book.php"; ?>

    </main>
    <!-- Incluir footer -->
     <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";
    ?>
</body>

</html>
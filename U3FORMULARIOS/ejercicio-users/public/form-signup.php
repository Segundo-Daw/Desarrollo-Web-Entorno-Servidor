<?php
//to do Sesión
session_start();

// Verificar si he llegado a través del botón submit(es decir, petición POST)
$name = $email = $pass = $pass2 = $comunidad = $conect = "";
$passError = $nameError = $emailError = "";
$errors = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //1. recoger datos
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $name = secure ($_POST["fullname"]);
    $email = secure ($_POST["signup-email"]);
    $pass = secure ($_POST["signup-password"]);
    $pass2 = secure ($_POST["confirm-password"]);
    $comunidad = ($_POST["region"]);

    if(isset($_POST["stay-connected"]))
    $conect = $_POST["stay-connected"];


    //2. verificaciones
    if (empty($name)){
        $errors = true;
        $nameError = "Este campo es obligatorio";
    }

    if (empty($email)){
        $errors = true;
        $emailError = "Este campo es obligatorio";
    }

    if (empty($pass) or $pass != $pass2){
        $errors = true;
        $passError = "Rellena las contraseñas iguales";
    }


    //3. si todo esta bien: me voy a index (sesión) (guardando antes todas las cosas)
    if(!$errors){
        $_SESSION["fullname"] = $name;
        $_SESSION["signup-email"] = $email;
        //$_SESSION["signup-password"] = $name;
        //Las contraseñas no se envían
        $_SESSION["region"] = $comunidad;
        //todo stay-connected es movida de cookies
        $_SESSION["origin"] = "signup";

        header("Location: index.php");


    }
    //3. si no esta bien, me quedo mostrando errores y recuperando values


    //mostrar errores, poner clases de error (si quiero, etc).

    




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
        <!--Incluimos el formulario de signup-->
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/components/signup.php";?>

    </main>



    <!-- Incluir footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>
</body>

</html>
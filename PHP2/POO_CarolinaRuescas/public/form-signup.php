<?php
//Inicio de sesión
session_start();

// Verificar si he llegado a través del botón submit(es decir, petición POST)
$name = $email = $pass = $pass2  = $conect = "";
$passError = $nameError = $emailError = "";
$errors = false;
$errorDB = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //1. recoger datos
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $name = secure ($_POST["fullname"]);
    $email = secure ($_POST["signup-email"]);
    $pass = secure ($_POST["signup-password"]);
    $pass2 = secure ($_POST["confirm-password"]);

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


    
    



}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Incluir cabecera -->
     <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php";?>


    <!--Incluir el formulario de signup-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/components/signup.php";?>

    
</body>
</html>
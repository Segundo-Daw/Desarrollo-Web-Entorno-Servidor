<?php
session_start();

$mail = $name = $pass = $type = "";
$mailError = $passError = $typeError = "";
$errors = false;


//Verifico si está la cookie de que ya ha iniciado sesión
//Si está, la llevo al index
//Si no , no hago nada.
if(isset($_COOKIE["stay-connected"])){
    $_SESSION["email"] = $_COOKIE["stay-connected"];
    $_SESSION["origin"] = "login";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Ha llegado después de hacer clic en Submit
    //1. Recojo datos securizando
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/functions.php";
    $mail = secure($_POST["email"]);    //valor del atributo name del input
    //TODO lo del nombre de usuario / email
    $pass = secure($_POST["password"]);
    if (!isset($_POST["login-type"])) {
        $errors = true;
        $typeError = "Tienes que seleccionar un método";
    } else {
        $type = secure($_POST["login-type"]);
    }

    //2. Verifico
    if (strlen($mail) < 3) {
        $mailError = "Error";
        $errors = true;
    }
    if (strlen($pass) < 3) {
        $passError = "Error";
        $errors = true;
    }
    //TODO en algún momento verificaremos con la BD 
    //que existe ese usuario y contraseña


    //3. Me voy o muestro errores
    if (!$errors) {

        //Hago lo de la cookie de seguir conectado
        if(isset($_POST["stay-connected"])){
            setcookie("stay-connected", $mail, time()+ 60*60, "/");  // con "/" le indicamos que se vean en todos los ficheros
        }
        //voy a eliminar, si existía, ese $_SESSION["error"]
        unset($_SESSION["error"]);

        $_SESSION["email"] = $mail;
        $_SESSION["origin"] = "login";
        header("location: index.php");
    }
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
        //esto lo que hace es que cuando cierro sesion y ya no estoy en el login, si le doy a Home ,e dice que me he intentado colar en el index
        if(isset($_SESSION["error"])){
            $err = $_SESSION["error"];
            echo "<p class='error'>$err</p>";
        }



        ?>

        <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/login.php"; ?>
        <?php include $_SERVER["DOCUMENT_ROOT"] . "/app/models/User.php";?>

    </main>
    <!-- Incluir footer -->
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";
    ?>
</body>

</html>
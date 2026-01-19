<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";

$email = $name = $pass = $type = "";
$emailError = $passError = $typeError = "";
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
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/funciones.php";
    $email = secure($_POST["email"]);    //valor del atributo name del input
    $pass = secure($_POST["pass"]);
    

    //2. Verifico
    if (strlen($email) < 6) {
        $emailError = "Error";
        $errors = true;
    }
    if (strlen($pass) < 6) {
        $passError = "Error";
        $errors = true;
    }



    //3. Me voy o muestro errores
    if (!$errors) {

        //Hago lo de la cookie de seguir conectado
        if(isset($_POST["stay-connected"])){
            setcookie("stay-connected", $email, time()+ 14*24*60*60, "/");  // con "/" le indicamos que se vean en todos los ficheros y el tiempo que dura en este caso son dos semanas
        }
        //voy a eliminar, si existía, ese $_SESSION["error"]
        unset($_SESSION["error"]);

        $_SESSION["email"] = $email;
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
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Incluir cabecera -->
     <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php";?>

     <main>

        <?php
            //esto lo que hace es que cuando cierro sesion y ya no estoy en el login, si le doy a Home ,e dice que me he intentado colar en el index
            if(isset($_SESSION["error"])){
                $err = $_SESSION["error"];
                echo "<p class='error'>$err</p>";
            }

        ?>

        <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/login.php"; ?>

          <!-- Incluir footer -->
     <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>
        

    </main>

     




    
</body>
</html>

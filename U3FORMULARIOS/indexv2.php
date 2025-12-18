<?php
    session_start();
    //si no ha llegado al indexv2 después del famulario de signup2, que le devuelva a signup2.php
    //compruebo la cookie:
    $nameCookie="";
   
    if($_COOKIE["looged"]){
        $nameCookie = $_COOKIE["looged"];

    }else if(!isset($_SESSION['origin']) or $_SESSION['origin'] != "signup"){
            //header("Location: ./signup/signup2.php");
           // exit();// con esto termina el script, no se ejecuta mas
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bieeeeeeen</p>
    <?php 
    require $_SERVER["DOCUMENT_ROOT"] . "/User.php";

    
    echo"<p>Tenías la cookie activada, $nameCookie</p>";

    //var_dump($_POST);
    //var_dump($_GET);
    //var_dump($_SESSION);
    echo "<p>El nombre introducido era...</p>";

    //Construir un objeto User y mostrarlo por pantalla

    $u = new User($_SESSION["name"], $_SESSION["password"], $_SESSION["email"], $_SESSION["age"], $_SESSION["studies"]);
    echo $u;





    ?>
</body>
</html>
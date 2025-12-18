<?php
session_start(); //abro sesión: voy a utilizar $_SESSION


$name = $pass = "";
$termsError = $nameError = "";
$errores = false;



if($_SERVER['REQUEST_METHOD'] == "POST"){
    include $_SERVER['DOCUMENT_ROOT'] . "/utils.php";
    $name = secure($_POST["name"]);
    $pass = secure($_POST["pass"]);
    // var_dump($_POST);

    if(isset($_POST["terms"])){
        $terms = $_POST["terms"];
    }else{
        $errores = true;
        $termsError  = "Es obligatorio aceptar los términos";
    }

    //esto en realidad lo puedo verificar por HTML con maxlenght y minlenght, pero también se puede hacer por servidor aunque es peor práctica
    if(strlen($name)<3 || strlen($name) > 15){
        $nameError = "La longitud entre 3 y 15";
        $errores = true;
    }

    //Si está todo bien: a index,
    //si no, me quedo.
    if(!$errores){
        $_SESSION["name"] = $name;
        $_SESSION["pass"] = $pass;
        $_SESSION["origin"] = "login"; //este me viene bien, para saber en el index de donde vengo
        $_SESSION["terms"] = $terms;
        $_SESSION["test"] = "hola";  //este no vale para nada, estamos creando para probar
        
        //Si hago lo de la cookie de permanecer registrado:
        setcookie("looged", $name, time()+30*24*60*60, "/"); //esto seria un mes

        //Redirijo:
        //header("Location: indexprovisional.php");
        header("Location: ../indexv2.php");
        //Termino el script:
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styleLogin.css">
</head>
<body>
    <h1>Formulario - Login</h1>
    <div class="general">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name">Nombre: </label>
        <input type="text" placeholder="Nombre..." name="name" id="name" value="<?= $name?>" >
        <?= "<p class='error'>" . $nameError . "</p>"?> 
        <!--
        pattern="[a-z]" (donde hemos puesto por ejemplo el max y el min)
        Pattern lo que hace es comprobar el formato que tiene cadenas de texto-->
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <br>
        <br>
    
        <input type="checkbox" name="terms" id="terms" value="t" 
            class="<?= empty($termsError) ? " ": "checkError" ?>">
        <label for="terms"
            class="<?=empty($termsError) ? " " : "checkError" ?>">Acepto los términos</label>
        <!-- si no acepta los terminos sale el mensaje que hemos declarado arriba-->
        <?= "<p class='error'>" . $termsError . "</p>"?>
        
        <input type="checkbox" id="looged" name="logged">
        <label for="logged">Quiero permanecer registrado</label>
        <br>
        <br>
        <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
<?php
session_start(); //abro sesión: voy a utilizar $_SESSION


// Valores iniciales
$email = $name = "";
$time = 0;
$gluten = "";
$comida = "";
$colorFavorito = "#000000";

$radioError = "";
$selectError = "";
$errores = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include $_SERVER['DOCUMENT_ROOT'] . "/utils.php";
    $email = secure($_POST["email"]);
    $name = secure($_POST["name"]);
    $time = secure($_POST["time"]);
    $colorFavorito = secure($_POST["colorFavorito"]);

    //validar seleccion comida
    $comida = secure($_POST["comida"]);

    //validación gluten (radio)
    if(isset($_POST["gluten"])){
        $gluten = secure($_POST["gluten"]);
    }else{
        $errores = true;
        $radioError  = "Es obligatorio elegir una opción";
    }

    //COOKIE:
    if(isset($_POST["cookie"])){
        //quiero que dure dos semanas (por ejemplo)
        setcookie("receta", "valor de la cookie", time() + (14*24*60*60));   //14 dias, por 24 horas, por 60 minutos por 60 segundos


    }



    //Si está todo bien: a index,
    //si no, me quedo.
    if(!$errores){
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["comida"] = $comida;
        $_SESSION["gluten"] = $gluten;
        $_SESSION["time"] = $time;
        $_SESSION["colorFavorito"] = $colorFavorito;
        $_SESSION["origin"] = "formulario";
        //Redirijo:
        header("Location: indexrecipe.php");
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
    <link rel="stylesheet" href="/css/stylerecipe.css">

</head>
<body>

    <header>
        <h1>Formulario - Recetas</h1>


    </header>

    <main class="form-recetas">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="example@gmail.com" value="<?php echo $email?>">
            </div>

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Nombre" value="<?php echo $name?>">
            </div>

            <div class="form-group">
                <label for="time">Tiempo (minutos):</label>
                <input type="number" name="time" id="time" value="<?php echo $time?>">
            </div>

            <div class="form-group">
                <label for="comida">Tipo de comida:</label>
                <select name="comida" id="comida" >
                    <option value="vegana" <?= $comida == "vegana" ? "selected" : ""?>>
                        Vegana
                    </option>
                    <option value="vegetariana" <?= $comida == "vegetariana" ? "selected" : ""?>>
                        Vegetariana
                    </option>
                    <option value="carnivora" <?= $comida == "carnivora" ? "selected" : ""?>>
                        Carnívora
                    </option>
                </select>
                

            </div>

            <fieldset class="form-group">
                <legend>Selecciona una opción:</legend>
                <label><input type="radio" name="gluten" value="conGluten" class="<?= empty($radioError) ? " ": "radioError" ?>"> Con gluten</label>
                <label><input type="radio" name="gluten" value="sinGluten" class="<?= empty($radioError) ? " ": "radioError" ?>"> Sin gluten</label>
                <?= "<p class='error'>" . $radioError . "</p>"?>

            </fieldset>

            <div class="form-group">
                <label for="colorFavorito">Elige un color:</label>
                <input type="color" id="colorFavorito" name="colorFavorito" value="<?= $colorFavorito ?>">
            </div>

            
            <input type="checkbox" id="cookie" name="cookie">
            <label for="cookie">Quiero que me hagas una cookie:</label>
            
            
            <input type="submit" value="Entrar" class="boton-submit">

        </form>
    </main>
    <footer>
        <h3>Footer</h3>
    </footer>




</body>
</html>
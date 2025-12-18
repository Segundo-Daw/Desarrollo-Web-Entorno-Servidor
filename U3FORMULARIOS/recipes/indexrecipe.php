<?php
session_start(); 


if(!isset($_SESSION["origin"])){
    header("Location: formrecipe.php");
    exit();
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


        <!-- Creo un objeto de la clase recipe y lo imprimo con su to strgin-->
        <?php
        require $_SERVER["DOCUMENT_ROOT"] . "/recipes/Recipe.php";

        //var_dump($_COOKIE);

        $r = new Recipe($_SESSION["email"], $_SESSION["name"], $_SESSION["comida"], $_SESSION["gluten"], $_SESSION["time"], $_SESSION["colorFavorito"]);

        echo $r;
        ?>

        <a href="closesession.php">Haz clic aqui para cerrar la sesión y borrar cookies.</a>



    </div>
   
    
</body>
</html>
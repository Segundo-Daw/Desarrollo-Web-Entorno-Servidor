<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del formulario</title>
</head>
<body>
    <p>Estoy en la landing page</p>
    <?php
        //var_dump($_SERVER);
        var_dump($_GET);
        var_dump($_POST);

    ?>
    <!--1º forma de hacer el if con {}>>
    este if empieza aqui-->
    <?php if ($_SERVER['REQUEST_METHOD'] == "GET"){ ?>
        <p>He llegado a través de una petición GET</p>
        <P>El nombre es: <?php echo $_GET["name"] ?></P>
        <P>La contraseña es es: <?= $_GET["pass"] ?></P>
    <?php } ?>
    <!--y termina aqui-->

    <!--2º forma de hacer el if con : y se termina con endif este if empieza aqui-->
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST"): ?>
        <p>He llegado a través de una petición POST</p>
        <P>El nombre es: <?php echo $_POST["name"] ?></P>
        <P>La contraseña es es: <?= $_POST["pass"] ?></P>
    <!-- Antes de acceder a  $_POST["genre"] tengo que ver si existe: isset-->
        <?php if(isset($_POST["genre"])) :?>
            <p>Tu género es: <?= $_POST["genre"]?></p>
        <?php else : ?>
            <p>No has elegido  ningun género</p>
            <?php endif?>
    <?php endif ?>
    <!--y termina aqui
    





</body>
</html>
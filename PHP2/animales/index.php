<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clases</title>
</head>
<body>
    <h3>clases : Animales</h3>
    <?php
    include "./Cat.php";
    $cat = new Cat("mario", "naranja",9);
    echo $cat ->miaw();

    include "./Minotauro.php";
    $minotauro1 = new Minotauro("Abdelrramán");
    $minotauro2 = new Minotauro("Manolo", 15);
    echo "<p>La edad de " .  $minotauro1->getName() . " es " . $minotauro1->getAge() .  "</p>";
    echo "<p>La edad de " .  $minotauro2->getName() . " es " . $minotauro2->getAge() .  "</p>";

    echo $minotauro1;  //Esto funciona porque esta escrito el tostring en la clase Minotauro
    echo "<br>";
    echo $minotauro2;


    ?>
</body>
</html>
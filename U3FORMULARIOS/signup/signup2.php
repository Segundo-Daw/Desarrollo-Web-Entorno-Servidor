<?php
    session_start();

        $name = $email = $password = $password2 = " ";
        $age = 0;
        $studies = [];
        $errors = false;  //por defecto si es false se entiende que no hay errores
        $passError = " ";

    function secure($text){
        //Quitar espacios de delante y detrás
            //$text = trim($text);
        //Escapar caracteres especiales
            //$text = stripslashes($text);
        //Caracteres especiales de HTML
            //$text = htmlspecialchars($text);

        //esto resume todo lo de arriba
        $text = htmlspecialchars(stripcslashes(trim($text)));
        return $text;
    } 


//Hago las comprobaciones del formulario:
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        //Solo se va a meter en este if si llega con una petición POST,
        //es decir, después de hacer clic en el botón del formulario post

        $name = secure($_POST["name"]);
        $password = secure($_POST["password"]);
        $password2 = secure($_POST["password2"]);
        $email = secure($_POST["email"]);
        $age = secure($_POST["age"]);
        if(isset(($_POST["studies"]))){
            $studies = ($_POST["studies"]);
        }

        if ($password !== $password2){
            //hay errores, muestro formulario(sigo aquí)
            $errors = true;
            $passError = "Las contraseñas no coinciden";
            //echo "estoy en el if de contraseñas";
        }else{
            //Guardo en la sesión los datos que quiero pasar:
            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            $_SESSION["age"] = $age;
            $_SESSION["studies"] = $studies;

            // Le puedo meter otra información
            $_SESSION["origin"] = "signup";
            
            //me voy al index
            header("Location: ../indexv2.php");
            exit(); //con esto termina el script, no se ejecuta nada más
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <!-- Link a mi css-->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <p>Formulario de registro. Al pulsar el botón enviar, se va al index.</p>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
        <div class="name">
            <label for="name">Nombre: </label>
            <input type="text" placeholder="Nombre..." name="name" id="name" value="<?php echo $name?>">
        </div>
        
        <div class="password">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" minlength="6"> 
            <br>
            <br>
            <label for="password2"> Repite contraseña:</label>
            <input type="password" name="password2" id="password2" minlength="6">
            <p class="error"><?php echo $passError?></p>
        </div>

        <div class="email">
            <label for="email">Email: </label>
            <input type="text" placeholder="example@gmail.com" name="email" id="email" value="<?php echo $email?>">
        </div>

        <div class="edad">
            <label for="age">Edad: </label>
            <input type="number" name="age" id="age" value="<?php echo $age?>">
        </div>
       
        <p>Asignaturas favoritas: </p>
        <div class="cursos">            
            <label for="dwes">Desarrollo Web entorno servidor</label>
            <input type="checkbox" id="dwes" name="studies[]" value="dwes"
                <?php
                    if (in_array("dwes", $studies)){
                        echo "checked";
                    }                
                ?>      
            >
            <br>
            <br>
            <label for="dewc">Desarrollo Web entorno cliente</label>
            <input type="checkbox" id="dewc" name="studies[]" value="dewc"
                <?= in_array("dewc", $studies) ? "checked" : ""?>
            >
            <br>    
            <br>    
            <label for="desp">Despliegue de interfaces web</label>
            <input type="checkbox" id="desp" name="studies[]" value="desp"
                <?= in_array("desp", $studies) ? "checked" : ""?>
            >
            <br>
            <br>
        </div>
        <input type="submit" value="Enviar">
        
    </form>
</body>
</html>
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
    <form action="index.php" method="post">
        <div class="name">
            <label for="name">Nombre: </label>
            <input type="text" placeholder="Nombre..." name="name" id="name" >
        </div>
            
        <div class="password">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" minlength="6"> 
            <br>
            <br>
            <label for="password2"> Repite contraseña:</label>
            <input type="password" name="password2" id="password2" minlength="6">
        </div>

        <div class="email">
            <label for="email">Email: </label>
            <input type="text" placeholder="example@gmail.com" name="email" id="email">
        </div>

        <div class="edad">
            <label for="age">Edad: </label>
            <input type="number" name="age" id="age">
        </div>

        <p>Asignaturas favoritas: </p>
        <div class="cursos">            
            <label for="dwes">Desarrollo Web entorno servidor</label>
            <input type="checkbox" id="dwes" name="studies[]" value="dwes">
            <br>
            <br>
            <label for="dewc">Desarrollo Web entorno cliente</label>
            <input type="checkbox" id="dewc" name="studies[]" value="dewc">
            <br>    
            <br>    
            <label for="desp">Despliegue de interfaces web</label>
            <input type="checkbox" id="desp" name="studies[]" value="desp">
            <br>
            <br>
        </div>
        <input type="submit" value="Enviar">
        <script>
            alert("hola");
        </script>
    </form>
</body>
</html>
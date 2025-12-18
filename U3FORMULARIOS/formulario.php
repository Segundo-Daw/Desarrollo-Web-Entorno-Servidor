<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="landing.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" placeholder="Nombre..." name="name" id="name">
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="pass" id="password" minlength="5"> 
        <br>

        <label for="terms">Acepto los términos y condiciones</label>
        <input type="checkbox" name="terms" value="true" id="terms">
        <br>

        <label for="subjects">Asignaturas</label>
            <select id="subjects" name="subjects">
                <option value="DWES">Desarrollo Web entorno servidor</option>
                <option value="DEWC">Desarrollo Web entorno cliente</option>
                <option value="Desp">Despliegue</option>
            </select>
        <br>
        <input type="radio" id= "man" name="genre" value="man">
        <label for="man">Hombre</label>
        <br>
        <input type="radio" id= "woman" name="genre" value="woman">
        <label for="man">Mujer</label>
        <br>
        <input type="radio" id= "other" name="genre" value="other"> 
        <label for="man">Otro</label>
        <br>
        <input type="submit" value="Enviar">

    </form>
    
</body>
</html>
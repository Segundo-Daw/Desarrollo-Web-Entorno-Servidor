<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <!-- Link a mi css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <p>En esta página:</p>
        <ol>
           <li>Se comprueba que ha llegado a través de POST</li>
            <li>Haz un var_dump($_POST)</li>
                
           <li>Se instancia un objeto User</li> 
           <li>Se muestra el user creado(toString)</li> 
        </ol>
        

        <?php 
        require $_SERVER["DOCUMENT_ROOT"] . "/signup/User.php";

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST["name"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            
            var_dump($_POST);
            //$studies = $_POST["studies"];

            //si hago la transoçformación a int, tengo que verificar que no está vacío
            if (empty($age)){
                $age = 0;
            }

            //si es un array: el name tiene que incluir []
            //Si son checkbox, radio, select, etc. tengo que verificar si existe esa clave en $_Post:
            $studies = [];
            if(isset(($_POST["studies"]))){
                $studies = $_POST["studies"];
            }
            
            $u = new User($name, $password, $email, $age, $studies);
            echo "<p>$u</p>";

        }else{
            echo "<p>No puedes estar aquí</p>";
        }
        ?>
</body>
</html>
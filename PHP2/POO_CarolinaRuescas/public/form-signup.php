<?php
//Inicio de sesión
session_start();

// Verificar si he llegado a través del botón submit(es decir, petición POST)
$name = $email = $pass = $pass2  = $conect = "";
$passError = $nameError = $emailError = "";
$errors = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //1. recoger datos
    include $_SERVER["DOCUMENT_ROOT"] . "/utils/funciones.php";
    $name = secure ($_POST["name"]);
    $email = secure ($_POST["email"]);
    $pass = secure ($_POST["pass"]);
    $pass2 = secure ($_POST["pass2"]);

    if(isset($_POST["stay-connected"]))
    $conect = $_POST["stay-connected"];


    //2. verificaciones
    if (empty($name)){
        $errors = true;
        $nameError = "Este campo es obligatorio";
    }

    if (empty($email)){
        $errors = true;
        $emailError = "Este campo es obligatorio";
    }

    if (empty($pass) or $pass != $pass2){
        $errors = true;
        $passError = "Rellena las contraseñas iguales";
    }elseif (strlen($pass) < 6) {
    // Si pasan el primer filtro pero son cortas, entran aquí
    $errors = true;
    $passError = "La contraseña debe tener al menos 6 caracteres.";
    }

    // 3. Si todo está bien, guardamos en la Base de Datos
    if (!$errors) {
        // Importamos la clase de conexión que configuramos antes
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php"; 

        try {
            $conexion = CoreDB::getConnection();
            // Preparamos la sentencia SQL (asegúrate de que la tabla 'usuarios' exista en DBeaver)
            $sql = "INSERT INTO usuarios (name, email, pass) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            // Encriptar la contraseña por seguridad antes de guardarla
            $passHash = password_hash($pass, PASSWORD_DEFAULT);

            // "sss" indica que pasamos 3 strings
            $stmt->bind_param("sss", $name, $email, $passHash);

            if ($stmt->execute()) {
                // Si se guarda bien en Docker, entonces sí redirigimos
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                header("Location: form-login.php"); 
                exit();
            } else {
                $emailError = "Error: El email ya podría estar registrado.";
            }
            
        } catch (Exception $e) {
            $nameError = "Error de conexión con la base de datos: " . $e->getMessage();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Incluir cabecera -->
     <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header.php";?>


     <!-- Mensaje de éxito -->
        <?php if (!empty($successMessage)) : ?>
            <p class="success"><?= $successMessage ?></p>
        <?php endif; ?>

        <!-- Mostrar errores -->
        <div class="errors">
            <?= $nameError ? "<p>$nameError</p>" : "" ?>
            <?= $emailError ? "<p>$emailError</p>" : "" ?>
            <?= $passError ? "<p>$passError</p>" : "" ?>
        </div>

    <!--Incluir el formulario de signup-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/components/signup.php";?>

      <!-- Incluir footer -->
     <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>



    
</body>
</html>
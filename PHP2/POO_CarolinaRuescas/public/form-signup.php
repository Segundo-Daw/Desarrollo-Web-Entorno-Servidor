<?php
//Inicio de sesión
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php"; 
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/UsuarioDAO.php";

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
    try {
        //comprobar si el email ya existe
        if (UsuarioDAO::existsByEmail($email)) {
            $emailError = "Este email ya está registrado";
            $errors = true;
        } else {
            $usuario = new Usuario($name, $email, $pass);
            $id = UsuarioDAO::create($usuario);

            if ($id) {
                $_SESSION["name"] = $usuario->getName();
                $_SESSION["email"] = $usuario->getEmail();
                header("Location: form-login.php");
                exit();
            }
        }
    } catch (Exception $e) {
        $nameError = "Error al guardar el usuario: " . $e->getMessage();
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
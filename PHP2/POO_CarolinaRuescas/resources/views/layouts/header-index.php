<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link a Font Awesome 6 para los emojis-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Link a mi css-->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
    <?php
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Perro.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";


    ?>

    <header class="header">
            <h1>Oasis Animal</h1>
    </header>

    <!-- desglose de Menús -->
        <nav class="opciones">
            <div class="card-opciones">
                <i class="fa-solid fa-user-plus"></i>   
                <a href="/public/form-signup.php">Crear Usuario</a>            
            </div>
            
             <div class="card-opciones">
                <i class="fa-solid fa-user-check"></i>    
                <a href="/public/form-login.php">Inicio de Sesión</a>            
            </div>
            <div class="card-opciones">
                <i class="fa-solid fa-house"></i>  
                <a href="/public/index.php">Home</a></a>            
            </div>
             <div class="card-opciones">
                <i class="fa-solid fa-user-slash"></i>   
                <a href="/public/form-closesession.php">Cerrar Sesión</a>            
            </div>    
        </nav>




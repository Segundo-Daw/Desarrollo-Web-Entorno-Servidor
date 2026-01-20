<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php"; 
require_once $_SERVER["DOCUMENT_ROOT"] . "/utils/funciones.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/PerroDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Perro.php";

if(!(isset($_COOKIE["stay-connected"]) or isset($_SESSION["origin"]))){
    $_SESSION["error"] = "· Te has intentado colar en el index ·";
    header("Location: form-login.php");
    exit();
}

$conexion = CoreDB::getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "añadir") {
    $name = secure($_POST["name"]);
    $age = intval($_POST["age"]);
    $numberDays = intval($_POST["numberDays"]);
    $type = secure($_POST["type"]);
    $raza = secure($_POST["raza"]);
    $muerde = isset($_POST["muerde"]) ? 1 : 0; // 1 si muerde, 0 si no

    //CREAMOS AL PERRO
    $perro = new Perro($raza,$muerde,$name,$age,$numberDays,$type);

    //GUARDAMOS EN LA BASE DE DATOS
    $id = PerroDAO::create($perro);
}


// ELIMINAR PERRO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "eliminar") {
    $id_perro = (int) $_POST["id_perro"];
    PerroDAO::deleteById($id_perro);
}

// OBTENER EL LISTADO COMPLETO
$resultado = $conexion->query("SELECT * FROM perros");
$perros = PerroDAO::findAll(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <!-- Incluir css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Incluir cabecera -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/header-index.php";?>

    

    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/UsuarioDAO.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";

    ?>
    <main>
    <div class="titulo">
        <h1>Gestión de Perros del Hotel</h1>
        <h2>Registrar Nuevo Perro</h2>
    </div>

        <div class="container">
            
            <form method="POST" action="index.php">
                <input type="hidden" name="accion" value="añadir">
                
                <input type="text" name="name" placeholder="Nombre" required>
                <input type="number" name="age" placeholder="Edad" required>
                <input type="number" name="numberDays" placeholder="Días de estancia" required>
                <input type="text" name="type" placeholder="Tipo (ej. Grande/Pequeño)" required>
                <input type="text" name="raza" placeholder="Raza" required>
                
                

            <div class="checkbox-group">
                <input type="checkbox" name="muerde"> 
                <label for="muerde">¿Muerde?</label>

            </div>
                <button type="submit">Añadir al Hotel</button>
            </form>
</div>

        <hr>
        <div class="titulo">
            <h2>Perros Hospedados</h2>
        </div>
        <div class="container">
            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Días</th>
                            <th>¿Muerde?</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                
                    <?php while($p = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($p["name"]) ?></td>
                        <td><?= htmlspecialchars($p["raza"]) ?></td>
                        <td><?= $p["numberDays"] ?></td>
                        <td><?= $p["muerde"] ? "Sí" : "No" ?></td>
                        <td>
                            <form method="POST" action="index.php">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id_perro" value="<?= $p["id"] ?>">
                                <button type="submit" onclick="return confirm('¿Borrar registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>

                <p>No hay perros registrados.</p>
                
            <?php endif; ?>

            </div>
    </main>





     

    <!-- Incluir footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>
    
</body>
</html>
<?php
session_start();
//declaramos las variables
$name = $age = $numberDays = $type  = $raza = $muerde = "";
$nameError = $ageError = $numberDaysError = $type = $raza = "";
$errors = false;


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php"; 
require_once $_SERVER["DOCUMENT_ROOT"] . "/utils/funciones.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/repositories/PerroDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Perro.php";

if(!(isset($_COOKIE["stay-connected"]) or isset($_SESSION["origin"]))){
    $_SESSION["error"] = "Primero tienes que iniciar sesión ¡No te cueles en el Index!";
    header("Location: form-login.php");
    exit();
}

$conexion = CoreDB::getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_POST["accion"] == "añadir") {
    $name = secure($_POST["name"]);
    $age = intval(secure($_POST["age"])); // intval = para garantizar que es un número
    $numberDays = intval(secure($_POST["numberDays"]));
    $type = secure($_POST["type"]);
    $raza = secure($_POST["raza"]);
    $muerde = isset($_POST["muerde"]) ? 1 : 0; // 1 si muerde, 0 si no

    //CREAMOS AL PERRO
    $perro = new Perro($raza,$muerde,$name,$age,$numberDays,$type);

    //verificaciones de los campos
    if (empty($name)){
        $errors = true;
        $nameError = "Es obligatorio que pongas un nombre";
    }
    if ($age <= 0){
        $errors = true;
        $ageError = "Es obligatorio que introduzcas la edad (mayor que 0)";
    }
     if ($numberDays <=0){
        $errors = true;
        $numberDaysError = "Es obligatorio indicar los días de estancia (min 1 día)";
    }
     if (empty($type)){
        $errors = true;
        $typeError = "Es obligatorio indicar el tamaño";
    }
     if (empty($raza)){
        $errors = true;
        $razaError = "Es obligatorio indicar la raza";
    }else if(!$errors){
        //GUARDAMOS EN LA BASE DE DATOS
        $id = PerroDAO::create($perro);
    }

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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/components/crearPerro.php";?>
        
        
        <div class="titulo2">
            <h2>· Perros Hospedados Actualmente · </h2>
        </div>
        <div class="container">
            <div class="form-container-hospedados">
            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>Días</th>
                            <th>¿Muerde?</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                
                    <?php while($p = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?=$p["id"]?></td>
                        <td><?= htmlspecialchars($p["name"]) ?></td>
                        <td><?= htmlspecialchars($p["raza"]) ?></td>
                        <td><?= $p["age"] ?></td>
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
                <p>No hay perros registrados por el momento.</p>
            <?php endif; ?>
            </div>
            </div>
    </main>
    <!-- Incluir footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/layouts/footer.php";?>
</body>
</html>
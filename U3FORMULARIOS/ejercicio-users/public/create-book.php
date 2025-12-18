<?php
//1. ver si llego por post (formulario)
//2. recojo valores securizados
//3. 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/layouts/header.php"; ?>
    <main>

        <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/components/book.php"; ?>

    </main>
    <!-- Incluir footer -->
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/resources/views/layouts/footer.php"; ?>

</body>
</html>
<?php
//El formulario tiene los siguientes campos:
//ISBN
//título
//autoría
//número de páginas
//checkbox: novela / poesía / teatro / ensayo / otros
?>



<!-- Formulario de libro -->
<div class="form-container">
    <h2>Crea un libro nuevo</h2>
    <form id="bookForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text"
                id="isbn"
                name="isbn"
                placeholder="123456789X">
        </div>

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text"
                id="title"
                name="title"
                placeholder="Título">
        </div>

        <div class="form-group">
            <label for="author">Autoría</label>
            <input type="text"
                id="author"
                name="author"
                placeholder="Autoría">
        </div>

        <div class="form-group">
            <label for="pages">Número de páginas</label>
            <input type="number" id="pages" name="pages" min="0">
        </div>

        <div class="checkbox-group">
            <input type="checkbox" name="type" value="novel" id="novel">
            <label for="novel">Novela</label>
            <input type="checkbox" name="type" value="poetry" id="poetry">
            <label for="poetry">Poesía</label>
        </div>
        <div class="checkbox-group">
            <input type="checkbox" name="type" value="theatre" id="theatre">
            <label for="theatre">Teatro</label>
            <input type="checkbox" name="type" value="essay" id="essay">
            <label for="essay">Ensayo</label>
            <input type="checkbox" name="type" value="other" id="other">
            <label for="other">Otros</label>
        </div>

        <button type="submit">Crear libro</button>

    </form>
</div>
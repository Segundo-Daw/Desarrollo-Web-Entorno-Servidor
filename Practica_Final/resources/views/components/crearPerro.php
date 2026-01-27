<div class="titulo">
            <h1>Gestión de Perros del Hotel</h1>
        </div>
        <div class="titulo2">
            <h2>Registrar Nuevo Perro</h2>
        </div>

        <div class="container">
            <div class= "form-container">
                <form method="POST" action="index.php">

                    <input type="hidden" name="accion" value="añadir">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" placeholder="Nombre de tu mascota" value="<?=$name?>" class="<?= empty($nameError) ? '' : 'input-error' ?>">
                    </div>
                    <?= empty($nameError) ? "" : "<p class='p-error'>$nameError</p>" ?>

                    <div class="form-group">
                        <label for="age">Edad</label>
                        <input type="number" name="age" placeholder="Años de tu mascota" value="<?=$age?>" class="<?= empty($ageError) ? '' : 'input-error' ?>">
                    </div>
                    <?= empty($ageError) ? "" : "<p class='p-error'>$ageError</p>" ?>


                    <div class="form-group">
                        <label for="numberDays">Días</label>
                        <input type="number" name="numberDays" placeholder="Días de estancia" value="<?=$numberDays?>" class="<?= empty($numberdaysError) ? '' : 'input-error' ?>">
                    </div>
                    <?= empty($numberDaysError) ? "" : "<p class='p-error'>$numberDaysError</p>" ?>


                    <div class="form-group">
                        <label for="type">Tipo de perro</label>
                        <input type="text" name="type" placeholder="Grande/Pequeño" value="<?=$type?>" class="<?= empty($typeError) ? '' : 'input-error' ?>">
                    </div>
                    <?= empty($typeError) ? "" : "<p class='p-error'>$typeError</p>" ?>


                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <input type="text" name="raza" placeholder="pastor alemán, mestizo..." value="<?=$raza?>" class="<?= empty($razaError) ? '' : 'input-error' ?>">
                    </div>
                    <?= empty($razaError) ? "" : "<p class='p-error'>$razaError</p>" ?>

                    
                    <div class="checkbox-group">
                        <input type="checkbox" name="muerde"> 
                        <label for="muerde">¿Muerde?</label>
                    </div>
                    <br>

                    <button type="submit">Añadir al Hotel</button>
                </form>
            </div>
        </div>
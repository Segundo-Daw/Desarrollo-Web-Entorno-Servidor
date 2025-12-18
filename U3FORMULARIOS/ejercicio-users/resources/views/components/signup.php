
<!-- Formulario de Signup -->
<div class="form-container">
    <h2>Crear Cuenta</h2>
    <form action="<?=$_SERVER["PHP_SELF"] ?>" method="post" id="signupForm">
        <div class="form-group">
            <label for="fullname">Nombre completo</label>
            <input type="text" id="fullname" name="fullname" placeholder="Tu nombre completo" value="<?=$name?>" class="<?= empty($nameError) ? "" : "input-error" ?>">
            <div class="error-message" id="fullname-error">Por favor, introduce tu nombre completo</div>
        </div>

        <?= empty($nameError) ? "" : "<p class='p-error'>$nameError</p>" ?>

        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" id="signup-email" name="signup-email" placeholder="tu@email.com" value="<?=$email?>" class="<?= empty($emailError) ? "" : "input-error" ?>">
            <div class="error-message" id="signup-email-error">Por favor, introduce un email válido</div>
        </div>

         <?= empty($emailError) ? "" : "<p class='p-error'>$emailError</p>" ?>

        <div class="form-group">
            <label for="signup-password">Contraseña</label>
            <input type="password" id="signup-password" name="signup-password" placeholder="Crea una contraseña" class="<?= empty($passError) ? "" : "input-error" ?>">
            <div class="error-message" id="signup-password-error">La contraseña debe tener al menos 6 caracteres</div>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirmar contraseña</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Repite tu contraseña" class="<?= empty($passError) ? "" : "input-error" ?>">
            <div class="error-message" id="confirm-password-error">Las contraseñas no coinciden</div>
        </div>

        <?= empty($passError) ? "": "<p class'error'>$passError</p>" ?>

        <div class="form-group">
            <label for="region">Comunidad Autónoma</label>
            <select id="region" name="region" required>
                <?php include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Region.php"; ?>
                <?php foreach (Region::cases() as $comunidad): ?>
                    <option value="<?= $comunidad->name ?>"><?= $comunidad->value ?></option>
                <?php endforeach; ?>
                <!--<option value="" disabled selected>Selecciona tu comunidad</option>
                        <option value="andalucia">Andalucía</option>
                        <option value="aragon">Aragón</option>
                        <option value="asturias">Asturias</option>
                        <option value="baleares">Islas Baleares</option>
                        <option value="canarias">Canarias</option>
                        <option value="cantabria">Cantabria</option>
                        <option value="castilla_leon">Castilla y León</option>
                        <option value="castilla_mancha">Castilla-La Mancha</option>
                        <option value="cataluna">Cataluña</option>
                        <option value="extremadura">Extremadura</option>
                        <option value="galicia">Galicia</option>
                        <option value="madrid">Madrid</option>
                        <option value="murcia">Murcia</option>
                        <option value="navarra">Navarra</option>
                        <option value="pais_vasco">País Vasco</option>
                        <option value="rioja">La Rioja</option>
                        <option value="valencia">Comunidad Valenciana</option>
                        <option value="ceuta">Ceuta</option>
                        <option value="melilla">Melilla</option>-->
            </select>
            <div class="error-message" id="region-error">Por favor, selecciona tu comunidad autónoma</div>
        </div>

    
        <button type="submit">Crear Cuenta</button>

        <div class="form-footer">
            ¿Ya tienes cuenta? <a href="/public/form-login.php" id="go-to-login">Inicia Sesión</a>
        </div>
    </form>
</div>
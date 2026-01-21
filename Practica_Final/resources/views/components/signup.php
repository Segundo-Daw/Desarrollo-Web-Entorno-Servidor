<!-- Formulario de Signup -->
<div class="container">
    <div class="form-container">
        <h2>Crear Cuenta</h2>
        <form action="<?=$_SERVER["PHP_SELF"] ?>" method="post" id="signupForm">
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input type="text" id="fullname" name="name" placeholder="Tu nombre completo" value="<?=$name?>" class="<?= empty($nameError) ? "" : "input-error" ?>">
                <div class="error-message" id="name-error">Por favor, introduce tu nombre completo</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="tu@email.com" value="<?=$email?>" class="<?= empty($emailError) ? "" : "input-error" ?>">
                <div class="error-message" id="email-error">Por favor, introduce un email válido</div>
            </div>

            <?= empty($emailError) ? "" : "<p class='p-error'>$emailError</p>" ?>

            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" id="pass" name="pass" placeholder="Crea una contraseña" class="<?= empty($passError) ? "" : "input-error" ?>">
                <div class="error-message" id="pass-error">La contraseña debe tener al menos 6 caracteres</div>
            </div>

            <div class="form-group">
                <label for="pass2">Confirmar contraseña</label>
                <input type="password" id="pass2" name="pass2" placeholder="Repite tu contraseña" class="<?= empty($passError) ? "" : "input-error" ?>">
                <div class="error-message" id="pass2-error">Las contraseñas no coinciden</div>
            </div>

            <?= empty($passError) ? "": "<p class'error'>$passError</p>" ?>
            <button type="submit">Crear Cuenta</button>

            <div class="form-footer">
                ¿Ya tienes cuenta? <a href="/public/form-login.php" id="go-to-login">Inicia Sesión</a>
            </div>

        </form>
    </div>
 </div>
<!-- Formulario de Signup -->
<div class="container">
    <div class="form-container">
        <h2>Crear Cuenta</h2>
        <form action="<?=$_SERVER["PHP_SELF"] ?>" method="post" id="signupForm">
            <div class="form-group">
                <label for="fullname">Nombre completo</label>
                <input type="text" id="fullname" name="fullname" placeholder="Tu nombre completo" value="<?=$name?>" class="<?= empty($nameError) ? "" : "input-error" ?>">
                <div class="error-message" id="fullname-error">Por favor, introduce tu nombre completo</div>
            </div>

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
            <button type="submit">Crear Cuenta</button>

            <div class="form-footer">
                ¿Ya tienes cuenta? <a href="/public/form-login.php" id="go-to-login">Inicia Sesión</a>
            </div>

        </form>
    </div>
 </div>
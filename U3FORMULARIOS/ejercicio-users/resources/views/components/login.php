<!-- Formulario de Login -->
<div class="form-container">
    <h2>Iniciar Sesión</h2>
    <form id="loginForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="radio-group">
            <div class="radio-option">
                <input type="radio" id="login-email" name="login-type" value="email" checked>
                <label for="login-email">Email</label>
            </div>
            <div class="radio-option">
                <input type="radio" id="login-username" name="login-type" value="username">
                <label for="login-username">Usuario</label>
            </div>
        </div>

        <div class="form-group" id="email-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="tu@email.com" required>
            <div class="error-message" id="email-error">Por favor, introduce un email válido</div>
        </div>

        <div class="form-group" id="username-group" style="display: none;">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" placeholder="Tu nombre de usuario">
            <div class="error-message" id="username-error">Por favor, introduce tu nombre de usuario</div>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Tu contraseña" required>
            <div class="error-message" id="password-error">Por favor, introduce tu contraseña</div>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="stay-connected" name="stay-connected">
            <label for="stay-connected">Quiero seguir conectado</label>
        </div>

        <button type="submit">Iniciar Sesión</button>

        <div class="form-footer">
            ¿No tienes cuenta? <a href="/public/form-signup.php"
                id="go-to-signup">Regístrate</a>
        </div>
    </form>
</div>
<!-- Formulario de Login -->
<div class="container">
    <div class="form-container">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            

            <div class="form-group" id="email-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="tu@email.com" required>
                <div class="error-message" id="email-error">Por favor, introduce un email válido</div>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" id="pass" name="pass" placeholder="Tu contraseña" required>
                <div class="error-message" id="pass-error">Por favor, introduce tu contraseña</div>
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
</div>
## Ejercicio login / signup
Ejercicio para hacer un sistema de registro e inicio de sesión utilizando sesiones y cookies. Tiene el código de los componentes de los formularios de *login* y *signup*.

### Resources
Contiene los componentes:
- `login.php`
- `signup.php`

Y los layouts:
- `header.php`
- `footer.php`

### Public
Tienen las páginas principales:
- `form-login.php` (que hará un include del componente `login.php`).
- `form-signup.php`
- `index.php`, la página principal. Debemos garantizar que solo se llega a través de los formularios o con una *cookie*.

Y los css.

### App
Tiene los models:
- class `User`
- enum `Region`
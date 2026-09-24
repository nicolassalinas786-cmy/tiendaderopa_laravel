# 📝 Funcionalidad: Registro de Nuevos Clientes

- **Ruta web:** `/registro`
- **Controlador:** [`AuthController@showRegister`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Auth/AuthController.php), [`AuthController@register`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Auth/AuthController.php)
- **Vista Blade:** [`resources/views/auth/register.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/auth/register.blade.php)
- **Estilos:** [`public/css/auth.css`](file:///c:/laragon/www/tienda-ropa/public/css/auth.css)
- **Descripción:**
  Permite el autoregistro público de compradores en la plataforma.
  1. Captura nombre, apellido, correo electrónico, teléfono, contraseña y confirmación.
  2. Valida unicidad del correo en la tabla `usuarios` y confirmación exacta de la clave.
  3. Encripta la contraseña con Bcrypt (`Hash::make`).
  4. Asigna automáticamente el rol de Cliente (`id_rol = 1`).
  5. Inicia la sesión automáticamente tras el registro y redirige a la página principal.

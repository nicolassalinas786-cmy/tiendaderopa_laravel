# 🔐 Funcionalidad: Login y Autenticación de Usuarios

- **Ruta web:** `/login`
- **Controlador:** [`AuthController@showLogin`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Auth/AuthController.php), [`AuthController@login`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Auth/AuthController.php)
- **Vista Blade:** [`resources/views/auth/login.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/auth/login.blade.php)
- **Estilos:** [`public/css/auth.css`](file:///c:/laragon/www/tienda-ropa/public/css/auth.css)
- **Descripción:**
  Permite a clientes y administradores autenticarse en la tienda online.
  1. Recibe los campos `email` y `password` mediante método POST protegido con `@csrf`.
  2. Valida la existencia del usuario en la base de datos comparando con el campo `correo`.
  3. Verifica la contraseña encriptada usando `Hash::check()`.
  4. Redirecciona según el rol:
     - Rol Administrador (`id_rol == 2`) ➔ Redirige a `/admin`.
     - Rol Cliente (`id_rol == 1`) ➔ Redirige a `/`.
  5. En caso de credenciales inválidas, retorna el error *"Correo o contraseña incorrectos"* sin vaciar el campo de correo.

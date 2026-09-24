# 🔐 Archivo: `app/Http/Controllers/Auth/AuthController.php`

- **Ruta real:** [`app/Http/Controllers/Auth/AuthController.php`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Auth/AuthController.php)
- **Función:** Controlador de Autenticación, Registro y Sesiones.
- **Descripción:** Implementa el flujo de seguridad para clientes y administradores. Valida formularios con mensajes personalizados, autentica contra `usuarios.correo` usando `Hash::check()`, regenera tokens de sesión contra ataques de fijación y redirige a `/admin` o `/` según el rol (`id_rol`). Gestiona además el registro de nuevos usuarios y el cierre de sesión (`logout`).

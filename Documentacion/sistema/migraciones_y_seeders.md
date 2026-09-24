# 🗄️ Archivo: `database/migrations/` y `seeders/`

- **Ruta real:** [`database/migrations/`](file:///c:/laragon/www/tienda-ropa/database/migrations/) y [`database/seeders/DatabaseSeeder.php`](file:///c:/laragon/www/tienda-ropa/database/seeders/DatabaseSeeder.php)
- **Función:** Control de Versiones del Esquema de Base de Datos y Poblado Inicial.
- **Descripción:**
  Permite recrear la base de datos `salinas_db` de forma automática e íntegra:
  1. **Migraciones:**
     - `create_roles_table.php`: Define roles 1 (Cliente) y 2 (Administrador).
     - `create_usuarios_table.php`: Campos para nombre, correo, clave Bcrypt, rol y dirección.
     - `create_productos_table.php`: Catálogo con categoría, precio, stock, imagen y estado activo.
     - `create_pedidos_table.php`: Registro de compras con clave foránea hacia usuarios.
     - `create_pedido_detalle_table.php`: Ítems comprados con tallas y subtotales.
     - `create_favoritos_table.php`: Lista de deseos.
  2. **DatabaseSeeder:**
     - Inserta los roles base.
     - Crea la cuenta de administrador (`admin@salinasoriginal.com`).
     - Inserta el catálogo inicial de prendas de vestir con imágenes y existencias.

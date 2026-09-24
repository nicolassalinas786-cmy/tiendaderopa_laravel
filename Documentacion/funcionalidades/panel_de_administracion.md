# 🛡️ Funcionalidad: Panel de Administración

- **Ruta web:** `/admin`, `/admin/productos`, `/admin/pedidos`
- **Controladores:** [`ProductoAdminController`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Admin/ProductoAdminController.php), [`PedidoAdminController`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Admin/PedidoAdminController.php)
- **Vistas Blade:** [`resources/views/admin/dashboard.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/admin/dashboard.blade.php), [`pedidos.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/admin/pedidos.blade.php), [`productos.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/admin/productos.blade.php)
- **Estilos:** [`public/css/admin.css`](file:///c:/laragon/www/tienda-ropa/public/css/admin.css)
- **Descripción:**
  Zona restringida para usuarios con rol de Administrador (`id_rol == 2`):
  1. Barra lateral de navegación con accesos rápidos.
  2. Gestión de inventario de prendas: formulario modal para agregar prendas, tabla con edición de precios y stock en bodega, y eliminación lógica.
  3. Gestión de pedidos: visualización de todas las órdenes de los clientes con opción de cambio inmediato de estado logístico (`Pendiente` ➔ `En Preparación` ➔ `Enviado` ➔ `Entregado`).
  4. Tarjetas con métricas principales (pedidos activos, stock total, ventas del día).

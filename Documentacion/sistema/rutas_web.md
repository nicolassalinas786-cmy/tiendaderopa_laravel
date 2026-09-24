# 🗺️ Archivo: `routes/web.php`

- **Ruta real:** [`routes/web.php`](file:///c:/laragon/www/tienda-ropa/routes/web.php)
- **Función:** Enrutador Web Principal de la Aplicación.
- **Descripción:** Define todas las rutas accesibles en la tienda de ropa utilizando la sintaxis de Laravel 11. Organiza los grupos por funcionalidad:
  - Públicas: `/`, `/catalogo`, `/ofertas`, `/devoluciones`.
  - Autenticación: `/login`, `/registro`, `/logout`.
  - Carrito y Checkout: `/carrito`, `/carrito/agregar`, `/carrito/actualizar`, `/carrito/eliminar`, `/pago`, `/pago/procesar`, `/pago/confirmacion/{id}`.
  - Cliente: `/pedidos`, `/favoritos`, `/favoritos/toggle`.
  - Panel Admin: `/admin`, `/admin/productos`, `/admin/pedidos`, `/admin/reportes` con validación de rol de administrador.

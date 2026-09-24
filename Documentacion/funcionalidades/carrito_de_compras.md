# 🛒 Funcionalidad: Carrito de Compras en Sesión

- **Ruta web:** `/carrito`, `/carrito/agregar`, `/carrito/actualizar`, `/carrito/eliminar`
- **Controlador:** [`CarritoController`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/CarritoController.php)
- **Vista Blade:** [`resources/views/carrito.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/carrito.blade.php) y Drawer lateral en [`layouts/app.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/layouts/app.blade.php)
- **Estilos:** [`public/css/app.css`](file:///c:/laragon/www/tienda-ropa/public/css/app.css)
- **Descripción:**
  Permite al cliente acumular prendas antes de procesar el pago:
  1. Almacenamiento persistente en sesión HTTP (`session('carrito')`).
  2. Selección obligatoria de talla (S, M, L, XL) por cada prenda.
  3. Drawer lateral deslizante accesible desde el botón del Navbar en cualquier página de la tienda.
  4. Botones para incrementar, decrementar o eliminar prendas verificando que la cantidad no supere el stock real.
  5. Cálculo dinámico de subtotal y total acumulado.

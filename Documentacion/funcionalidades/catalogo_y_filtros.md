# 🛍️ Funcionalidad: Catálogo de Ropa y Filtros de Búsqueda

- **Ruta web:** `/catalogo`
- **Controlador:** [`CatalogoController@index`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/CatalogoController.php)
- **Vista Blade:** [`resources/views/catalogo.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/catalogo.blade.php)
- **Estilos:** [`public/css/app.css`](file:///c:/laragon/www/tienda-ropa/public/css/app.css)
- **Descripción:**
  Muestra todas las prendas activas en el inventario con capacidades de filtrado y ordenamiento:
  1. Filtros por categorías: Buzos, Chaquetas, Camisas, Pantalones, etc.
  2. Búsqueda por coincidencia de texto en el nombre de la prenda.
  3. Ordenamiento por precio (menor a mayor / mayor a menor) o fecha de ingreso.
  4. Visualización de tarjeta de producto con fotografía, precio en COP, categoría, selector de talla y botón para agregar directo al carrito o a favoritos.

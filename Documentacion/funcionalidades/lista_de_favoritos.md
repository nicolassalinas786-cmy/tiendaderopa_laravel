# ❤️ Funcionalidad: Lista de Favoritos (Wishlist)

- **Ruta web:** `/favoritos`, `/favoritos/toggle`
- **Controlador:** [`FavoritoController`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/FavoritoController.php)
- **Vista Blade:** [`resources/views/favoritos.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/favoritos.blade.php)
- **Estilos:** [`public/css/app.css`](file:///c:/laragon/www/tienda-ropa/public/css/app.css)
- **Descripción:**
  Permite al cliente guardar prendas para comprarlas más adelante:
  1. Ícono de corazón interactivo en cada tarjeta del catálogo.
  2. Petición asíncrona para alternar (agregar o quitar) de la tabla `favoritos`.
  3. Contador dinámico en el Navbar superior.
  4. Vista dedicada donde el usuario puede revisar sus prendas guardadas y enviarlas directamente al carrito.

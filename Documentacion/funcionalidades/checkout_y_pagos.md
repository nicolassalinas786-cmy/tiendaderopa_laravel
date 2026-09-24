# 💳 Funcionalidad: Checkout, Pasarela y Procesamiento de Pagos

- **Ruta web:** `/pago`, `/pago/procesar`, `/pago/confirmacion/{id}`
- **Controlador:** [`PagoController`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/PagoController.php)
- **Vista Blade:** [`resources/views/pago.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/pago.blade.php), [`resources/views/pago-confirmacion.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/pago-confirmacion.blade.php)
- **Estilos:** [`public/css/app.css`](file:///c:/laragon/www/tienda-ropa/public/css/app.css)
- **Descripción:**
  Cierre de venta y registro formal de la orden de compra:
  1. Recolección de datos de envío del comprador (nombre completo, teléfono, dirección, ciudad).
  2. Selección de método de pago (Nequi, Bancolombia QR o Tarjeta Débito/Crédito).
  3. Ejecución transaccional:
     - Crea la orden en la tabla `pedidos` con estado inicial `Pendiente`.
     - Registra cada prenda en `pedido_detalle` con su talla y precio congelado.
     - Reduce las unidades correspondientes del stock del producto.
     - Vacia el carrito de la sesión.
  4. Muestra la pantalla de confirmación exitosa con código de referencia, resumen de ítems y animación de verificación.

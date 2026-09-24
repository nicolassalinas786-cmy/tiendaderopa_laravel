# 💳 Archivo: `app/Http/Controllers/PagoController.php`

- **Ruta real:** [`app/Http/Controllers/PagoController.php`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/PagoController.php)
- **Función:** Controlador de Pasarela de Pago y Checkout.
- **Descripción:** Gestiona la experiencia final de compra. Muestra el formulario de facturación y dirección (`pago.blade.php`), procesa transaccionalmente la orden creando el registro en `pedidos` y los detalles en `pedido_detalle`, descuenta el stock de las prendas compradas, limpia la sesión del carrito y redirige a la pantalla de éxito (`pago-confirmacion.blade.php`).

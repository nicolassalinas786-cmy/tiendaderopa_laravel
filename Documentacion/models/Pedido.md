# 📦 Archivo: `app/Models/Pedido.php`

- **Ruta real:** [`app/Models/Pedido.php`](file:///c:/laragon/www/tienda-ropa/app/Models/Pedido.php)
- **Función:** Modelo Eloquent de Órdenes de Compra.
- **Descripción:** Representa las compras registradas en la tabla `pedidos` con clave primaria `id_pedido`. Almacena el usuario comprador (`id_usuario`), monto total, estado logístico (`Pendiente`, `En Preparacion`, `Enviado`, `Entregado`), método de pago y fecha. Define la relación `hasMany` con `PedidoDetalle` y `belongsTo` con `Usuario`.

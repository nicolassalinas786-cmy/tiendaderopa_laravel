# 📦 Funcionalidad: Historial de Pedidos del Cliente

- **Ruta web:** `/pedidos`
- **Controlador:** [`ClientePedidoController@index`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/ClientePedidoController.php)
- **Vista Blade:** [`resources/views/pedidos.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/pedidos.blade.php)
- **Estilos:** [`public/css/app.css`](file:///c:/laragon/www/tienda-ropa/public/css/app.css)
- **Descripción:**
  Permite al usuario registrado hacer seguimiento a todas sus compras:
  1. Filtra las órdenes asociadas al `id_usuario` autenticado.
  2. Muestra tarjetas por cada pedido con fecha, identificador, método de pago y monto total.
  3. Muestra una insignia con el estado del paquete: `Pendiente`, `En Preparación`, `Enviado` o `Entregado`.
  4. Desglosa los artículos adquiridos con sus respectivas tallas y precios.

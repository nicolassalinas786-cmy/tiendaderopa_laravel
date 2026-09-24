# 📚 Índice General de Documentación Técnica — Salinas Original

Este directorio contiene la documentación técnica modularizada de cada componente, controlador, modelo y funcionalidad del proyecto **Salinas Original** (Laravel 11).

---

## 🏛️ 1. Modelos Eloquent (`Documentacion/models/`)
* [Usuario.md](./models/Usuario.md): Modelo de usuario, autenticación y roles.
* [Producto.md](./models/Producto.md): Catálogo de prendas, categorías y stock.
* [Pedido.md](./models/Pedido.md): Órdenes de compra y estados logísticos.
* [PedidoDetalle.md](./models/PedidoDetalle.md): Detalle de prendas, tallas y subtotales por pedido.
* [Favorito.md](./models/Favorito.md): Relación de productos guardados en lista de deseos.
* [Role.md](./models/Role.md): Definición de roles (Cliente y Administrador).

---

## ⚙️ 2. Controladores (`Documentacion/controllers/`)
* [AuthController.md](./controllers/AuthController.md): Login, registro y cierre de sesión.
* [CatalogoController.md](./controllers/CatalogoController.md): Listado de prendas, filtros y búsqueda.
* [OfertaController.md](./controllers/OfertaController.md): Descuentos y promociones de temporada.
* [CarritoController.md](./controllers/CarritoController.md): Gestión del carrito en sesión y control de stock.
* [PagoController.md](./controllers/PagoController.md): Checkout, procesamiento de órdenes y pasarela.
* [ClientePedidoController.md](./controllers/ClientePedidoController.md): Historial de compras del comprador.
* [FavoritoController.md](./controllers/FavoritoController.md): Wishlist interactiva.
* [DevolucionController.md](./controllers/DevolucionController.md): Garantías y cambios de prenda.
* [ProductoAdminController.md](./controllers/ProductoAdminController.md): CRUD de inventario para administradores.
* [PedidoAdminController.md](./controllers/PedidoAdminController.md): Gestión y despacho de pedidos.
* [ReporteAdminController.md](./controllers/ReporteAdminController.md): Estadísticas financieras y gráficas Chart.js.

---

## 🛍️ 3. Funcionalidades del Sistema (`Documentacion/funcionalidades/`)
* [login_y_autenticacion.md](./funcionalidades/login_y_autenticacion.md): Acceso con Bcrypt y control por roles.
* [registro_de_clientes.md](./funcionalidades/registro_de_clientes.md): Formulario de registro público de usuarios.
* [catalogo_y_filtros.md](./funcionalidades/catalogo_y_filtros.md): Exploración por categorías de ropa.
* [carrito_de_compras.md](./funcionalidades/carrito_de_compras.md): Carrito persistente con tallas y cantidades.
* [checkout_y_pagos.md](./funcionalidades/checkout_y_pagos.md): Procesamiento transaccional de pagos.
* [pedidos_del_cliente.md](./funcionalidades/pedidos_del_cliente.md): Seguimiento de paquetes y compras.
* [lista_de_favoritos.md](./funcionalidades/lista_de_favoritos.md): Lista de deseos.
* [devoluciones_y_garantias.md](./funcionalidades/devoluciones_y_garantias.md): Petición de garantías posventa.
* [panel_de_administracion.md](./funcionalidades/panel_de_administracion.md): Tablero de control de tienda.
* [reportes_y_estadisticas.md](./funcionalidades/reportes_y_estadisticas.md): Métricas analíticas de ingresos y ventas.

---

## 🔧 4. Sistema, Rutas y Estilos (`Documentacion/sistema/`)
* [rutas_web.md](./sistema/rutas_web.md): Matriz de rutas de `routes/web.php`.
* [migraciones_y_seeders.md](./sistema/migraciones_y_seeders.md): Esquema de base de datos y poblado.
* [estilos_css.md](./sistema/estilos_css.md): Desacoplamiento de CSS en `public/css/`.

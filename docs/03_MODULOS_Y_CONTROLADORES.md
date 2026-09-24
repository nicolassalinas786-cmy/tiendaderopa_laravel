# ⚙️ Módulos Funcionales y Controladores — Salinas Original

## 1. Módulo de Autenticación y Cuentas (`AuthController`)
* **Ubicación:** `app/Http/Controllers/Auth/AuthController.php`
* **Vistas:** `resources/views/auth/login.blade.php`, `resources/views/auth/register.blade.php`
* **Estilos:** `public/css/auth.css`
* **Funcionalidades:**
  - `showLogin()`: Muestra el formulario con diseño premium de Salinas Original. Si el usuario ya está autenticado, lo redirige al home.
  - `login()`: Valida credenciales contra el campo `correo` de la tabla `usuarios` y comprueba la contraseña mediante `Hash::check()`. Si es Administrador (`id_rol == 2`), redirige automáticamente a `/admin`; si es Cliente, a `/`.
  - `showRegister()`: Interfaz de registro para nuevos clientes.
  - `register()`: Validación de campos (nombre, apellido, correo único, contraseña de mínimo 8 caracteres confirmada, términos aceptados) y asignación automática del rol correspondiente.
  - `logout()`: Invalida la sesión activa y regenera el token CSRF.

---

## 2. Módulo de Catálogo y Ofertas (`CatalogoController` / `OfertaController`)
* **Ubicación:** `app/Http/Controllers/CatalogoController.php`, `OfertaController.php`
* **Vistas:** `resources/views/catalogo.blade.php`, `resources/views/ofertas.blade.php`, `resources/views/home.blade.php`
* **Funcionalidades:**
  - Filtrado reactivo por categorías de ropa (Buzos, Chaquetas, Camisas, etc.).
  - Búsqueda en tiempo real por nombre de prenda.
  - Paginación y control de stock disponible.
  - Sección de ofertas exclusivas y productos destacados de temporada.

---

## 3. Módulo de Carrito de Compras (`CarritoController`)
* **Ubicación:** `app/Http/Controllers/CarritoController.php`
* **Vistas:** `resources/views/carrito.blade.php` y Drawer lateral en `resources/views/layouts/app.blade.php`
* **Funcionalidades:**
  - Gestión persistente del carrito mediante sesión (`session()->get('carrito')`).
  - Agregar prendas especificando talla (S, M, L, XL) y cantidad.
  - Actualización dinámica de cantidades con validación de stock disponible.
  - Eliminación de ítems del carrito.
  - Cálculo automático de subtotal, impuestos y total a pagar.

---

## 4. Módulo de Pasarela de Pago y Checkout (`PagoController`)
* **Ubicación:** `app/Http/Controllers/PagoController.php`
* **Vistas:** `resources/views/pago.blade.php`, `resources/views/pago-confirmacion.blade.php`
* **Funcionalidades:**
  - Formulario seguro de checkout con recolección de datos de envío (dirección, ciudad, teléfono).
  - Selección de métodos de pago (Nequi, Bancolombia QR, Tarjeta Débito/Crédito).
  - Creación transaccional del registro en `pedidos` y cada línea en `pedido_detalle`.
  - Descuento automático de stock de las prendas compradas.
  - Vaciado de la sesión del carrito.
  - Pantalla interactiva de confirmación de pago con animación SVG de éxito y resumen de la orden.

---

## 5. Módulo de Pedidos del Cliente (`ClientePedidoController`)
* **Ubicación:** `app/Http/Controllers/ClientePedidoController.php`
* **Vistas:** `resources/views/pedidos.blade.php`
* **Funcionalidades:**
  - Listado cronológico de compras realizadas por el usuario en sesión.
  - Visualización del estado del pedido (Pendiente, En Preparación, Enviado, Entregado).
  - Consulta detallada de productos comprados, tallas y precio total liquidado.

---

## 6. Módulo de Favoritos (`FavoritoController`)
* **Ubicación:** `app/Http/Controllers/FavoritoController.php`
* **Vistas:** `resources/views/favoritos.blade.php`
* **Funcionalidades:**
  - Alternar productos (agregar/quitar de la lista de deseos).
  - Contador reactivo en el Navbar de la aplicación.
  - Transferencia directa de prendas favoritas hacia el carrito de compras.

---

## 7. Módulo de Devoluciones y Garantías (`DevolucionController`)
* **Ubicación:** `app/Http/Controllers/DevolucionController.php`
* **Vistas:** `resources/views/devoluciones.blade.php`
* **Funcionalidades:**
  - Solicitud de cambio de talla o devolución de producto.
  - Formulario con motivo, número de pedido y descripción del estado de la prenda.
  - Políticas de garantía de satisfacción de Salinas Original.

---

## 8. Módulo de Administración (`Admin/`)
* **Ubicación:** `app/Http/Controllers/Admin/`
* **Vistas:** `resources/views/admin/`
* **Estilos:** `public/css/admin.css`
* **Controladores:**
  - **`ProductoAdminController.php`**: Alta de nuevas prendas, edición de precios/stock, eliminación lógica y carga de imágenes.
  - **`PedidoAdminController.php`**: Gestión de todas las órdenes de los clientes, actualización de estados de envío y exportación.
  - **`ReporteAdminController.php`**: Métricas gerenciales, total recaudado en el mes, ticket promedio, prendas más vendidas y gráficos analíticos con Chart.js.

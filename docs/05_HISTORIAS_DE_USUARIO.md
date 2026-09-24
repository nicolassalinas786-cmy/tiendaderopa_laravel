# 📋 Historias de Usuario (HDU) Oficiales — Salinas Original

Este documento contiene la matriz completa de las **18 Historias de Usuario oficiales del proyecto**, formuladas bajo la estructura estándar ágil:
> **Como:** [Rol del usuario]  
> **Quiero:** [Funcionalidad o acción deseada]  
> **Para:** [Beneficio o resultado esperado]

---

## 1. Módulo de Clientes (H01 – H09)

### 📌 H01: Registro de Usuarios
* **Como:** Cliente.
* **Quiero:** Registrarme en la plataforma con mi nombre, apellido, correo y contraseña.
* **Para:** Personalizar mi experiencia de compra y facilitar futuros pedidos.
* **Criterios de Aceptación:**
  - Validación de correo único y formato válido.
  - Contraseña con longitud mínima de 8 caracteres y confirmación.
  - Aceptación obligatoria de términos y condiciones.

### 📌 H02: Búsqueda en el Catálogo
* **Como:** Cliente.
* **Quiero:** Buscar prendas por nombre o término clave en una barra de búsqueda.
* **Para:** Encontrar rápidamente la ropa que deseo sin tener que recorrer todo el catálogo.
* **Criterios de Aceptación:**
  - Filtrado en tiempo real o por envío de formulario.
  - Mensaje amigable cuando no se encuentren coincidencias.

### 📌 H03: Filtrado y Ordenamiento del Catálogo
* **Como:** Cliente.
* **Quiero:** Filtrar las prendas por categorías (Buzos, Camisetas, Chaquetas) y ordenarlas por precio.
* **Para:** Facilitar mi decisión de compra y evitar frustraciones al explorar prendas.
* **Criterios de Aceptación:**
  - Filtros seleccionables visualmente.
  - Persistencia de los filtros seleccionados durante la navegación.

### 📌 H04: Visualización de Ficha de Producto
* **Como:** Cliente.
* **Quiero:** Ver el detalle de una prenda con sus fotos, precio, tallas disponibles y descripción de la tela.
* **Para:** Conocer toda la información antes de tomar la decisión de compra.
* **Criterios de Aceptación:**
  - Selector de tallas (S, M, L, XL).
  - Indicador de stock disponible.

### 📌 H05: Compra Rápida / Modo Invitado
* **Como:** Cliente.
* **Quiero:** Poder procesar una compra rápidamente sin obligarme a un registro extenso.
* **Para:** Agilizar la transacción cuando tengo poco tiempo.
* **Criterios de Aceptación:**
  - Captura mínima de datos de envío y contacto.

### 📌 H06: Carrito de Compras
* **Como:** Cliente.
* **Quiero:** Agregar prendas con su talla seleccionada y ver un resumen con cantidades y precios.
* **Para:** Preparar mi pedido con exactitud antes de pagar.
* **Criterios de Aceptación:**
  - Modificación de cantidades en tiempo real.
  - Eliminación de ítems del carrito.
  - Badge numérico en el Navbar con el total de prendas.

### 📌 H07: Checkout y Pasarela de Pago
* **Como:** Cliente.
* **Quiero:** Completar el pago seleccionando opciones seguras (Nequi, Bancolombia, Tarjeta).
* **Para:** Finalizar mi compra y recibir el número de seguimiento de mi orden.
* **Criterios de Aceptación:**
  - Confirmación con animación visual y número de comprobante único.
  - Generación del pedido en la base de datos y descuento de stock.

### 📌 H08: Seguimiento de Pedidos
* **Como:** Cliente.
* **Quiero:** Consultar el estado en el que se encuentra mi pedido (Pendiente, En Preparación, Enviado, Entregado).
* **Para:** Saber cuándo llegará mi paquete a la dirección acordada.
* **Criterios de Aceptación:**
  - Historial accesible desde la sección "Mis Pedidos".
  - Desglose de cada prenda comprada con su valor unitario.

### 📌 H09: Devoluciones y Garantías
* **Como:** Cliente.
* **Quiero:** Solicitar el cambio o devolución de una prenda por talla o defecto de fábrica.
* **Para:** Sentir confianza y respaldo al realizar compras online.
* **Criterios de Aceptación:**
  - Formulario de solicitud de devolución.
  - Políticas de garantía visibles y transparentes.

---

## 2. Módulo de Administración y Dueño de Tienda (H010 – H018)

### 📌 H010: Gestión de Productos (CRUD)
* **Como:** Dueño / Administrador.
* **Quiero:** Crear, editar, consultar y desactivar prendas del catálogo.
* **Para:** Mantener la oferta de ropa siempre actualizada.
* **Criterios de Aceptación:**
  - Formulario administrativo para subir nombre, categoría, precio, stock e imagen.
  - Edición en línea de stock y precios.

### 📌 H011: Gestión de Inventario y Stock
* **Como:** Dueño / Administrador.
* **Quiero:** Monitorear las existencias de cada prenda y recibir alertas de bajo inventario.
* **Para:** Asegurar la satisfacción del cliente y evitar vender productos agotados.
* **Criterios de Aceptación:**
  - Descuento automático de inventario tras cada compra exitosa.
  - Indicador visual de stock crítico (menor a 5 unidades).

### 📌 H012: Gestión de Pedidos de Clientes
* **Como:** Dueño / Administrador.
* **Quiero:** Ver todas las órdenes de compra entrantes y cambiar su estado de despacho.
* **Para:** Cumplir con las entregas en tiempo y forma.
* **Criterios de Aceptación:**
  - Lista completa de pedidos con filtros por fecha y estado.
  - Actualización inmediata del estado: `Pendiente` ➔ `En Preparación` ➔ `Enviado` ➔ `Entregado`.

### 📌 H013: Gestión de Usuarios y Clientes
* **Como:** Dueño / Administrador.
* **Quiero:** Consultar el listado de clientes registrados y su historial de compras.
* **Para:** Ofrecer soporte personalizado y fidelizar compradores.
* **Criterios de Aceptación:**
  - Visualización de datos de contacto y fecha de registro.

### 📌 H014: Verificación de Cobros y Pagos
* **Como:** Dueño / Administrador.
* **Quiero:** Auditar los pagos registrados por método de pago (Nequi, Bancolombia, etc.).
* **Para:** Conciliar las ventas reales contra los ingresos bancarios.
* **Criterios de Aceptación:**
  - Registro del método de pago en cada orden.

### 📌 H015: Gestión de Envíos y Logística
* **Como:** Dueño / Administrador.
* **Quiero:** Imprimir o revisar las direcciones completas y teléfonos de los destinatarios.
* **Para:** Coordinar eficientemente con las empresas de mensajería.
* **Criterios de Aceptación:**
  - Detalle completo de dirección, ciudad y teléfono en la orden.

### 📌 H016: Gestión de Ofertas y Promociones
* **Como:** Dueño / Administrador.
* **Quiero:** Destacar prendas en la sección de ofertas con precios especiales.
* **Para:** Aumentar las ventas de temporadas anteriores o colecciones específicas.
* **Criterios de Aceptación:**
  - Vista exclusiva de ofertas con distintivo de descuento.

### 📌 H017: Reportes Gerenciales y Estadísticas
* **Como:** Dueño / Administrador.
* **Quiero:** Ver gráficas de ventas mensuales, ingresos totales y prendas más solicitadas.
* **Para:** Tomar decisiones comerciales informadas sobre qué ropa confeccionar o comprar.
* **Criterios de Aceptación:**
  - Dashboard analítico con gráficos interactivos desarrollados con Chart.js.
  - Tarjetas de resumen con KPIs financieros clave.

### 📌 H018: Gestión y Aprobación de Devoluciones
* **Como:** Dueño / Administrador.
* **Quiero:** Revisar las solicitudes de devolución de los clientes y aprobar el cambio de prenda.
* **Para:** Mantener una excelente reputación de marca y fidelidad con los compradores.
* **Criterios de Aceptación:**
  - Panel para atender peticiones de garantía.

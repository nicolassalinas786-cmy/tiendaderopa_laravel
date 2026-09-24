# 🏛️ Arquitectura del Sistema y Patrones de Diseño — Salinas Original

## 1. Introducción
El proyecto **Salinas Original - Tienda de Ropa Online** está desarrollado bajo el framework **Laravel 11**, aplicando una arquitectura limpia basada en el patrón arquitectónico **MVC (Modelo - Vista - Controlador)**, complementado con principios de diseño de software empresarial.

---

## 2. Patrón Arquitectónico MVC en Laravel

```
                       ┌───────────────────────────────┐
                       │     Navegador del Usuario     │
                       └───────────────┬───────────────┘
                                       │ Petición HTTP (GET, POST)
                                       ▼
                       ┌───────────────────────────────┐
                       │       Rutas (routes/web.php)  │
                       └───────────────┬───────────────┘
                                       │ Despacho con Middlewares
                                       ▼
                       ┌───────────────────────────────┐
                       │     Controladores (App/Http)  │
                       └───────┬───────────────┬───────┘
                               │               │
            Invoca Lógica /    │               │ Retorna Vista /
            Consulta Datos     ▼               ▼ Renderizado
        ┌────────────────────────────┐   ┌───────────────────────────┐
        │   Modelos (App/Models)     │   │   Vistas (Blade Templates)│
        │   Eloquent ORM             │   │   resources/views/        │
        └──────────────┬─────────────┘   └───────────────────────────┘
                       │ SQL Query
                       ▼
        ┌────────────────────────────┐
        │   Base de Datos (MySQL)    │
        │   Base: salinas_db         │
        └────────────────────────────┘
```

### 2.1. Modelo (Model) — `app/Models/`
Representa las entidades del negocio y la lógica de acceso a datos utilizando **Eloquent ORM**.
* **`Usuario.php`**: Representa la entidad de usuarios (`usuarios`), gestiona autenticación, roles (Admin/Cliente) y atributos personalizados (`nombreCompleto`, `initial`).
* **`Producto.php`**: Modela las prendas del catálogo (nombre, categoría, precio, stock, imagen, descripción).
* **`Pedido.php`**: Encapsula las órdenes de compra realizadas por los clientes, montos totales, fechas y estados.
* **`PedidoDetalle.php`**: Detalle de cada prenda comprada en un pedido (cantidad, precio unitario, subtotal, talla).
* **`Favorito.php`**: Gestiona la relación muchos a muchos entre usuarios y productos marcados como favoritos.
* **`Role.php`**: Define los roles de acceso en la plataforma (1 = Cliente, 2 = Administrador).

### 2.2. Vista (View) — `resources/views/`
La interfaz de usuario está desarrollada con el motor de plantillas **Blade** de Laravel, dividida modularmente:
* **Layouts (`resources/views/layouts/app.blade.php`)**: Estructura principal reutilizable con Navbar, Drawer lateral del carrito, notificaciones y Footer.
* **Vistas Públicas**: Catálogo, detalle de prendas, ofertas, carrito, pedidos del cliente, favoritos y devoluciones.
* **Vistas de Autenticación (`resources/views/auth/`)**: Formularios de login y registro.
* **Vistas Administrativas (`resources/views/admin/`)**: Dashboard con KPIs, gestión de productos, pedidos y reportes con Chart.js.

### 2.3. Controlador (Controller) — `app/Http/Controllers/`
Contiene la lógica de aplicación que procesa las solicitudes, valida datos y devuelve respuestas:
* **`Auth\AuthController.php`**: Registro, inicio de sesión, validación de contraseñas con Hash Bcrypt y cierre de sesión.
* **`CatalogoController.php`**: Listado de productos, filtros por categoría y búsqueda en tiempo real.
* **`CarritoController.php`**: Manejo del estado del carrito en sesión (agregar, eliminar, actualizar cantidades).
* **`PagoController.php`**: Procesamiento del checkout, creación transaccional del pedido y vaciado del carrito.
* **`ClientePedidoController.php`**: Visualización del historial de compras del usuario autenticado.
* **`FavoritoController.php`**: Alternar productos en la lista de deseos del usuario.
* **`DevolucionController.php`**: Gestión de solicitudes de garantía y devolución de prendas.
* **Controladores Administrativos (`Admin/`)**:
  - `ProductoAdminController.php`: CRUD completo de prendas del inventario.
  - `PedidoAdminController.php`: Gestión de pedidos y cambio de estados logísticos.
  - `ReporteAdminController.php`: Agregación de métricas de ventas y generación de reportes.

---

## 3. Patrones de Diseño Aplicados

### 3.1. Active Record (Eloquent ORM)
Cada modelo en Laravel representa una tabla en MySQL. Las instancias del modelo corresponden a registros individuales, permitiendo operaciones CRUD fluidas sin escribir SQL manual:
```php
$producto = Producto::findOrFail($id);
$producto->stock -= $cantidad;
$producto->save();
```

### 3.2. Front Controller
Todas las peticiones web ingresan a través del archivo único `public/index.php`, el cual inicializa el kernel de la aplicación y canaliza la solicitud a través del enrutador central `routes/web.php`.

### 3.3. Dependency Injection (Inyección de Dependencias)
Los controladores resuelven automáticamente las dependencias inyectadas por el Service Container de Laravel (como la clase `Illuminate\Http\Request`).

### 3.4. Template Inheritance (Herencia de Plantillas)
Las vistas extienden una plantilla maestra común mediante directivas Blade:
```blade
@extends('layouts.app')
@section('title', 'Catálogo de Ropa')
@section('content')
    ...
@endsection
```

### 3.5. Separation of Concerns (Separación de Estilos CSS)
Los estilos visuales se desacoplaron de las plantillas Blade y se organizaron en archivos CSS dedicados dentro de `public/css/`:
* `app.css`: Estilos globales de la tienda y animaciones.
* `auth.css`: Estilos visuales para login y registro.
* `admin.css`: Estilos del panel de control de administración.

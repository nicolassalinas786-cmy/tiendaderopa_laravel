# 🔒 Rutas del Sistema y Mecanismos de Seguridad — Salinas Original

## 1. Tabla Maestra de Rutas (`routes/web.php`)

### 1.1. Rutas Públicas de la Tienda
| Método | URI | Controlador / Acción | Nombre de Ruta | Propósito |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/` | Retorna vista `home` con productos | `home` | Página principal de la tienda |
| `GET` | `/catalogo` | `CatalogoController@index` | `catalogo` | Catálogo general con filtros |
| `GET` | `/ofertas` | `OfertaController@index` | `ofertas` | Prendas con descuento activo |
| `GET` | `/devoluciones` | `DevolucionController@index` | `devoluciones` | Información y formulario de cambios |

### 1.2. Rutas de Autenticación
| Método | URI | Controlador / Acción | Nombre de Ruta | Propósito |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/login` | `AuthController@showLogin` | `login` | Formulario de inicio de sesión |
| `POST` | `/login` | `AuthController@login` | `login.post` | Procesar autenticación |
| `GET` | `/registro` | `AuthController@showRegister` | `register` | Formulario de registro público |
| `POST` | `/registro` | `AuthController@register` | `register.post`| Crear nuevo usuario |
| `POST` | `/logout` | `AuthController@logout` | `logout` | Cerrar sesión activa |

### 1.3. Rutas de Carrito y Checkout
| Método | URI | Controlador / Acción | Nombre de Ruta | Propósito |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/carrito` | `CarritoController@index` | `carrito.index` | Visualizar carrito completo |
| `POST` | `/carrito/agregar` | `CarritoController@agregar` | `carrito.agregar`| Añadir prenda con talla |
| `POST` | `/carrito/actualizar` | `CarritoController@actualizar` | `carrito.actualizar` | Cambiar cantidad de prendas |
| `POST` | `/carrito/eliminar` | `CarritoController@eliminar` | `carrito.eliminar` | Quitar prenda del carrito |
| `GET` | `/pago` | `PagoController@show` | `pago.show` | Pasarela de checkout |
| `POST` | `/pago/procesar` | `PagoController@procesar` | `pago.procesar` | Crear orden y liquidar pedido |
| `GET` | `/pago/confirmacion/{id}` | `PagoController@confirmacion` | `pago.confirmacion` | Pantalla de éxito de compra |

### 1.4. Rutas del Cliente Autenticado
| Método | URI | Controlador / Acción | Nombre de Ruta | Propósito |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/pedidos` | `ClientePedidoController@index` | `pedidos.cliente` | Historial personal de compras |
| `GET` | `/favoritos` | `FavoritoController@index` | `favoritos.index`| Lista de deseos |
| `POST` | `/favoritos/toggle` | `FavoritoController@toggle` | `favoritos.toggle`| Añadir o quitar de favoritos |

### 1.5. Rutas del Panel de Administración (`/admin`)
| Método | URI | Controlador / Acción | Nombre de Ruta | Middleware / Regla |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/admin` | Retorna vista `admin.dashboard` | `admin.dashboard` | `Auth::user()->esAdmin()` |
| `GET` | `/admin/productos` | `ProductoAdminController@index` | `admin.productos` | Solo Administrador |
| `POST` | `/admin/productos` | `ProductoAdminController@store` | `admin.productos.store` | Solo Administrador |
| `PUT` | `/admin/productos/{id}` | `ProductoAdminController@update` | `admin.productos.update` | Solo Administrador |
| `DELETE` | `/admin/productos/{id}`| `ProductoAdminController@destroy`| `admin.productos.destroy`| Solo Administrador |
| `GET` | `/admin/pedidos` | `PedidoAdminController@index` | `admin.pedidos` | Solo Administrador |
| `POST` | `/admin/pedidos/{id}/estado` | `PedidoAdminController@updateEstado` | `admin.pedidos.estado` | Solo Administrador |
| `GET` | `/admin/reportes` | `ReporteAdminController@index` | `admin.reportes` | Solo Administrador |

---

## 2. Mecanismos de Seguridad Implementados

### 2.1. Protección contra ataques CSRF (Cross-Site Request Forgery)
Todos los formularios HTML de la aplicación incluyen el token de verificación de Laravel `@csrf`:
```blade
<form action="/login" method="POST">
    @csrf
    ...
</form>
```

### 2.2. Encriptación de Contraseñas con Bcrypt
Las contraseñas de los usuarios nunca se guardan en texto plano en la base de datos. Se utiliza el algoritmo `Bcrypt` a través del helper `Hash::make()` y se verifica con `Hash::check()`:
```php
'password' => Hash::make($request->password)
```

### 2.3. Control de Acceso Basado en Roles (RBAC)
El modelo `Usuario` implementa el método `esAdmin()`:
```php
public function esAdmin(): bool 
{ 
    return (int)$this->id_rol === 2; 
}
```
Si un usuario con rol de cliente intenta ingresar a cualquier ruta del prefijo `/admin`, el sistema lo intercepta y lo redirige automáticamente a su zona permitida.

### 2.4. Protección contra Inyección SQL
Todas las consultas a la base de datos se ejecutan a través de **Eloquent ORM** o del **Query Builder con PDO Parameter Binding**, impidiendo cualquier intento de inyección de código SQL malicioso.

### 2.5. Validación Robusta de Datos de Entrada (Request Validation)
Los datos provenientes de peticiones HTTP son sanitizados y validados antes de procesarse:
```php
$request->validate([
    'email'    => 'required|email',
    'password' => 'required|string|min:8',
]);
```

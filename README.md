# 👕 Salinas Original — Tienda de Ropa Online (Laravel 11)

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/TailwindCSS-v3-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/Jira-Agile-0052CC?style=for-the-badge&logo=jira&logoColor=white" alt="Jira">
</p>

---

## 📌 Descripción del Proyecto
**Salinas Original** es una plataforma de comercio electrónico moderna, rápida y segura diseñada para la venta y distribución de prendas de vestir exclusivas. El sistema implementa una arquitectura robusta basada en **Laravel 11**, con control de acceso por roles, pasarela de compras, control de inventario en tiempo real y un panel de administración con métricas gerenciales.

El proyecto cumple con los lineamientos de formación técnica del **SENA - Centro de Teleinformática y Producción Industrial (Regional Cauca)**, pasando de una versión en PHP puro MVC a una solución profesional implementada con el framework Laravel.

---

## 📚 Documentación Técnica Detallada (`Documentacion/`)

Cada componente, controlador, modelo y funcionalidad cuenta con su propio archivo de documentación individual en la carpeta **[`Documentacion/`](./Documentacion/README.md)**:

* 🏛️ **[Modelos Eloquent](./Documentacion/README.md#-1-modelos-eloquent-documentacionmodels)** (`Usuario`, `Producto`, `Pedido`, `PedidoDetalle`, `Favorito`, `Role`).
* ⚙️ **[Controladores](./Documentacion/README.md#️-2-controladores-documentacioncontrollers)** (`AuthController`, `CatalogoController`, `CarritoController`, `PagoController`, `Admin/`...).
* 🛍️ **[Funcionalidades](./Documentacion/README.md#-3-funcionalidades-del-sistema-documentacionfuncionalidades)** (Login, Registro, Catálogo, Carrito, Checkout, Pedidos, Favoritos, Devoluciones, Panel Admin, Reportes).
* 🔧 **[Sistema y Configuración](./Documentacion/README.md#-4-sistema-rutas-y-estilos-documentacionsistema)** (`rutas_web.md`, `migraciones_y_seeders.md`, `estilos_css.md`).

---

## 🔑 Credenciales de Acceso

| Rol | Correo Electrónico | Contraseña | URL de Acceso |
| :--- | :--- | :--- | :--- |
| **Cliente** | `nicolas@salinasoriginal.com` | `nicolas123` | [`/login`](http://127.0.0.1:8000/login) |
| **Administrador** | `admin@salinasoriginal.com` | `admin123` | [`/admin`](http://127.0.0.1:8000/admin) |

---

## 👤 Autor
* **Nicolás Andrés Cortés Salinas**
* Proyecto formativo de desarrollo de software — Regional Cauca.

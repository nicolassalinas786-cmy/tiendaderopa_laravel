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

## 📚 Documentación Técnica Detallada (Índice de Documentos)

Toda la documentación técnica se encuentra modularizada en formato Markdown (`.md`) dentro del directorio [`docs/`](./docs/):

1. 🏛️ **[Arquitectura y Patrones de Diseño](./docs/01_ARQUITECTURA_Y_PATRONES.md)**: Explicación del patrón MVC, Eloquent ORM, Active Record, directivas Blade y modularización CSS.
2. 🗄️ **[Base de Datos, Migraciones y Modelos](./docs/02_BASE_DE_DATOS_Y_MODELOS.md)**: Diagrama ER en Mermaid, diccionario de datos detallado y relaciones entre tablas.
3. ⚙️ **[Módulos Funcionales y Controladores](./docs/03_MODULOS_Y_CONTROLADORES.md)**: Detalle de controladores de Autenticación, Catálogo, Carrito, Pagos, Pedidos, Devoluciones y Administración.
4. 🔒 **[Rutas del Sistema y Mecanismos de Seguridad](./docs/04_RUTAS_Y_SEGURIDAD.md)**: Matriz completa de rutas HTTP (`routes/web.php`), protección CSRF, Bcrypt y control de acceso RBAC.
5. 📋 **[Historias de Usuario (HDU) Oficiales](./docs/05_HISTORIAS_DE_USUARIO.md)**: Las 18 Historias de Usuario oficiales organizadas por Cliente y Administrador con criterios de aceptación.
6. 🚀 **[Guía de Instalación y Despliegue Local](./docs/06_GUIA_DE_INSTALACION.md)**: Manual paso a paso para clonar, migrar, sembrar la base de datos y correr el proyecto con Laragon.

---

## 🌟 Características Principales

* 🔐 **Autenticación con Roles:** Inicio de sesión y registro de clientes con encriptación Bcrypt y separación de privilegios (Cliente y Administrador).
* 🛍️ **Catálogo Dinámico:** Filtrado reactivo por categorías de ropa, búsqueda en tiempo real e indicador de disponibilidad por tallas.
* 🛒 **Carrito de Compras:** Gestión persistente en sesión con Drawer lateral deslizante para agregar prendas, calcular subtotales y actualizar cantidades.
* 💳 **Checkout y Simulación de Pago:** Proceso de pago con generación de comprobantes únicos y descuento automático de stock.
* 📦 **Seguimiento de Pedidos:** Historial de compras para los clientes con seguimiento del estado del paquete (Pendiente, En Preparación, Enviado, Entregado).
* 🔄 **Módulo de Devoluciones:** Solicitud de cambios de prenda y gestión de garantías de satisfacción.
* 📊 **Panel Administrativo Integral (`/admin`):**
  - Gestión de inventario (CRUD de productos con imágenes).
  - Control de pedidos y cambio de estado logístico.
  - Gráficos estadísticos de ventas en tiempo real con Chart.js.

---

## 🔑 Credenciales de Acceso Rápido

| Rol | Correo Electrónico | Contraseña | URL de Acceso |
| :--- | :--- | :--- | :--- |
| **Cliente** | `nicolas@salinasoriginal.com` | `nicolas123` | [`/login`](http://127.0.0.1:8000/login) |
| **Administrador** | `admin@salinasoriginal.com` | `admin123` | [`/admin`](http://127.0.0.1:8000/admin) |

---

## 🛠️ Tecnologías Empleadas

* **Backend:** PHP 8.2+, Laravel 11.
* **Base de Datos:** MySQL 8 / MariaDB.
* **Frontend:** Laravel Blade, TailwindCSS, Vanilla CSS modularizado en `public/css/`.
* **Gráficas:** Chart.js.
* **Gestión del Proyecto:** Jira Software (Metodología Scrum), Git & GitHub.

---

## 👤 Autor
* **Nicolás Andrés Cortés Salinas**
* Proyecto formativo de desarrollo de software — Regional Cauca.

# 🚀 Guía de Instalación y Despliegue Local — Salinas Original

Este documento detalla los pasos para clonar, configurar y ejecutar el proyecto **Salinas Original** en un entorno local de desarrollo con Laragon y Laravel.

---

## 1. Requisitos Previos
* **PHP:** Versión 8.2 o superior (con extensiones `pdo_mysql`, `mbstring`, `openssl`, `bcmath`, `curl`).
* **Composer:** Gestor de dependencias de PHP.
* **MySQL / MariaDB:** Servidor de base de datos (incluido en Laragon).
* **Node.js y npm:** Opcionales para compilación de assets Vite.
* **Git:** Control de versiones.

---

## 2. Paso a Paso de Instalación

### Paso 1: Clonar el Repositorio
```bash
git clone https://github.com/nicolassalinas786-cmy/tiendaderopa_laravel.git
cd tiendaderopa_laravel
```

### Paso 2: Instalar Dependencias de Composer
```bash
composer install
```

### Paso 3: Configurar el Archivo de Entorno (`.env`)
Copiar el archivo de ejemplo para generar el `.env` local:
```bash
cp .env.example .env
```

Verificar la conexión a la base de datos en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=salinas_db
DB_USERNAME=root
DB_PASSWORD=
```

### Paso 4: Generar la Llave de Aplicación (Application Key)
```bash
php artisan key:generate
```

### Paso 5: Ejecutar Migraciones y Poblado de Datos (Seeders)
Crear la base de datos `salinas_db` en phpMyAdmin o MySQL CLI, y ejecutar:
```bash
php artisan migrate --seed
```
*(Esto creará las tablas `roles`, `usuarios`, `productos`, `pedidos`, `pedido_detalle` y `favoritos`, insertando los datos iniciales de prueba).*

### Paso 6: Levantar el Servidor de Desarrollo
```bash
php artisan serve
```
La aplicación estará disponible de inmediato en:  
👉 **`http://127.0.0.1:8000`**

---

## 3. Credenciales de Acceso para Pruebas

### 👤 Cuenta de Cliente:
* **URL:** `http://127.0.0.1:8000/login`
* **Correo:** `nicolas@salinasoriginal.com`
* **Contraseña:** `nicolas123`
* **Rol:** Cliente (1)

---

### 🛡️ Cuenta de Administrador (Panel de Control):
* **URL:** `http://127.0.0.1:8000/admin`
* **Correo:** `admin@salinasoriginal.com`
* **Contraseña:** `admin123`
* **Rol:** Administrador (2)

---

## 4. Estructura de Estilos CSS
Los estilos se encuentran divididos en la carpeta pública:
* `public/css/app.css` (Tienda, layout general y animaciones)
* `public/css/auth.css` (Vistas de autenticación)
* `public/css/admin.css` (Vistas del panel administrativo)

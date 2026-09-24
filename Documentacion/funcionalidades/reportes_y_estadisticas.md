# 📊 Funcionalidad: Reportes Gerenciales y Estadísticas

- **Ruta web:** `/admin/reportes`
- **Controlador:** [`ReporteAdminController@index`](file:///c:/laragon/www/tienda-ropa/app/Http/Controllers/Admin/ReporteAdminController.php)
- **Vista Blade:** [`resources/views/admin/reportes.blade.php`](file:///c:/laragon/www/tienda-ropa/resources/views/admin/reportes.blade.php)
- **Estilos:** [`public/css/admin.css`](file:///c:/laragon/www/tienda-ropa/public/css/admin.css)
- **Descripción:**
  Generación de métricas de rendimiento comercial para la toma de decisiones:
  1. Gráfica interactiva de ventas mensuales implementada con **Chart.js**.
  2. Tarjetas de resumen financiero: ingresos brutos totales, ticket promedio de compra y porcentaje de pedidos completados.
  3. Ranking de prendas más vendidas del inventario con total de unidades despachadas e ingresos generados.
  4. Indicadores de inventario crítico con prendas con menos de 5 unidades en stock.

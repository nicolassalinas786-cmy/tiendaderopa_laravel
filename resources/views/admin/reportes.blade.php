<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportes de Ventas — Admin Salinas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-[#f5f4f1] relative">

<div class="flex h-screen overflow-hidden">

    {{-- ═══ SIDEBAR ═══ --}}
    <aside class="w-52 flex flex-col shrink-0 h-full" style="background:#2c1a0e;">

        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center font-bold text-[#2c1a0e] text-base" style="background:#e8ddd0">S</div>
                <div>
                    <p class="text-white font-bold text-sm tracking-wide">SALINAS</p>
                    <p class="text-white/40 text-[10px] tracking-widest uppercase">Panel Admin</p>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="text-white/30 text-[10px] font-semibold tracking-widest uppercase px-3 mb-2">Principal</p>

            <a href="/admin" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                Dashboard
            </a>
            <a href="/admin/productos" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                Productos
            </a>
            <a href="/admin/pedidos" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                Pedidos
            </a>
            <a href="/admin/usuarios" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                Usuarios
            </a>
            <a href="/admin/reportes" class="nav-item active">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                Reportes
            </a>

            <p class="text-white/30 text-[10px] font-semibold tracking-widest uppercase px-3 mt-4 mb-2">Sistema</p>

            <a href="/" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                Ver tienda
            </a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="nav-item w-full text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/></svg>
                    Cerrar sesión
                </button>
            </form>
        </nav>
    </aside>

    {{-- ═══ CONTENIDO ═══ --}}
    <main class="flex-1 overflow-y-auto">

        {{-- Top bar --}}
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
            <div>
                <h1 class="text-xl font-bold text-[#1b1b18]">Reportes de ventas</h1>
                <p class="text-xs text-[#706f6c]">Análisis y estadísticas</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-[#706f6c]">
                    {{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                </span>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background:#2c1a0e">
                        {{ Auth::check() ? strtoupper(substr(Auth::user()->nombre, 0, 1)) : 'A' }}
                    </div>
                    <span class="text-sm font-semibold text-[#1b1b18]">
                        {{ Auth::check() ? Auth::user()->nombre : 'Administrador' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="px-8 py-6 space-y-6">

            {{-- Toolbar: Períodos y Exportar CSV --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-sm font-bold text-[#1b1b18]">Período:</span>
                    <div class="flex items-center gap-2">
                        <button class="px-4 py-2 text-xs font-semibold text-white rounded-2xl shadow-sm transition-all" style="background:#5c4028">
                            Esta semana
                        </button>
                        <button class="px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-2xl hover:bg-gray-50 transition-all">
                            Este mes
                        </button>
                        <button class="px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-2xl hover:bg-gray-50 transition-all">
                            Trimestre
                        </button>
                        <button class="px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-2xl hover:bg-gray-50 transition-all">
                            Este año
                        </button>
                    </div>
                </div>

                {{-- Export CSV button --}}
                <button onclick="alert('Exportando reporte en formato CSV...')" class="flex items-center gap-2 px-4 py-2 bg-[#16a34a] hover:bg-[#15803d] text-white text-xs font-bold rounded-xl shadow-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Exportar CSV
                </button>
            </div>

            {{-- 4 Grid KPI Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- INGRESOS TOTALES --}}
                <div class="bg-white rounded-2xl p-5 border-l-4 border-emerald-500 shadow-sm border border-gray-100">
                    <p class="text-[11px] font-semibold tracking-wider text-gray-400 uppercase">INGRESOS TOTALES</p>
                    <p class="text-3xl font-bold text-[#1b1b18] my-1">$3.440</p>
                    <p class="text-xs font-semibold text-emerald-600 flex items-center gap-1">
                        <span>↑</span> +12% vs período anterior
                    </p>
                </div>

                {{-- PEDIDOS --}}
                <div class="bg-white rounded-2xl p-5 border-l-4 border-blue-500 shadow-sm border border-gray-100">
                    <p class="text-[11px] font-semibold tracking-wider text-gray-400 uppercase">PEDIDOS</p>
                    <p class="text-3xl font-bold text-[#1b1b18] my-1">8</p>
                    <p class="text-xs font-semibold text-blue-600">3 entregados</p>
                </div>

                {{-- TICKET PROMEDIO --}}
                <div class="bg-white rounded-2xl p-5 border-l-4 border-purple-500 shadow-sm border border-gray-100">
                    <p class="text-[11px] font-semibold tracking-wider text-gray-400 uppercase">TICKET PROMEDIO</p>
                    <p class="text-3xl font-bold text-[#1b1b18] my-1">$430.00</p>
                    <p class="text-xs font-semibold text-purple-600">Por pedido</p>
                </div>

                {{-- TASA ENTREGA --}}
                <div class="bg-white rounded-2xl p-5 border-l-4 border-amber-500 shadow-sm border border-gray-100">
                    <p class="text-[11px] font-semibold tracking-wider text-gray-400 uppercase">TASA ENTREGA</p>
                    <p class="text-3xl font-bold text-[#1b1b18] my-1">38%</p>
                    <p class="text-xs font-semibold text-amber-600">Pedidos entregados</p>
                </div>

            </div>

            {{-- Main Charts Grid (2 columns) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Left: Ventas por período --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h2 class="text-base font-bold text-[#1b1b18]">Ventas por período</h2>
                        <p class="text-xs text-[#706f6c] mb-8">Ingresos diarios (esta semana)</p>
                    </div>

                    {{-- Bar graphic container --}}
                    <div class="pt-6 pb-2">
                        <div class="grid grid-cols-7 gap-2 items-end h-44 border-b border-gray-200 pb-2">
                            @foreach($ventasDiarias as $v)
                                @php
                                    $max = 900;
                                    $heightPercent = max(15, round(($v['monto'] / $max) * 100));
                                @endphp
                                <div class="flex flex-col items-center gap-2 group h-full justify-end">
                                    <span class="text-[10px] font-bold text-[#8c8983] group-hover:text-[#1b1b18] transition-colors">
                                        {{ $v['formateado'] }}
                                    </span>
                                    <div class="w-full max-w-[36px] rounded-t-lg transition-all group-hover:opacity-90"
                                         style="height: {{ $heightPercent }}%; background: #5c4028;">
                                    </div>
                                    <span class="text-xs font-semibold text-[#5c5a55] mt-1">
                                        {{ $v['dia'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Right: Ventas por categoría --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h2 class="text-base font-bold text-[#1b1b18]">Ventas por categoría</h2>
                    <p class="text-xs text-[#706f6c] mb-6">Distribución de ingresos</p>

                    <div class="space-y-4">
                        @foreach($categorias as $cat)
                            <div>
                                <div class="flex justify-between items-center text-xs font-bold mb-1 text-[#1b1b18]">
                                    <span>{{ $cat['nombre'] }}</span>
                                    <span class="text-[#706f6c] font-normal">{{ $cat['porcentaje'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-100 h-2.5 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full transition-all duration-500"
                                         style="width: {{ $cat['porcentaje'] }}%; background: {{ $cat['color'] }};">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </main>
</div>

{{-- Floating WhatsApp button --}}
<a href="https://wa.me/" target="_blank" class="fixed bottom-6 right-6 w-14 h-14 bg-[#25d366] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform z-50" title="Contactar por WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 24 24">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
    </svg>
</a>

</body>
</html>

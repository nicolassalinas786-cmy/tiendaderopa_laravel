<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin — Salinas Original</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-[#f5f4f1]">

<div class="flex h-screen overflow-hidden">

    {{-- ═══ SIDEBAR ═══ --}}
    <aside class="w-52 flex flex-col shrink-0 h-full" style="background:#2c1a0e;">

        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center font-bold text-[#2c1a0e] text-base" style="background:#e8ddd0">S</div>
                <div>
                    <p class="text-white font-bold text-sm tracking-wide">SALINAS</p>
                    <p class="text-white/40 text-[10px] tracking-widest">Panel Admin</p>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="text-white/30 text-[10px] font-semibold tracking-widest uppercase px-3 mb-2">Principal</p>

            <a href="/admin" class="nav-item active">
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
            <a href="/admin/reportes" class="nav-item">
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
                <h1 class="text-xl font-bold text-[#1b1b18]">Dashboard</h1>
                <p class="text-xs text-[#706f6c]">Resumen general de la tienda</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-[#706f6c]">
                    {{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                </span>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background:#2c1a0e">
                        {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
                    </div>
                    <span class="text-sm font-semibold text-[#1b1b18]">{{ Auth::user()->nombre }}</span>
                </div>
            </div>
        </div>

        <div class="px-8 py-6 space-y-6">

            {{-- Alerta stock bajo --}}
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl px-5 py-4 flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-yellow-800">Stock bajo (4 productos)</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach(['Chaqueta Cuero Negro — 5 ud', 'Chaqueta Puffer Negra — 4 ud', 'Chaqueta Bomber Oferta — 5 ud', 'Reloj Plateado — 4 ud'] as $item)
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Stats cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Ventas hoy --}}
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-[10px] font-semibold tracking-widest uppercase text-[#706f6c]">Ventas hoy</p>
                        <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                            <span class="text-green-600 font-bold text-sm">$</span>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-[#1b1b18]">$1,240</p>
                    <p class="text-xs text-green-500 mt-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
                        +12% vs ayer
                    </p>
                </div>

                {{-- Pedidos --}}
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-[10px] font-semibold tracking-widest uppercase text-[#706f6c]">Pedidos</p>
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-[#1b1b18]">8</p>
                    <p class="text-xs text-blue-500 mt-1">+3 nuevos</p>
                </div>

                {{-- Usuarios --}}
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-[10px] font-semibold tracking-widest uppercase text-[#706f6c]">Usuarios</p>
                        <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-[#1b1b18]">4</p>
                    <p class="text-xs text-purple-500 mt-1">+2 esta semana</p>
                </div>

                {{-- Productos --}}
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-[10px] font-semibold tracking-widest uppercase text-[#706f6c]">Productos</p>
                        <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-[#1b1b18]">42</p>
                    <p class="text-xs text-orange-500 mt-1">En catálogo</p>
                </div>
            </div>

            {{-- Gráfica + Más vendidos --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Gráfica ventas semana --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h3 class="font-bold text-[#1b1b18] mb-1">Ventas esta semana</h3>
                    <p class="text-xs text-[#706f6c] mb-4">Ingresos diarios</p>
                    <canvas id="ventasChart" height="160"></canvas>
                </div>

                {{-- Más vendidos --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <h3 class="font-bold text-[#1b1b18] mb-1">Más vendidos</h3>
                    <p class="text-xs text-[#706f6c] mb-4">Esta semana</p>
                    <div class="space-y-4">
                        @php
                            $masVendidos = [
                                ['pos'=>1, 'nombre'=>'Buzo Oversized Negro', 'ud'=>34, 'pct'=>100],
                                ['pos'=>2, 'nombre'=>'Blazer Azul Marino',   'ud'=>26, 'pct'=>76],
                                ['pos'=>3, 'nombre'=>'Jean Slim Azul',       'ud'=>20, 'pct'=>59],
                            ];
                        @endphp
                        @foreach($masVendidos as $p)
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-[#706f6c] w-4">{{ $p['pos'] }}</span>
                                    <span class="text-sm font-medium text-[#1b1b18]">{{ $p['nombre'] }}</span>
                                </div>
                                <span class="text-sm font-semibold text-[#1b1b18]">{{ $p['ud'] }} ud</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full rounded-full" style="width:{{ $p['pct'] }}%; background:#2c1a0e"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Pedidos recientes --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-[#1b1b18]">Pedidos recientes</h3>
                    <a href="/admin/pedidos" class="text-xs text-[#2c1a0e] font-semibold hover:underline">Ver todos</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-[10px] text-[#706f6c] uppercase tracking-widest border-b border-gray-100">
                                <th class="text-left pb-3 font-semibold">#Pedido</th>
                                <th class="text-left pb-3 font-semibold">Cliente</th>
                                <th class="text-left pb-3 font-semibold">Producto</th>
                                <th class="text-left pb-3 font-semibold">Total</th>
                                <th class="text-left pb-3 font-semibold">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @php
                                $pedidos = [
                                    ['id'=>'#1042','cliente'=>'Carlos García','producto'=>'Buzo Oversized Negro','total'=>'$89.900','estado'=>'En camino','color'=>'bg-blue-100 text-blue-700'],
                                    ['id'=>'#1041','cliente'=>'Ana Martínez','producto'=>'Chaqueta Denim Azul','total'=>'$185.000','estado'=>'Entregado','color'=>'bg-green-100 text-green-700'],
                                    ['id'=>'#1040','cliente'=>'Maicol Becerra','producto'=>'Jean Slim Negro','total'=>'$135.000','estado'=>'Pendiente','color'=>'bg-yellow-100 text-yellow-700'],
                                ];
                            @endphp
                            @foreach($pedidos as $p)
                            <tr>
                                <td class="py-3 font-semibold text-[#2c1a0e]">{{ $p['id'] }}</td>
                                <td class="py-3 text-[#1b1b18]">{{ $p['cliente'] }}</td>
                                <td class="py-3 text-[#706f6c]">{{ $p['producto'] }}</td>
                                <td class="py-3 font-semibold text-[#1b1b18]">{{ $p['total'] }}</td>
                                <td class="py-3">
                                    <span class="px-2 py-1 text-[10px] font-bold rounded-full {{ $p['color'] }}">{{ $p['estado'] }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

<script>
const ctx = document.getElementById('ventasChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
        datasets: [{
            label: 'Ventas',
            data: [320, 480, 290, 610, 740, 880, 420],
            borderColor: '#2c1a0e',
            backgroundColor: 'rgba(44,26,14,0.07)',
            borderWidth: 2.5,
            pointBackgroundColor: '#2c1a0e',
            pointRadius: 4,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { color:'#f0ede8' }, ticks: { font:{size:11}, color:'#9ca3af' } },
            x: { grid: { display: false }, ticks: { font:{size:11}, color:'#9ca3af' } }
        }
    }
});
</script>

</body>
</html>

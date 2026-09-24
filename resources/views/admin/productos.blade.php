<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos — Admin Salinas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-[#f5f4f1]">
<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-52 flex flex-col shrink-0 h-full" style="background:#2c1a0e;">
        <div class="px-5 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center font-bold text-[#2c1a0e] text-base" style="background:#e8ddd0">S</div>
                <div>
                    <p class="text-white font-bold text-sm tracking-wide">SALINAS</p>
                    <p class="text-white/40 text-[10px] tracking-widest">Panel Admin</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="text-white/30 text-[10px] font-semibold tracking-widest uppercase px-3 mb-2">Principal</p>
            <a href="/admin" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                Dashboard
            </a>
            <a href="/admin/productos" class="nav-item active">
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

    {{-- CONTENIDO --}}
    <main class="flex-1 overflow-y-auto">

        {{-- Top bar --}}
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
            <div>
                <h1 class="text-xl font-bold text-[#1b1b18]">Productos</h1>
                <p class="text-xs text-[#706f6c]">Gestionar catálogo</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-[#706f6c]">{{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</span>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background:#2c1a0e">
                        {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
                    </div>
                    <span class="text-sm font-semibold text-[#1b1b18]">{{ Auth::user()->nombre }}</span>
                </div>
            </div>
        </div>

        <div class="px-8 py-6">

            {{-- Botón nuevo producto --}}
            <div class="flex justify-end mb-5">
                <button onclick="document.getElementById('modal-nuevo').classList.remove('hidden')"
                    class="flex items-center gap-2 px-5 py-2.5 text-white text-sm font-semibold rounded-xl hover:opacity-90 transition-all"
                    style="background:#2c1a0e">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    Nuevo producto
                </button>
            </div>

            {{-- Tabla --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">

                {{-- Buscador --}}
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-4">
                    <div class="relative flex-1 max-w-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input id="buscar" type="text" placeholder="Buscar..."
                            class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:border-[#2c1a0e]"
                            oninput="filtrarTabla(this.value)"/>
                    </div>
                    <span id="total-label" class="text-sm text-[#706f6c]">{{ count($productos) }} productos</span>
                </div>

                {{-- Cabecera --}}
                <div class="grid grid-cols-12 px-6 py-3 bg-[#f9f8f6] text-[10px] font-semibold uppercase tracking-widest text-[#706f6c] border-b border-gray-100">
                    <div class="col-span-5">Producto</div>
                    <div class="col-span-2">Categoría</div>
                    <div class="col-span-2">Precio</div>
                    <div class="col-span-1">Stock</div>
                    <div class="col-span-2 text-right">Acciones</div>
                </div>

                {{-- Filas --}}
                <div id="tabla-body">
                @foreach($productos as $p)
                <div class="fila-producto grid grid-cols-12 px-6 py-3 items-center border-b border-gray-50 hover:bg-[#faf9f7] transition-colors"
                     data-nombre="{{ strtolower($p['nombre']) }}" data-cat="{{ strtolower($p['categoria']) }}">

                    {{-- Foto + nombre --}}
                    <div class="col-span-5 flex items-center gap-3">
                        <img src="{{ $p['img'] }}" alt="{{ $p['nombre'] }}"
                             class="w-10 h-10 rounded-xl object-cover bg-gray-100"
                             onerror="this.src='https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=80&q=70'"/>
                        <span class="text-sm font-semibold text-[#1b1b18]">{{ $p['nombre'] }}</span>
                    </div>

                    {{-- Categoría --}}
                    <div class="col-span-2">
                        <span class="text-xs text-[#2c1a0e] font-medium">{{ $p['categoria'] }}</span>
                    </div>

                    {{-- Precio --}}
                    <div class="col-span-2">
                        <span class="text-sm font-semibold text-[#1b1b18]">${{ number_format($p['precio'], 0, ',', '.') }}</span>
                    </div>

                    {{-- Stock --}}
                    <div class="col-span-1">
                        <span class="text-sm font-bold
                            {{ $p['stock'] <= 5 ? 'text-red-500' : ($p['stock'] <= 10 ? 'text-orange-500' : 'text-green-500') }}">
                            {{ $p['stock'] }} ud
                        </span>
                    </div>

                    {{-- Acciones --}}
                    <div class="col-span-2 flex items-center justify-end gap-2">
                        <button class="flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                            Editar
                        </button>
                        <button class="flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                            Eliminar
                        </button>
                    </div>
                </div>
                @endforeach
                </div>

                <div id="sin-resultados" class="hidden text-center py-10 text-gray-400 text-sm">
                    No se encontraron productos.
                </div>
            </div>
        </div>
    </main>
</div>

{{-- MODAL NUEVO PRODUCTO --}}
<div id="modal-nuevo" class="hidden fixed inset-0 z-50 flex items-center justify-center" style="background:rgba(0,0,0,0.4)">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-[#1b1b18]">Nuevo producto</h2>
            <button onclick="document.getElementById('modal-nuevo').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-widest mb-1">Nombre</label>
                <input type="text" class="w-full px-4 py-2.5 bg-[#f5f4f1] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#2c1a0e]/20" placeholder="Ej: Buzo Oversized Negro"/>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-widest mb-1">Precio</label>
                    <input type="number" class="w-full px-4 py-2.5 bg-[#f5f4f1] rounded-xl text-sm focus:outline-none" placeholder="89900"/>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-widest mb-1">Stock</label>
                    <input type="number" class="w-full px-4 py-2.5 bg-[#f5f4f1] rounded-xl text-sm focus:outline-none" placeholder="15"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-widest mb-1">Categoría</label>
                <select class="w-full px-4 py-2.5 bg-[#f5f4f1] rounded-xl text-sm focus:outline-none">
                    <option>buzos</option><option>camisas</option><option>chaquetas</option>
                    <option>pantalones</option><option>accesorios</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-widest mb-1">Imagen (URL)</label>
                <input type="text" class="w-full px-4 py-2.5 bg-[#f5f4f1] rounded-xl text-sm focus:outline-none" placeholder="https://..."/>
            </div>
            <button type="submit" class="w-full py-3 text-white text-sm font-semibold rounded-xl hover:opacity-90 transition-all" style="background:#2c1a0e">
                Guardar producto
            </button>
        </form>
    </div>
</div>

<script>
function filtrarTabla(q) {
    q = q.toLowerCase();
    const filas = document.querySelectorAll('.fila-producto');
    let visible = 0;
    filas.forEach(f => {
        const match = f.dataset.nombre.includes(q) || f.dataset.cat.includes(q);
        f.classList.toggle('hidden', !match);
        if (match) visible++;
    });
    document.getElementById('total-label').textContent = visible + ' productos';
    document.getElementById('sin-resultados').classList.toggle('hidden', visible > 0);
}
</script>
</body>
</html>

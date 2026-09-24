@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8 relative">

    {{-- HERO SECTION: Bienvenido & Banner --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-10">

        {{-- Left: Saludo & Buscador --}}
        <div class="lg:col-span-6 space-y-4">
            <h1 class="text-3xl md:text-4xl font-bold font-serif text-[#1b1b18]">
                Bienvenido, {{ $usuarioNombre }}
            </h1>
            <p class="text-sm text-[#706f6c]">
                Descubre nuestra colección con <strong class="text-[#1b1b18] font-semibold">estilo, calidad y autenticidad.</strong>
            </p>

            {{-- Buscador con micrófono --}}
            <div class="relative flex items-center pt-2">
                <div class="absolute left-4 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" placeholder="Buscar productos, categorías..."
                       class="w-full pl-12 pr-12 py-3 bg-white border border-gray-200 rounded-full text-sm text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] shadow-2xs transition-all">
                <button class="absolute right-4 text-gray-400 hover:text-[#1b1b18] transition-colors" title="Búsqueda por voz">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Right: Banner Nueva Colección --}}
        <div class="lg:col-span-6 bg-[#ebdcc9] rounded-3xl p-6 sm:p-8 flex items-center justify-between shadow-xs relative overflow-hidden">
            <div class="z-10 max-w-[60%]">
                <p class="text-[11px] font-semibold text-[#8a7660] tracking-widest uppercase">NUEVA COLECCIÓN</p>
                <h2 class="text-2xl sm:text-3xl font-bold font-serif text-[#1b1b18] uppercase leading-tight my-2">
                    ESTILO QUE<br>TE DEFINE
                </h2>
                <a href="/catalogo" class="mt-2 inline-block px-5 py-2.5 text-xs font-bold text-white uppercase rounded-xl shadow-xs hover:opacity-90 transition-all" style="background:#5c4028">
                    VER COLECCIÓN
                </a>
            </div>

            {{-- Imagen del modelo en el banner --}}
            <div class="z-10 shrink-0">
                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=300&q=80" alt="Modelo Salinas" class="w-32 sm:w-36 h-40 sm:h-44 rounded-2xl object-cover shadow-md border-2 border-white/50">
            </div>
        </div>

    </div>

    {{-- FILTROS DE CATEGORÍA (Pills) --}}
    <div class="flex items-center gap-2.5 overflow-x-auto pb-4 mb-8 no-scrollbar">
        <a href="/catalogo?cat=todos"    class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Todos</a>
        <a href="/catalogo?cat=nuevo"    class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Nuevos</a>
        <a href="/ofertas"               class="px-5 py-2 rounded-full text-xs font-bold text-white shadow-xs transition-all shrink-0" style="background:#5c4028">Promociones</a>
        <a href="/catalogo?cat=buzo"     class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Buzos</a>
        <a href="/catalogo?cat=camisa"   class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Camisas</a>
        <a href="/catalogo?cat=chaqueta" class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Chaquetas</a>
        <a href="/catalogo?cat=pantalon" class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Pantalones</a>
        <a href="/catalogo?cat=accesorio"class="px-5 py-2 rounded-full text-xs font-medium text-gray-700 bg-white border border-gray-200 hover:border-[#2c1a0e] transition-all shrink-0">Accesorios</a>
    </div>

    {{-- SECCIÓN PRODUCTOS DESTACADOS / OFERTAS --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-[#1b1b18]">Productos Destacados</h2>
        <a href="/catalogo" class="text-xs text-[#706f6c] hover:text-[#1b1b18] transition-colors">Ver todo ›</a>
    </div>

    {{-- Grid Productos con Descuento --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        @foreach($productosOferta as $prod)
            <div onclick="abrirDetalleProducto({{ json_encode($prod) }})" class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between cursor-pointer">
                
                {{-- Área Imagen + Descuento + Favoritos --}}
                <div class="h-60 w-full relative flex items-center justify-center overflow-hidden" style="background-color: {{ $prod['placeholder_bg'] }};">
                    
                    {{-- Badge Rojo Descuento --}}
                    <span class="absolute top-3 left-3 bg-[#ef4444] text-white text-xs font-bold px-2.5 py-0.5 rounded-full z-10 shadow-xs">
                        {{ $prod['descuento'] }}
                    </span>

                    {{-- Botón Favorito --}}
                    <button data-prod-id="{{ $prod['id'] }}" onclick="event.stopPropagation(); toggleFavorito(this, {{ json_encode($prod) }})" class="btn-favorito absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-xs shadow-xs flex items-center justify-center text-gray-500 hover:text-red-500 transition-all z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>

                    {{-- Imagen --}}
                    <img src="{{ $prod['img'] }}" alt="{{ $prod['nombre'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>

                {{-- Info Producto y Precios --}}
                <div class="p-4 bg-white">
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1 group-hover:text-[#2c1a0e] transition-colors">
                        {{ $prod['nombre'] }}
                    </h3>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-sm text-[#1b1b18]">
                            ${{ $prod['precio_descuento'] }}
                        </span>
                        <span class="text-xs text-gray-400 line-through">
                            ${{ $prod['precio_original'] }}
                        </span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>

{{-- Botón Flotante Chat Soporte --}}
<div class="fixed bottom-6 right-6 z-50">
    <button onclick="alert('Abriendo soporte al cliente Salinas...')" class="relative w-14 h-14 bg-[#2c1a0e] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a.75.75 0 01-1.016-.941l.858-2.146A8.204 8.204 0 013 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
        </svg>
        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[11px] font-bold rounded-full flex items-center justify-center shadow-xs">
            1
        </span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const favs = JSON.parse(localStorage.getItem('salinas_favoritos') || '[]');
        const favIds = favs.map(p => p.id);

        document.querySelectorAll('.btn-favorito').forEach(btn => {
            const id = parseInt(btn.getAttribute('data-prod-id'));
            if (favIds.includes(id)) {
                setCorazonActivo(btn, true);
            }
        });
    });

    function setCorazonActivo(btn, activo) {
        const svg = btn.querySelector('svg');
        if (activo) {
            svg.setAttribute('fill', 'currentColor');
            btn.classList.remove('text-gray-500');
            btn.classList.add('text-red-500');
        } else {
            svg.setAttribute('fill', 'none');
            btn.classList.remove('text-red-500');
            btn.classList.add('text-gray-500');
        }
    }

    function toggleFavorito(btn, prod) {
        let favs = JSON.parse(localStorage.getItem('salinas_favoritos') || '[]');
        const index = favs.findIndex(p => p.id === prod.id);

        if (index > -1) {
            favs.splice(index, 1);
            setCorazonActivo(btn, false);
        } else {
            favs.push(prod);
            setCorazonActivo(btn, true);
        }

        localStorage.setItem('salinas_favoritos', JSON.stringify(favs));
    }
</script>
@endsection

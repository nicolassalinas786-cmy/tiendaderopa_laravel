@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8 relative">

    {{-- Encabezado Catálogo --}}
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold font-serif text-[#1b1b18]">Catálogo Completo</h1>
            <p class="text-xs text-[#706f6c] mt-1">Explora toda nuestra colección por categoría</p>
        </div>
        <a href="/" class="flex items-center gap-1.5 text-xs font-semibold text-[#1b1b18] hover:underline transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Volver al inicio
        </a>
    </div>

    {{-- BARRA DE FILTROS POR CATEGORÍA (Pills) --}}
    @php
        $filtroActual = $catFiltro ?? 'todos';
        $pills = [
            'Todos'       => 'todos',
            'Nuevos'      => 'nuevo',
            'Promociones' => 'promo',
            'Buzos'       => 'buzo',
            'Camisas'     => 'camisa',
            'Chaquetas'   => 'chaqueta',
            'Pantalones'  => 'pantalon',
            'Accesorios'  => 'accesorio',
        ];
    @endphp
    <div class="flex items-center gap-2.5 overflow-x-auto pb-4 mb-8 no-scrollbar">
        @foreach($pills as $label => $slug)
            @php
                $esActivo = ($filtroActual === $slug);
                $url = ($slug === 'promo') ? '/ofertas' : '/catalogo?cat='.$slug;
            @endphp
            <a href="{{ $url }}"
               class="px-5 py-2 rounded-full text-xs font-medium transition-all shrink-0 {{ $esActivo ? 'bg-[#2c1a0e] text-white font-bold shadow-xs' : 'bg-white text-[#706f6c] border border-gray-200 hover:border-[#2c1a0e] hover:text-[#1b1b18]' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    @foreach($categorias as $cat)
        {{-- Encabezado Categoría --}}
        <div class="flex items-center gap-3 mb-6">
            <div class="w-9 h-9 rounded-full bg-[#ebdcc9] flex items-center justify-center text-[#2c1a0e] shadow-xs">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-[#1b1b18] leading-tight">{{ $cat['nombre'] }}</h2>
                <p class="text-xs text-[#706f6c]">{{ count($cat['productos']) }} productos</p>
            </div>
        </div>

        {{-- Grid Productos --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            @foreach($cat['productos'] as $prod)
                @php
                    $prodWithCat = array_merge($prod, ['cat' => $cat['nombre']]);
                    $stockCount = $prod['stock'] ?? 8;
                @endphp
                <div class="bg-white rounded-3xl p-3.5 border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between">
                    
                    {{-- Área de Imagen / Badge --}}
                    <div class="h-56 w-full relative flex items-center justify-center overflow-hidden rounded-2xl"
                         style="background-color: {{ $prod['placeholder_bg'] ?? '#f4f3f0' }};">
                        
                        {{-- Badge Nuevo --}}
                        @if(!empty($prod['es_nuevo']))
                            <span class="absolute top-3 left-3 bg-[#22c55e] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full z-10 shadow-xs">
                                Nuevo
                            </span>
                        @endif

                        {{-- Botón Favorito --}}
                        <button data-prod-id="{{ $prod['id'] }}" onclick="event.stopPropagation(); toggleFavorito(this, {{ json_encode($prod) }})" class="btn-favorito absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-xs shadow-xs flex items-center justify-center text-gray-500 hover:text-red-500 transition-all z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>

                        {{-- Imagen o Placeholder --}}
                        @if($prod['img'])
                            <img src="{{ $prod['img'] }}" alt="{{ $prod['nombre'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="flex flex-col items-center justify-center text-center p-4">
                                <div class="w-12 h-12 rounded-lg bg-black/5 flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#8a7660]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-medium text-[#8a7660] opacity-80">{{ $prod['nombre'] }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Info Producto --}}
                    <div class="pt-3 pb-1 px-1">
                        <h3 class="font-bold text-sm text-[#1b1b18] mb-0.5 group-hover:text-[#2c1a0e] transition-colors truncate">
                            {{ $prod['nombre'] }}
                        </h3>
                        <p class="font-bold text-sm text-[#1b1b18] mb-1">
                            ${{ $prod['precio'] }}
                        </p>

                        {{-- Alerta Pocas Unidades --}}
                        <div class="flex items-center gap-1 text-amber-600 text-[11px] font-medium mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-amber-500 fill-amber-500" viewBox="0 0 24 24">
                                <path d="M12 2L1 21h22L12 2zm0 3.83L20.17 19H3.83L12 5.83zM11 10h2v4h-2zm0 5h2v2h-2z"/>
                            </svg>
                            <span>Pocas unidades ({{ $stockCount }})</span>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="flex gap-2">
                            {{-- Botón Agregar al Carrito --}}
                            <button onclick="agregarAlCarritoCatalogo({{ json_encode($prodWithCat) }})"
                                    class="flex-1 py-2.5 px-3 text-xs font-bold text-[#2c1a0e] border border-[#2c1a0e] rounded-2xl hover:bg-[#2c1a0e] hover:text-white transition-all flex items-center justify-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                                </svg>
                                Agregar
                            </button>

                            {{-- Botón Ver Detalle --}}
                            <button onclick="abrirDetalleProducto({{ json_encode($prodWithCat) }})"
                                    class="flex-1 py-2.5 px-3 text-xs font-bold text-white rounded-2xl shadow-2xs hover:opacity-90 transition-all flex items-center justify-center gap-1.5"
                                    style="background:#5c4028">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Ver detalle
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endforeach

</div>

{{-- Botón Flotante Chat Soporte --}}
<div class="fixed bottom-6 right-6 z-50">
    <button onclick="alert('Abriendo soporte al cliente Salinas...')" class="relative w-14 h-14 bg-[#2c1a0e] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a.75.75 0 01-1.016-.941l.858-2.146A8.204 8.204 0 013 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
        </svg>
        {{-- Notification Count --}}
        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[11px] font-bold rounded-full flex items-center justify-center shadow-xs">
            1
        </span>
    </button>
</div>

<script>
    function toggleFavorito(btn) {
        const svg = btn.querySelector('svg');
        if (svg.getAttribute('fill') === 'currentColor') {
            svg.setAttribute('fill', 'none');
            btn.classList.remove('text-red-500');
            btn.classList.add('text-gray-500');
        } else {
            svg.setAttribute('fill', 'currentColor');
            btn.classList.remove('text-gray-500');
            btn.classList.add('text-red-500');
        }
    }

    function agregarAlCarritoCatalogo(prod) {
        if (window.agregarAlCarrito) {
            window.agregarAlCarrito(prod, 'U', 1);
        }
    }
</script>
@endsection

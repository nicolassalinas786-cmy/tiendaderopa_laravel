@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8 relative min-h-[70vh]">

    {{-- Encabezado Favoritos --}}
    <div class="flex items-start justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold font-serif text-[#1b1b18] flex items-center gap-2">
                <span class="text-red-500">❤️</span> Mis Favoritos
            </h1>
            <p class="text-xs text-[#706f6c] mt-1">Productos que guardaste</p>
        </div>
        <a href="/" class="flex items-center gap-1.5 text-xs font-semibold text-[#1b1b18] hover:underline transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Volver al inicio
        </a>
    </div>

    {{-- Contenedor dinámico de Favoritos --}}
    <div id="favoritos-container">

        {{-- Estado Vacío (Coincide exacto con la captura) --}}
        <div id="empty-state" class="flex flex-col items-center justify-center py-20 text-center">
            {{-- Ícono Corazón Gris Grande --}}
            <div class="w-20 h-20 mb-4 text-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 fill-current" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>

            <h2 class="text-lg font-bold text-[#706f6c] mb-1">Aún no tienes favoritos</h2>
            <p class="text-xs text-[#8c8983] mb-6">Haz clic en el corazón de cualquier producto para guardarlo aquí</p>

            <a href="/catalogo" class="px-6 py-2.5 text-xs font-semibold text-white rounded-xl shadow-xs hover:opacity-90 transition-all" style="background:#5c4028">
                Ver catálogo
            </a>
        </div>

        {{-- Grid cuando existen Favoritos --}}
        <div id="favoritos-grid" class="hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            {{-- Se renderiza vía JS --}}
        </div>

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
    document.addEventListener('DOMContentLoaded', cargarFavoritos);

    function cargarFavoritos() {
        const favs = JSON.parse(localStorage.getItem('salinas_favoritos') || '[]');
        const emptyState = document.getElementById('empty-state');
        const grid = document.getElementById('favoritos-grid');

        if (favs.length === 0) {
            emptyState.classList.remove('hidden');
            grid.classList.add('hidden');
            return;
        }

        emptyState.classList.add('hidden');
        grid.classList.remove('hidden');
        grid.innerHTML = '';

        favs.forEach(prod => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between';
            
            const imgHTML = prod.img 
                ? `<img src="${prod.img}" alt="${prod.nombre}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">`
                : `<div class="flex flex-col items-center justify-center text-center p-4">
                     <div class="w-12 h-12 rounded-lg bg-black/5 flex items-center justify-center mb-2">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#8a7660]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                         </svg>
                     </div>
                     <span class="text-xs font-medium text-[#8a7660] opacity-80">${prod.nombre}</span>
                   </div>`;

            card.innerHTML = `
                <div class="h-56 w-full relative flex items-center justify-center overflow-hidden" style="background-color: ${prod.placeholder_bg || '#f4f3f0'};">
                    <button onclick="eliminarFavorito(${prod.id})" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 shadow-xs flex items-center justify-center text-red-500 transition-all z-10 hover:scale-110" title="Quitar de favoritos">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                    ${imgHTML}
                </div>
                <div class="p-4 bg-white">
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1">${prod.nombre}</h3>
                    <p class="font-bold text-sm text-[#1b1b18]">$${prod.precio}</p>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    function eliminarFavorito(id) {
        let favs = JSON.parse(localStorage.getItem('salinas_favoritos') || '[]');
        favs = favs.filter(p => p.id !== id);
        localStorage.setItem('salinas_favoritos', JSON.stringify(favs));
        cargarFavoritos();
    }
</script>
@endsection

@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="max-w-7xl mx-auto px-6 pt-10 pb-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

        {{-- Left --}}
        <div>
            <h1 class="text-4xl font-bold text-[#1b1b18] mb-2">Bienvenido</h1>
            <p class="text-[#706f6c] mb-6">Descubre nuestra colección con <strong class="text-[#1b1b18]">estilo, calidad y autenticidad.</strong></p>

            <div class="relative flex items-center">
                <div class="absolute left-4 text-[#706f6c]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </div>
                <input id="search-input" type="text" placeholder="Buscar productos, categorías..."
                    class="w-full pl-10 pr-12 py-3 bg-white border border-gray-200 rounded-xl text-sm text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2c2416]/20 focus:border-[#2c2416] transition-all shadow-sm"/>
                <button class="absolute right-3 text-[#706f6c] hover:text-[#1b1b18] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Banner --}}
        <div class="relative bg-[#e8ddd0] rounded-2xl overflow-hidden h-48 flex items-center justify-between px-8">
            <div class="z-10">
                <p class="text-[10px] font-semibold tracking-[0.2em] uppercase text-[#8a7660] mb-1">Nueva Colección</p>
                <h2 class="text-3xl font-black text-[#1b1b18] leading-tight uppercase">Estilo que<br>te define</h2>
                <a href="#catalogo" class="mt-4 inline-block bg-[#2c2416] text-white text-xs font-semibold px-5 py-2.5 rounded-lg hover:bg-[#3d3020] transition-colors tracking-wide uppercase">
                    Ver Colección
                </a>
            </div>
            <div class="absolute right-0 top-0 h-full w-48 flex items-end justify-center overflow-hidden pointer-events-none">
                <div class="w-40 h-48 bg-[#c9b99a] rounded-t-full opacity-30"></div>
            </div>
        </div>
    </div>
</section>

{{-- FILTROS --}}
<section class="max-w-7xl mx-auto px-6 py-4" id="catalogo">
    <div class="flex items-center gap-2 flex-wrap" id="filtros">
        @php
            $categorias = [
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
        @foreach($categorias as $label => $cat)
            <button
                data-cat="{{ $cat }}"
                onclick="filtrar('{{ $cat }}', this)"
                class="filtro-btn px-4 py-2 rounded-full text-sm font-medium transition-all
                    {{ $cat === 'todos' ? 'bg-[#2c2416] text-white shadow-sm' : 'bg-white text-[#706f6c] border border-gray-200 hover:border-[#2c2416] hover:text-[#1b1b18]' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>
</section>

{{-- TÍTULO SECCIÓN --}}
<section class="max-w-7xl mx-auto px-6 pt-2 pb-2 flex items-center justify-between">
    <h2 id="section-title" class="text-lg font-bold text-[#1b1b18]">Productos Destacados</h2>
    <a href="#" class="text-sm text-[#706f6c] hover:text-[#1b1b18] transition-colors">Ver todo ›</a>
</section>

{{-- GRID PRODUCTOS --}}
<section class="max-w-7xl mx-auto px-6 pb-12">
    <div id="productos-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        {{-- Renderizado por JS --}}
    </div>
    <p id="sin-resultados" class="hidden text-center text-gray-400 py-12 text-sm">No se encontraron productos.</p>
</section>

@push('scripts')
<script>
// ─── BASE DE DATOS DE PRODUCTOS (con fotos reales de Unsplash) ───────────────
const productos = [
    // BUZOS
    { id:1,  nombre:'Buzo Oversized Negro',     precio:89900,  cat:'buzo',     badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1556821840-3a63f15732ce?w=400&q=80' },
    { id:2,  nombre:'Buzo Tie Dye Beige',       precio:95000,  cat:'buzo',     badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80' },
    { id:3,  nombre:'Hoodie Streetwear Gris',   precio:99900,  cat:'buzo',     badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1578768079052-aa76e52ff9ef?w=400&q=80' },
    { id:4,  nombre:'Buzo Crop Camel',          precio:79900,  cat:'buzo',     badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&q=80' },
    { id:5,  nombre:'Hoodie Premium Blanco',    precio:110000, cat:'buzo',     badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400&q=80' },
    { id:6,  nombre:'Buzo Vintage Marrón',      precio:88000,  cat:'buzo',     badge:'Promo',  badgeColor:'#f97316', img:'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=400&q=80' },

    // CAMISAS
    { id:7,  nombre:'Camisa Lino Blanca',       precio:65000,  cat:'camisa',   badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&q=80' },
    { id:8,  nombre:'Camisa Oversize Negra',    precio:72000,  cat:'camisa',   badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1602810319428-019690571b5b?w=400&q=80' },
    { id:9,  nombre:'Camisa Cuadros Flannel',   precio:68000,  cat:'camisa',   badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1598032895397-b9472444bf93?w=400&q=80' },
    { id:10, nombre:'Polo Premium Beige',       precio:55000,  cat:'camisa',   badge:'Promo',  badgeColor:'#f97316', img:'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=400&q=80' },
    { id:11, nombre:'Camiseta Básica Blanca',   precio:45000,  cat:'camisa',   badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1527719327859-c6ce80353573?w=400&q=80' },
    { id:12, nombre:'Camisa Manga Corta Azul',  precio:62000,  cat:'camisa',   badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1589310243389-96a5483213a8?w=400&q=80' },

    // CHAQUETAS
    { id:13, nombre:'Chaqueta Cuero Negro',     precio:249000, cat:'chaqueta', badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&q=80' },
    { id:14, nombre:'Chaqueta Denim Azul',      precio:185000, cat:'chaqueta', badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&q=80' },
    { id:15, nombre:'Bomber Verde Militar',     precio:199000, cat:'chaqueta', badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1548883354-7622d03aca27?w=400&q=80' },
    { id:16, nombre:'Windbreaker Beige',        precio:175000, cat:'chaqueta', badge:'Promo',  badgeColor:'#f97316', img:'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=400&q=80' },

    // PANTALONES
    { id:17, nombre:'Jogger Cargo Beige',       precio:120000, cat:'pantalon', badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=400&q=80' },
    { id:18, nombre:'Jean Slim Negro',          precio:135000, cat:'pantalon', badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&q=80' },
    { id:19, nombre:'Pantalón Wide Leg Gris',   precio:145000, cat:'pantalon', badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=400&q=80' },
    { id:20, nombre:'Jogger Premium Negro',     precio:115000, cat:'pantalon', badge:'Promo',  badgeColor:'#f97316', img:'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=400&q=80' },

    // ACCESORIOS
    { id:21, nombre:'Gorra Snapback Negra',     precio:45000,  cat:'accesorio',badge:'Nuevo',  badgeColor:'#22c55e', img:'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=400&q=80' },
    { id:22, nombre:'Mochila Urbana Marrón',    precio:89000,  cat:'accesorio',badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&q=80' },
    { id:23, nombre:'Riñonera Streetwear',      precio:55000,  cat:'accesorio',badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&q=80' },
    { id:24, nombre:'Cinturón Cuero Negro',     precio:35000,  cat:'accesorio',badge:null,     badgeColor:'',        img:'https://images.unsplash.com/photo-1624378515195-4b36d03f7b93?w=400&q=80' },
];

// Marcar nuevos y promos
productos.forEach(p => {
    if (p.badge === 'Nuevo') p.esNuevo = true;
    if (p.badge === 'Promo') p.esPromo = true;
});

// ─── RENDER ──────────────────────────────────────────────────────────────────
function renderProductos(lista) {
    const grid = document.getElementById('productos-grid');
    const sinRes = document.getElementById('sin-resultados');
    grid.innerHTML = '';

    if (!lista.length) {
        sinRes.classList.remove('hidden');
        return;
    }
    sinRes.classList.add('hidden');

    lista.forEach(p => {
        const precio = new Intl.NumberFormat('es-CO').format(p.precio);
        grid.innerHTML += `
        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all group cursor-pointer"
             onclick="verProducto(${p.id})">
            <div class="relative overflow-hidden" style="aspect-ratio:1/1">
                <img src="${p.img}" alt="${p.nombre}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                     onerror="this.src='https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&q=80'"/>
                ${p.badge ? `<span class="absolute top-2 left-2 text-[10px] font-bold px-2 py-1 rounded-full text-white" style="background:${p.badgeColor}">${p.badge}</span>` : ''}
                <button onclick="event.stopPropagation(); toggleFav(this)"
                    class="absolute top-2 right-2 w-7 h-7 flex items-center justify-center rounded-full bg-white shadow-sm text-gray-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>
                </button>
            </div>
            <div class="p-3">
                <p class="text-xs font-semibold text-[#1b1b18] truncate">${p.nombre}</p>
                <p class="text-sm font-bold text-[#2c2416] mt-0.5">$${precio}</p>
                <button onclick="event.stopPropagation(); agregarCarrito(${p.id})"
                    class="mt-2 w-full py-1.5 text-[11px] font-semibold rounded-lg border border-[#2c2416] text-[#2c2416] hover:bg-[#2c2416] hover:text-white transition-all">
                    Agregar al carrito
                </button>
            </div>
        </div>`;
    });
}

// ─── FILTRAR ─────────────────────────────────────────────────────────────────
function filtrar(cat, btn) {
    // Actualizar botones activos
    document.querySelectorAll('.filtro-btn').forEach(b => {
        b.classList.remove('bg-[#2c2416]', 'text-white', 'shadow-sm');
        b.classList.add('bg-white', 'text-[#706f6c]', 'border', 'border-gray-200');
    });
    btn.classList.remove('bg-white', 'text-[#706f6c]', 'border', 'border-gray-200');
    btn.classList.add('bg-[#2c2416]', 'text-white', 'shadow-sm');

    // Títulos por categoría
    const titulos = {
        todos: 'Productos Destacados', nuevo: 'Nuevos Ingresos',
        promo: 'Promociones', buzo: 'Buzos', camisa: 'Camisas',
        chaqueta: 'Chaquetas', pantalon: 'Pantalones', accesorio: 'Accesorios'
    };
    document.getElementById('section-title').textContent = titulos[cat] || 'Productos';

    // Filtrar
    let lista;
    if (cat === 'todos')  lista = productos;
    else if (cat === 'nuevo') lista = productos.filter(p => p.esNuevo);
    else if (cat === 'promo') lista = productos.filter(p => p.esPromo);
    else lista = productos.filter(p => p.cat === cat);

    renderProductos(lista);

    // Scroll suave al grid
    document.getElementById('catalogo').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// ─── BUSCADOR ────────────────────────────────────────────────────────────────
document.getElementById('search-input').addEventListener('input', function() {
    const q = this.value.toLowerCase().trim();
    if (!q) { renderProductos(productos); return; }
    const res = productos.filter(p => p.nombre.toLowerCase().includes(q) || p.cat.includes(q));
    document.getElementById('section-title').textContent = q ? `Resultados para "${this.value}"` : 'Productos Destacados';
    renderProductos(res);
});

// ─── FAVORITO ────────────────────────────────────────────────────────────────
function toggleFav(btn) {
    const svg = btn.querySelector('svg');
    const activo = btn.dataset.fav === '1';
    btn.dataset.fav = activo ? '0' : '1';
    svg.setAttribute('fill', activo ? 'none' : '#ef4444');
    svg.setAttribute('stroke', activo ? 'currentColor' : '#ef4444');
    btn.classList.toggle('text-red-500', !activo);
}

// ─── VER PRODUCTO (Modal) ───────────────────────────────────────────────────
function verProducto(id) {
    const p = productos.find(x => x.id === id);
    if (!p) return;
    abrirDetalleProducto({
        id: p.id,
        nombre: p.nombre,
        precio: p.precio,
        cat: p.cat || 'BUZOS',
        img: p.img,
        desc: 'Hoodie clásico en tela jaspeada suave. Perfecto para climas fríos.',
        stock: 20
    });
}

// ─── CARRITO ──────────────────────────────────────────────────────────────────
function agregarCarrito(id) {
    const p = productos.find(x => x.id === id);
    if (!p) return;
    if (window.agregarAlCarrito) {
        window.agregarAlCarrito(p, 'U', 1);
    }
}

// ─── INIT ────────────────────────────────────────────────────────────────────
const urlParams = new URLSearchParams(window.location.search);
const initialCat = urlParams.get('cat');
if (initialCat) {
    const btn = document.querySelector(`.filtro-btn[data-cat="${initialCat}"]`);
    if (btn) {
        filtrar(initialCat, btn);
    } else {
        renderProductos(productos);
    }
} else {
    renderProductos(productos);
}
</script>
@endpush

@endsection

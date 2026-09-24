@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1b1b18]">Carrito de compras</h1>
            <p class="text-sm text-[#706f6c] mt-1" id="resumen-top">
                {{ $cuenta > 0 ? $cuenta . ' ' . ($cuenta === 1 ? 'artículo' : 'artículos') : 'Tu carrito está vacío' }}
            </p>
        </div>
        <a href="/catalogo" class="flex items-center gap-1.5 text-sm font-semibold text-[#2c2416] hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Seguir comprando
        </a>
    </div>

    {{-- Layout principal --}}
    <div class="flex flex-col lg:flex-row gap-8">

        {{-- ── LISTA DE ITEMS ───────────────────────────────────── --}}
        <div class="flex-1">

            {{-- Estado vacío --}}
            <div id="carrito-vacio" class="{{ $cuenta > 0 ? 'hidden' : '' }} flex flex-col items-center justify-center py-20 text-center">
                <div class="w-20 h-20 bg-[#f5efea] rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#c9b99a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z"/>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-[#1b1b18] mb-2">Tu carrito está vacío</h2>
                <p class="text-sm text-[#706f6c] mb-6">Agrega productos desde el catálogo o la página de inicio.</p>
                <a href="/catalogo" class="px-6 py-3 bg-[#2c1a0e] text-white text-sm font-bold rounded-2xl hover:bg-[#3d2510] transition-colors">
                    Ver catálogo
                </a>
            </div>

            {{-- Lista de items --}}
            <div id="lista-items" class="{{ $cuenta === 0 ? 'hidden' : '' }} space-y-4">

                @foreach($items as $clave => $item)
                @php $clave = $item['id'] . '_' . $item['talla']; @endphp
                <div id="item-{{ $clave }}" class="bg-white rounded-2xl border border-gray-100 p-4 flex gap-4 shadow-xs">

                    {{-- Imagen --}}
                    <div class="w-24 h-24 rounded-xl overflow-hidden bg-[#f5efea] flex-shrink-0">
                        @if(!empty($item['img']))
                            <img src="{{ $item['img'] }}" alt="{{ $item['nombre'] }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#c9b99a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-sm text-[#1b1b18] leading-tight">{{ $item['nombre'] }}</h3>
                                <span class="text-[11px] text-[#706f6c] bg-gray-100 px-2 py-0.5 rounded-full mt-1 inline-block">Talla: {{ $item['talla'] }}</span>
                            </div>
                            {{-- Botón quitar --}}
                            <button onclick="quitarItem('{{ $clave }}')"
                                class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center justify-between mt-3">
                            {{-- Precio unitario --}}
                            <span class="text-sm font-bold text-[#1b1b18]">
                                ${{ number_format($item['precio'], 0, ',', '.') }}
                            </span>

                            {{-- Cantidad --}}
                            <div class="flex items-center gap-2">
                                <button onclick="cambiarCantidad('{{ $clave }}', -1)"
                                    class="w-7 h-7 rounded-lg border border-gray-200 flex items-center justify-center text-sm font-bold text-gray-600 hover:bg-gray-100 transition-colors">−</button>
                                <span id="cant-{{ $clave }}" class="w-6 text-center text-sm font-bold text-[#1b1b18]">{{ $item['cantidad'] }}</span>
                                <button onclick="cambiarCantidad('{{ $clave }}', 1)"
                                    class="w-7 h-7 rounded-lg border border-gray-200 flex items-center justify-center text-sm font-bold text-gray-600 hover:bg-gray-100 transition-colors">+</button>
                            </div>

                            {{-- Subtotal --}}
                            <span id="sub-{{ $clave }}" class="text-sm font-bold text-[#2c1a0e] min-w-[80px] text-right">
                                ${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Botón vaciar --}}
            <div id="btn-vaciar-wrap" class="{{ $cuenta === 0 ? 'hidden' : '' }} mt-4">
                <button onclick="vaciarCarrito()"
                    class="text-xs text-red-400 hover:text-red-600 hover:underline transition-colors">
                    Vaciar carrito
                </button>
            </div>
        </div>

        {{-- ── RESUMEN DE PEDIDO ────────────────────────────────── --}}
        <div class="lg:w-80 xl:w-96">
            <div id="resumen-panel" class="{{ $cuenta === 0 ? 'hidden' : '' }} bg-white rounded-2xl border border-gray-100 p-6 shadow-xs sticky top-24">
                <h2 class="text-base font-bold text-[#1b1b18] mb-5">Resumen del pedido</h2>

                <div class="space-y-3 text-sm text-[#1b1b18]">
                    <div class="flex justify-between">
                        <span class="text-[#706f6c]">Subtotal</span>
                        <span id="res-subtotal" class="font-semibold">${{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-[#706f6c]">Envío</span>
                        <span class="text-emerald-600 font-semibold">Gratis</span>
                    </div>
                    <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-base">
                        <span>Total</span>
                        <span id="res-total">${{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                <a href="/pago" class="mt-6 w-full py-3.5 bg-[#2c1a0e] text-white text-sm font-bold rounded-2xl hover:bg-[#3d2510] transition-colors shadow-sm flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Proceder al pago
                </a>

                <div class="mt-4 flex items-center justify-center gap-1.5 text-[11px] text-[#706f6c]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                    Pago 100% seguro
                </div>

                {{-- Métodos de pago --}}
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-[10px] text-[#706f6c] text-center mb-2 uppercase tracking-wider font-medium">Métodos de pago</p>
                    <div class="flex items-center justify-center gap-3 text-[11px] text-[#706f6c]">
                        <span class="px-2 py-1 bg-gray-50 rounded-lg border border-gray-100 font-semibold">Nequi</span>
                        <span class="px-2 py-1 bg-gray-50 rounded-lg border border-gray-100 font-semibold">PSE</span>
                        <span class="px-2 py-1 bg-gray-50 rounded-lg border border-gray-100 font-semibold">Tarjeta</span>
                        <span class="px-2 py-1 bg-gray-50 rounded-lg border border-gray-100 font-semibold">Efectivo</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
const CSRF = document.querySelector('meta[name="csrf-token"]')?.content ?? '{{ csrf_token() }}';

// ─── Precios de items cargados desde servidor ─────────────────────────────────
const preciosItems = {
    @foreach($items as $item)
    @php $c = $item['id'] . '_' . $item['talla']; @endphp
    '{{ $c }}': {{ $item['precio'] }},
    @endforeach
};

// ─── Cambiar cantidad ─────────────────────────────────────────────────────────
function cambiarCantidad(clave, delta) {
    const spanCant = document.getElementById('cant-' + clave);
    let cantidad = parseInt(spanCant.textContent) + delta;
    if (cantidad < 1) { quitarItem(clave); return; }
    if (cantidad > 99) return;

    fetch('/carrito/actualizar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ clave, cantidad })
    })
    .then(r => r.json())
    .then(data => {
        if (!data.ok) return;
        spanCant.textContent = cantidad;
        // Actualizar subtotal del item
        const precio = preciosItems[clave] ?? 0;
        const subEl  = document.getElementById('sub-' + clave);
        if (subEl) subEl.textContent = '$' + formatCOP(precio * cantidad);
        // Actualizar resumen
        actualizarResumen(data.total, data.cuenta);
    });
}

// ─── Quitar item ──────────────────────────────────────────────────────────────
function quitarItem(clave) {
    fetch('/carrito/quitar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ clave })
    })
    .then(r => r.json())
    .then(data => {
        if (!data.ok) return;
        const el = document.getElementById('item-' + clave);
        if (el) el.remove();
        actualizarResumen(data.total, data.cuenta);
        if (data.cuenta === 0) mostrarVacio();
    });
}

// ─── Vaciar carrito ───────────────────────────────────────────────────────────
function vaciarCarrito() {
    if (!confirm('¿Vaciar todo el carrito?')) return;

    fetch('/carrito/vaciar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: '{}'
    })
    .then(r => r.json())
    .then(data => {
        if (!data.ok) return;
        document.getElementById('lista-items').innerHTML = '';
        actualizarResumen(0, 0);
        mostrarVacio();
    });
}

// ─── Mostrar estado vacío ─────────────────────────────────────────────────────
function mostrarVacio() {
    document.getElementById('carrito-vacio').classList.remove('hidden');
    document.getElementById('lista-items').classList.add('hidden');
    document.getElementById('resumen-panel').classList.add('hidden');
    document.getElementById('btn-vaciar-wrap').classList.add('hidden');
}

// ─── Actualizar totales y badge del navbar ────────────────────────────────────
function actualizarResumen(total, cuenta) {
    const fmt = '$' + formatCOP(total);
    const sub  = document.getElementById('res-subtotal');
    const tot  = document.getElementById('res-total');
    const top  = document.getElementById('resumen-top');
    if (sub) sub.textContent = fmt;
    if (tot) tot.textContent = fmt;
    if (top) top.textContent = cuenta > 0
        ? cuenta + ' ' + (cuenta === 1 ? 'artículo' : 'artículos')
        : 'Tu carrito está vacío';
    // Badge global del navbar
    if (window.actualizarBadgeCarrito) window.actualizarBadgeCarrito(cuenta);
}

// ─── Formato COP ─────────────────────────────────────────────────────────────
function formatCOP(n) {
    return new Intl.NumberFormat('es-CO').format(Math.round(n));
}
</script>
@endpush

@endsection

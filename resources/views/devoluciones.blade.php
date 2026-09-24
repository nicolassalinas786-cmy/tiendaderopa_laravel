@extends('layouts.app')

@section('content')

{{-- HERO BANNER --}}
<div class="py-12 px-6 text-center text-white relative shadow-sm" style="background: linear-gradient(180deg, #2c1a0e 0%, #4a2c18 100%);">
    <div class="max-w-3xl mx-auto space-y-4">
        {{-- Ícono central Devolución --}}
        <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mx-auto backdrop-blur-xs text-white shadow-xs">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
        </div>

        <h1 class="text-3xl sm:text-4xl font-bold font-serif">Devoluciones y Cambios</h1>
        <p class="text-xs sm:text-sm text-white/80 max-w-xl mx-auto leading-relaxed">
            Tu satisfacción es nuestra prioridad. Tienes hasta <strong class="text-white font-bold">30 días</strong> para devolver o cambiar tu producto.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Alerta de Éxito --}}
    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- GRID PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        {{-- COLUMNA IZQUIERDA --}}
        <div class="lg:col-span-7 space-y-6">

            {{-- CARD 1: Condiciones --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-xs">
                <h2 class="text-lg font-bold text-[#1b1b18] mb-5 flex items-center gap-2">
                    <span class="text-base">📋</span> Condiciones
                </h2>

                <div class="space-y-3.5 text-xs text-[#5c5a55]">
                    {{-- Check Green Items --}}
                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>El producto debe estar en su estado original, sin uso y con etiquetas.</span>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>Tienes hasta <strong class="text-[#1b1b18] font-bold">30 días</strong> desde la fecha de entrega para solicitar la devolución.</span>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>Debes presentar el número de pedido o comprobante de compra.</span>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>El reembolso se procesa en <strong class="text-[#1b1b18] font-bold">3 a 5 días hábiles</strong> tras recibir el producto.</span>
                    </div>

                    {{-- Red Cross Items --}}
                    <div class="flex items-start gap-3 pt-2">
                        <div class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span>No aplica para productos en promoción marcados como "Venta final".</span>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-red-100 text-red-500 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span>No aplica para productos con signos de uso, lavado o daño por el cliente.</span>
                    </div>
                </div>
            </div>

            {{-- CARD 2: ¿Cómo hacer una devolución? --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-xs">
                <h2 class="text-lg font-bold text-[#1b1b18] mb-5 flex items-center gap-2">
                    <span class="text-base">📑</span> ¿Cómo hacer una devolución?
                </h2>

                <div class="space-y-4 text-xs text-[#5c5a55]">
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-[#2c1a0e] text-white font-bold flex items-center justify-center shrink-0 text-xs shadow-xs">
                            1
                        </div>
                        <p class="mt-1">Completa el formulario de solicitud con tu número de pedido y motivo.</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-[#2c1a0e] text-white font-bold flex items-center justify-center shrink-0 text-xs shadow-xs">
                            2
                        </div>
                        <p class="mt-1">Recibirás un correo de confirmación con las instrucciones de envío.</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-[#2c1a0e] text-white font-bold flex items-center justify-center shrink-0 text-xs shadow-xs">
                            3
                        </div>
                        <p class="mt-1">Empaca el producto en su embalaje original y envíalo a nuestra dirección.</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-[#2c1a0e] text-white font-bold flex items-center justify-center shrink-0 text-xs shadow-xs">
                            4
                        </div>
                        <p class="mt-1">Una vez recibido y verificado, procesamos tu reembolso o cambio.</p>
                    </div>
                </div>
            </div>

            {{-- GRID DE 4 TARJETAS DE OPCIONES --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Cambio de talla --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-xs flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#f5f0eb] flex items-center justify-center text-[#2c1a0e] mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1">Cambio de talla</h3>
                    <p class="text-xs text-[#706f6c]">Cambia por la talla correcta sin costo adicional.</p>
                </div>

                {{-- Reembolso --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-xs flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#f5f0eb] flex items-center justify-center text-[#2c1a0e] mb-3">
                        <span class="font-bold text-xl">$</span>
                    </div>
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1">Reembolso</h3>
                    <p class="text-xs text-[#706f6c]">Devolvemos el dinero al método de pago original.</p>
                </div>

                {{-- Cambio de producto --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-xs flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#f5f0eb] flex items-center justify-center text-[#2c1a0e] mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1">Cambio de producto</h3>
                    <p class="text-xs text-[#706f6c]">Elige otro producto de igual o mayor valor.</p>
                </div>

                {{-- Crédito en tienda --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-xs flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#f5f0eb] flex items-center justify-center text-[#2c1a0e] mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-sm text-[#1b1b18] mb-1">Crédito en tienda</h3>
                    <p class="text-xs text-[#706f6c]">Recibe un cupón para usar en tu próxima compra.</p>
                </div>

            </div>

            {{-- CARD DUDA / SOPORTE --}}
            <div class="bg-[#fefce8] rounded-3xl p-6 border border-amber-200/80 shadow-xs space-y-3">
                <h3 class="font-bold text-sm text-[#1b1b18]">¿Tienes dudas?</h3>

                <div class="flex items-center gap-3 text-xs text-[#5c5a55]">
                    <div class="w-7 h-7 rounded-full bg-[#25d366] text-white flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </div>
                    <span class="font-semibold">WhatsApp: +57 321 351 8317</span>
                </div>

                <div class="flex items-center gap-3 text-xs text-[#5c5a55]">
                    <div class="w-7 h-7 rounded-full bg-[#8c684d] text-white flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span>Lunes a Sábado, 8am – 6pm</span>
                </div>
            </div>

        </div>

        {{-- COLUMNA DERECHA: Formulario Solicitar Devolución --}}
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-xs sticky top-24">
            <h2 class="text-lg font-bold text-[#1b1b18] flex items-center gap-2">
                <span class="text-base">📄</span> Solicitar devolución
            </h2>
            <p class="text-xs text-[#706f6c] mb-6">Completa el formulario y te contactaremos en menos de 24 horas.</p>

            <form method="POST" action="/devoluciones" class="space-y-4">
                @csrf

                {{-- Número de Pedido --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        NÚMERO DE PEDIDO *
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 text-gray-400 font-bold text-sm">#</span>
                        <input type="text" name="numero_pedido" required placeholder="Ej: #0001"
                               class="w-full pl-9 pr-4 py-3 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] transition-all">
                    </div>
                </div>

                {{-- Tu Nombre --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        TU NOMBRE *
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input type="text" name="nombre" required value="{{ $usuario->nombre ?? '' }}" placeholder="Nombre completo"
                               class="w-full pl-10 pr-4 py-3 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] transition-all">
                    </div>
                </div>

                {{-- Correo Electrónico --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        CORREO ELECTRÓNICO *
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input type="email" name="email" required value="{{ $usuario->email ?? '' }}" placeholder="tu@correo.com"
                               class="w-full pl-10 pr-4 py-3 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] transition-all">
                    </div>
                </div>

                {{-- Producto a Devolver --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        PRODUCTO A DEVOLVER *
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </div>
                        <input type="text" name="producto" required placeholder="Nombre del producto"
                               class="w-full pl-10 pr-4 py-3 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] transition-all">
                    </div>
                </div>

                {{-- Tipo de Solicitud --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        TIPO DE SOLICITUD *
                    </label>
                    <select name="tipo_solicitud" required
                            class="w-full px-4 py-3 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] focus:outline-none focus:border-[#2c1a0e] transition-all cursor-pointer">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="Cambio de talla">Cambio de talla</option>
                        <option value="Reembolso">Reembolso</option>
                        <option value="Cambio de producto">Cambio de producto</option>
                        <option value="Crédito en tienda">Crédito en tienda</option>
                    </select>
                </div>

                {{-- Motivo --}}
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        MOTIVO *
                    </label>
                    <textarea name="motivo" rows="3" required placeholder="Describe el motivo de tu devolución..."
                              class="w-full p-4 bg-[#fcfbfa] border border-gray-200 rounded-2xl text-xs text-[#1b1b18] placeholder-gray-400 focus:outline-none focus:border-[#2c1a0e] transition-all"></textarea>
                </div>

                {{-- Botón Enviar --}}
                <button type="submit"
                        class="w-full py-3.5 px-6 text-xs font-bold text-white rounded-2xl shadow-sm hover:opacity-90 transition-all flex items-center justify-center gap-2"
                        style="background:#2c1a0e">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                    Enviar solicitud
                </button>
            </form>
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

@endsection

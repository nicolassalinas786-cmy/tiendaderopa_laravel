@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

    {{-- Encabezado + pasos --}}
    <div class="mb-8">
        <a href="/carrito" class="flex items-center gap-1.5 text-sm text-[#706f6c] hover:text-[#1b1b18] transition-colors mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Volver al carrito
        </a>

        {{-- Breadcrumb pasos --}}
        <div class="flex items-center gap-2 text-xs font-semibold">
            <span class="text-[#706f6c]">Carrito</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-[#2c1a0e] font-bold">Pago</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-[#706f6c]">Confirmación</span>
        </div>
    </div>

    <form method="POST" action="/pago/procesar" id="form-pago" novalidate>
        @csrf
        <input type="hidden" name="metodo_pago" id="input-metodo" value="{{ old('metodo_pago', '') }}">

        <div class="flex flex-col lg:flex-row gap-8">

            {{-- ── COLUMNA IZQUIERDA ─────────────────────────────────── --}}
            <div class="flex-1 space-y-6">

                {{-- ═══ DATOS DE ENVÍO ═══ --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-xs">
                    <h2 class="text-base font-bold text-[#1b1b18] mb-5 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#2c1a0e] text-white text-xs font-bold flex items-center justify-center">1</span>
                        Datos de envío
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Nombre completo *</label>
                            <input type="text" name="nombre_envio" value="{{ old('nombre_envio') }}"
                                placeholder="Ej: Juan Pérez"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('nombre_envio') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm text-[#1b1b18] focus:outline-none focus:ring-2 focus:ring-[#2c1a0e]/20 focus:border-[#2c1a0e] transition-all">
                            @error('nombre_envio')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Dirección de entrega *</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}"
                                placeholder="Calle, número, barrio"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('direccion') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm text-[#1b1b18] focus:outline-none focus:ring-2 focus:ring-[#2c1a0e]/20 focus:border-[#2c1a0e] transition-all">
                            @error('direccion')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Ciudad *</label>
                            <input type="text" name="ciudad" value="{{ old('ciudad') }}"
                                placeholder="Ej: Bogotá"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('ciudad') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm text-[#1b1b18] focus:outline-none focus:ring-2 focus:ring-[#2c1a0e]/20 focus:border-[#2c1a0e] transition-all">
                            @error('ciudad')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Teléfono de contacto *</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}"
                                placeholder="Ej: 3001234567"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('telefono') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm text-[#1b1b18] focus:outline-none focus:ring-2 focus:ring-[#2c1a0e]/20 focus:border-[#2c1a0e] transition-all">
                            @error('telefono')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- ═══ MÉTODO DE PAGO ═══ --}}
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-xs">
                    <h2 class="text-base font-bold text-[#1b1b18] mb-5 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#2c1a0e] text-white text-xs font-bold flex items-center justify-center">2</span>
                        Método de pago
                    </h2>

                    @error('metodo_pago')
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-xs text-red-600 font-semibold">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Selector de métodos --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">

                        {{-- Nequi --}}
                        <button type="button" onclick="seleccionarMetodo('nequi')" id="btn-nequi"
                            class="metodo-btn flex flex-col items-center gap-2 p-4 rounded-2xl border-2 border-gray-200 hover:border-[#7c3aed] transition-all group {{ old('metodo_pago') === 'nequi' ? 'border-[#7c3aed] bg-[#f5f3ff]' : '' }}">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm" style="background:#7c3aed">N</div>
                            <span class="text-xs font-bold text-[#1b1b18]">Nequi</span>
                        </button>

                        {{-- Bancolombia --}}
                        <button type="button" onclick="seleccionarMetodo('bancolombia')" id="btn-bancolombia"
                            class="metodo-btn flex flex-col items-center gap-2 p-4 rounded-2xl border-2 border-gray-200 hover:border-[#f59e0b] transition-all group {{ old('metodo_pago') === 'bancolombia' ? 'border-[#f59e0b] bg-[#fffbeb]' : '' }}">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm" style="background:#f59e0b">B</div>
                            <span class="text-xs font-bold text-[#1b1b18]">Bancolombia</span>
                        </button>

                        {{-- Tarjeta --}}
                        <button type="button" onclick="seleccionarMetodo('tarjeta')" id="btn-tarjeta"
                            class="metodo-btn flex flex-col items-center gap-2 p-4 rounded-2xl border-2 border-gray-200 hover:border-[#2563eb] transition-all group {{ old('metodo_pago') === 'tarjeta' ? 'border-[#2563eb] bg-[#eff6ff]' : '' }}">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm" style="background:#2563eb">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-[#1b1b18]">Tarjeta</span>
                        </button>

                        {{-- Efectivo --}}
                        <button type="button" onclick="seleccionarMetodo('efectivo')" id="btn-efectivo"
                            class="metodo-btn flex flex-col items-center gap-2 p-4 rounded-2xl border-2 border-gray-200 hover:border-[#16a34a] transition-all group {{ old('metodo_pago') === 'efectivo' ? 'border-[#16a34a] bg-[#f0fdf4]' : '' }}">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm" style="background:#16a34a">$</div>
                            <span class="text-xs font-bold text-[#1b1b18]">Efectivo</span>
                        </button>
                    </div>

                    {{-- ── Formulario Nequi ── --}}
                    <div id="form-nequi" class="metodo-form hidden space-y-4 border-t border-gray-100 pt-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white font-bold text-sm" style="background:#7c3aed">N</div>
                            <div>
                                <p class="text-sm font-bold text-[#1b1b18]">Pago con Nequi</p>
                                <p class="text-xs text-[#706f6c]">Recibirás una notificación en tu app Nequi para aprobar el pago.</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Número de celular Nequi *</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-[#706f6c]">🇨🇴 +57</span>
                                <input type="text" name="nequi_telefono" value="{{ old('nequi_telefono') }}"
                                    placeholder="3001234567" maxlength="10"
                                    class="w-full pl-20 pr-4 py-3 rounded-xl border {{ $errors->has('nequi_telefono') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-[#7c3aed]/20 focus:border-[#7c3aed] transition-all">
                            </div>
                            @error('nequi_telefono')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="bg-[#f5f3ff] rounded-xl p-4 text-xs text-[#7c3aed] font-medium">
                            📱 Asegúrate de tener la app Nequi instalada y saldo disponible en tu cuenta.
                        </div>
                    </div>

                    {{-- ── Formulario Bancolombia ── --}}
                    <div id="form-bancolombia" class="metodo-form hidden space-y-4 border-t border-gray-100 pt-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white font-bold text-sm" style="background:#f59e0b">B</div>
                            <div>
                                <p class="text-sm font-bold text-[#1b1b18]">Pago con Bancolombia (PSE)</p>
                                <p class="text-xs text-[#706f6c]">Transferencia directa desde tu cuenta Bancolombia.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Tipo de cuenta *</label>
                                <select name="banco_tipo_cuenta"
                                    class="w-full px-4 py-3 rounded-xl border {{ $errors->has('banco_tipo_cuenta') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm text-[#1b1b18] focus:outline-none focus:ring-2 focus:ring-[#f59e0b]/20 focus:border-[#f59e0b] transition-all bg-white">
                                    <option value="">Seleccionar...</option>
                                    <option value="ahorros" {{ old('banco_tipo_cuenta') === 'ahorros' ? 'selected' : '' }}>Cuenta de Ahorros</option>
                                    <option value="corriente" {{ old('banco_tipo_cuenta') === 'corriente' ? 'selected' : '' }}>Cuenta Corriente</option>
                                </select>
                                @error('banco_tipo_cuenta')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Número de cuenta *</label>
                                <input type="text" name="banco_numero" value="{{ old('banco_numero') }}"
                                    placeholder="Ej: 12345678901"
                                    class="w-full px-4 py-3 rounded-xl border {{ $errors->has('banco_numero') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-[#f59e0b]/20 focus:border-[#f59e0b] transition-all">
                                @error('banco_numero')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Nombre del titular *</label>
                                <input type="text" name="banco_titular" value="{{ old('banco_titular') }}"
                                    placeholder="Como aparece en la cuenta"
                                    class="w-full px-4 py-3 rounded-xl border {{ $errors->has('banco_titular') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-[#f59e0b]/20 focus:border-[#f59e0b] transition-all">
                                @error('banco_titular')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="bg-[#fffbeb] rounded-xl p-4 text-xs text-[#92400e] font-medium">
                            🏦 El débito se realizará en los próximos minutos. Recibirás confirmación por SMS.
                        </div>
                    </div>

                    {{-- ── Formulario Tarjeta ── --}}
                    <div id="form-tarjeta" class="metodo-form hidden space-y-4 border-t border-gray-100 pt-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white" style="background:#2563eb">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-[#1b1b18]">Tarjeta débito / crédito</p>
                                <p class="text-xs text-[#706f6c]">Visa, Mastercard, American Express</p>
                            </div>
                        </div>

                        {{-- Tarjeta visual --}}
                        <div class="relative h-44 rounded-2xl p-5 text-white overflow-hidden select-none" style="background: linear-gradient(135deg, #1e3a5f 0%, #2563eb 100%);">
                            <div class="absolute top-0 right-0 w-40 h-40 rounded-full opacity-10" style="background:white;transform:translate(30%,-30%)"></div>
                            <div class="absolute bottom-0 left-0 w-32 h-32 rounded-full opacity-10" style="background:white;transform:translate(-30%,30%)"></div>
                            <div class="flex justify-between items-start mb-6">
                                <span class="text-[10px] font-bold tracking-widest uppercase opacity-80">Salinas Original</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                </svg>
                            </div>
                            <p id="preview-numero" class="text-lg font-mono tracking-[0.3em] mb-3 opacity-90">•••• •••• •••• ••••</p>
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-[9px] uppercase opacity-60 mb-0.5">Titular</p>
                                    <p id="preview-nombre" class="text-xs font-semibold tracking-wide uppercase">NOMBRE APELLIDO</p>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase opacity-60 mb-0.5">Vence</p>
                                    <p id="preview-expiry" class="text-xs font-semibold">MM/AA</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Número de tarjeta *</label>
                                <input type="text" name="tarjeta_numero" id="inp-tarjeta-num" value="{{ old('tarjeta_numero') }}"
                                    placeholder="1234 5678 9012 3456" maxlength="19"
                                    oninput="formatTarjeta(this)"
                                    class="w-full px-4 py-3 rounded-xl border {{ $errors->has('tarjeta_numero') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#2563eb]/20 focus:border-[#2563eb] transition-all">
                                @error('tarjeta_numero')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Nombre en la tarjeta *</label>
                                <input type="text" name="tarjeta_nombre" id="inp-tarjeta-nom" value="{{ old('tarjeta_nombre') }}"
                                    placeholder="Como aparece en la tarjeta"
                                    oninput="document.getElementById('preview-nombre').textContent = this.value.toUpperCase() || 'NOMBRE APELLIDO'"
                                    class="w-full px-4 py-3 rounded-xl border {{ $errors->has('tarjeta_nombre') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb]/20 focus:border-[#2563eb] transition-all">
                                @error('tarjeta_nombre')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">Vencimiento *</label>
                                    <input type="text" name="tarjeta_expiry" id="inp-expiry" value="{{ old('tarjeta_expiry') }}"
                                        placeholder="MM/AA" maxlength="5"
                                        oninput="formatExpiry(this)"
                                        class="w-full px-4 py-3 rounded-xl border {{ $errors->has('tarjeta_expiry') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#2563eb]/20 focus:border-[#2563eb] transition-all">
                                    @error('tarjeta_expiry')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-[#706f6c] mb-1.5 uppercase tracking-wide">CVV *</label>
                                    <input type="password" name="tarjeta_cvv" value="{{ old('tarjeta_cvv') }}"
                                        placeholder="•••" maxlength="3"
                                        class="w-full px-4 py-3 rounded-xl border {{ $errors->has('tarjeta_cvv') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#2563eb]/20 focus:border-[#2563eb] transition-all">
                                    @error('tarjeta_cvv')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#eff6ff] rounded-xl p-4 text-xs text-[#1d4ed8] font-medium flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                            Tus datos están cifrados con SSL de 256 bits. No almacenamos tu número de tarjeta.
                        </div>
                    </div>

                    {{-- ── Formulario Efectivo ── --}}
                    <div id="form-efectivo" class="metodo-form hidden border-t border-gray-100 pt-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white font-bold" style="background:#16a34a">$</div>
                            <div>
                                <p class="text-sm font-bold text-[#1b1b18]">Pago contra entrega</p>
                                <p class="text-xs text-[#706f6c]">Pagas en efectivo cuando recibes tu pedido.</p>
                            </div>
                        </div>
                        <div class="bg-[#f0fdf4] rounded-2xl p-5 space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[#16a34a] text-white text-xs font-bold flex items-center justify-center flex-shrink-0 mt-0.5">1</span>
                                <p class="text-sm text-[#166534]">Confirma tu pedido y recibirás los detalles por WhatsApp.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[#16a34a] text-white text-xs font-bold flex items-center justify-center flex-shrink-0 mt-0.5">2</span>
                                <p class="text-sm text-[#166534]">El domiciliario llegará en <strong>1–3 días hábiles</strong>.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[#16a34a] text-white text-xs font-bold flex items-center justify-center flex-shrink-0 mt-0.5">3</span>
                                <p class="text-sm text-[#166534]">Ten el valor exacto listo: <strong id="efectivo-total">${{ number_format($total, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                        <div class="mt-4 bg-amber-50 rounded-xl p-3 text-xs text-amber-700 font-medium">
                            ⚠️ El pago contra entrega solo está disponible en ciudades principales de Colombia.
                        </div>
                    </div>

                </div>{{-- fin método de pago --}}

            </div>{{-- fin columna izquierda --}}

            {{-- ── COLUMNA DERECHA: Resumen ───────────────────────────── --}}
            <div class="lg:w-80 xl:w-96">
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-xs sticky top-24">
                    <h2 class="text-base font-bold text-[#1b1b18] mb-5">Resumen del pedido</h2>

                    {{-- Items --}}
                    <div class="space-y-3 mb-5 max-h-60 overflow-y-auto pr-1">
                        @foreach($items as $item)
                        <div class="flex gap-3 items-center">
                            <div class="w-12 h-12 rounded-xl overflow-hidden bg-[#f5efea] flex-shrink-0">
                                @if(!empty($item['img']))
                                    <img src="{{ $item['img'] }}" alt="{{ $item['nombre'] }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#c9b99a]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-[#1b1b18] truncate">{{ $item['nombre'] }}</p>
                                <p class="text-[11px] text-[#706f6c]">T: {{ $item['talla'] }} · Cant: {{ $item['cantidad'] }}</p>
                            </div>
                            <span class="text-xs font-bold text-[#1b1b18] flex-shrink-0">
                                ${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-100 pt-4 space-y-2.5 text-sm">
                        <div class="flex justify-between">
                            <span class="text-[#706f6c]">Subtotal ({{ $cuenta }} art.)</span>
                            <span class="font-semibold">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#706f6c]">Envío</span>
                            <span class="text-emerald-600 font-semibold">Gratis</span>
                        </div>
                        <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-base">
                            <span>Total</span>
                            <span class="text-[#2c1a0e]">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- Botón pagar --}}
                    <button type="submit" id="btn-pagar"
                        class="mt-6 w-full py-4 bg-[#2c1a0e] text-white text-sm font-bold rounded-2xl hover:bg-[#3d2510] transition-all shadow-sm flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                        <span id="btn-pagar-txt">Confirmar pedido</span>
                    </button>

                    <div class="mt-3 flex items-center justify-center gap-1.5 text-[11px] text-[#706f6c]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                        Pago 100% seguro · SSL
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>

@push('scripts')
<script>
// ── Colores por método ────────────────────────────────────────
const METODO_COLORS = {
    nequi:       { border: 'border-[#7c3aed]', bg: 'bg-[#f5f3ff]' },
    bancolombia: { border: 'border-[#f59e0b]', bg: 'bg-[#fffbeb]' },
    tarjeta:     { border: 'border-[#2563eb]', bg: 'bg-[#eff6ff]' },
    efectivo:    { border: 'border-[#16a34a]', bg: 'bg-[#f0fdf4]' },
};

const METODO_LABELS = {
    nequi: 'Pagar con Nequi',
    bancolombia: 'Pagar con Bancolombia',
    tarjeta: 'Pagar con Tarjeta',
    efectivo: 'Confirmar pedido',
};

function seleccionarMetodo(metodo) {
    // Actualizar input hidden
    document.getElementById('input-metodo').value = metodo;

    // Limpiar selección de botones
    document.querySelectorAll('.metodo-btn').forEach(btn => {
        btn.className = btn.className
            .replace(/border-\[#[^\]]+\]/g, 'border-gray-200')
            .replace(/bg-\[#[^\]]+\]/g, '');
    });

    // Activar botón seleccionado
    const btnActivo = document.getElementById('btn-' + metodo);
    const c = METODO_COLORS[metodo];
    btnActivo.classList.remove('border-gray-200');
    btnActivo.classList.add(c.border, c.bg);

    // Mostrar solo el formulario correcto
    document.querySelectorAll('.metodo-form').forEach(f => f.classList.add('hidden'));
    document.getElementById('form-' + metodo).classList.remove('hidden');

    // Actualizar texto del botón
    document.getElementById('btn-pagar-txt').textContent = METODO_LABELS[metodo] || 'Confirmar pedido';

    // Scroll suave al formulario en móvil
    if (window.innerWidth < 1024) {
        document.getElementById('form-' + metodo).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

// ── Formato número de tarjeta (grupos de 4) ───────────────────
function formatTarjeta(input) {
    let val = input.value.replace(/\D/g, '').slice(0, 16);
    input.value = val.replace(/(.{4})/g, '$1 ').trim();
    // Actualizar preview (sin espacios)
    const preview = val.padEnd(16, '•');
    const grupos = preview.match(/.{1,4}/g) || [];
    document.getElementById('preview-numero').textContent = grupos.join(' ');
    // Guardar solo dígitos en el campo real para validación del servidor
    input.dataset.raw = val;
}

// ── Formato vencimiento MM/AA ─────────────────────────────────
function formatExpiry(input) {
    let val = input.value.replace(/\D/g, '').slice(0, 4);
    if (val.length > 2) val = val.slice(0,2) + '/' + val.slice(2);
    input.value = val;
    document.getElementById('preview-expiry').textContent = val || 'MM/AA';
}

// ── Limpiar dígitos de tarjeta antes de enviar ────────────────
document.getElementById('form-pago').addEventListener('submit', function(e) {
    const metodo = document.getElementById('input-metodo').value;
    if (!metodo) {
        e.preventDefault();
        alert('Por favor selecciona un método de pago.');
        return;
    }
    // Quitar espacios del número de tarjeta
    const numInput = document.querySelector('[name="tarjeta_numero"]');
    if (numInput) numInput.value = numInput.value.replace(/\s/g, '');

    // Mostrar loading en botón
    const btn = document.getElementById('btn-pagar');
    btn.disabled = true;
    document.getElementById('btn-pagar-txt').textContent = 'Procesando...';
});

// ── Restaurar método seleccionado si hay errores de validación ─
const metodoPrevio = '{{ old("metodo_pago") }}';
if (metodoPrevio) {
    seleccionarMetodo(metodoPrevio);
}
</script>
@endpush

@endsection

@extends('layouts.app')

@section('content')

@php
$iconos = [
    'nequi'       => ['color' => '#7c3aed', 'bg' => '#f5f3ff', 'label' => 'Nequi',       'letra' => 'N'],
    'bancolombia' => ['color' => '#f59e0b', 'bg' => '#fffbeb', 'label' => 'Bancolombia', 'letra' => 'B'],
    'tarjeta'     => ['color' => '#2563eb', 'bg' => '#eff6ff', 'label' => 'Tarjeta',     'letra' => '💳'],
    'efectivo'    => ['color' => '#16a34a', 'bg' => '#f0fdf4', 'label' => 'Efectivo',    'letra' => '$'],
];
$metodoInfo = $iconos[$pedido['metodo_pago']] ?? $iconos['efectivo'];
@endphp

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-12">

    {{-- ═══ CHECKMARK ANIMADO ═══ --}}
    <div class="flex flex-col items-center text-center mb-10">
        <div class="relative mb-6">
            <div class="w-24 h-24 rounded-full flex items-center justify-center shadow-lg"
                 style="background: linear-gradient(135deg, #2c1a0e, #5c3d1e)">
                <svg id="check-svg" xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                     style="stroke-dasharray:50; stroke-dashoffset:50; animation: drawCheck 0.6s ease forwards 0.3s;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
            </div>
            {{-- Confeti circles --}}
            <span class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-emerald-400 animate-bounce" style="animation-delay:0.1s"></span>
            <span class="absolute top-0 -left-3 w-3 h-3 rounded-full bg-amber-400 animate-bounce" style="animation-delay:0.3s"></span>
            <span class="absolute -bottom-1 right-0 w-3 h-3 rounded-full bg-blue-400 animate-bounce" style="animation-delay:0.5s"></span>
        </div>

        <h1 class="text-2xl sm:text-3xl font-bold text-[#1b1b18] mb-2">¡Pedido confirmado!</h1>
        <p class="text-[#706f6c] text-sm max-w-sm">
            Tu pedido fue recibido correctamente. Te contactaremos al <strong>{{ $pedido['telefono'] }}</strong> para coordinar la entrega.
        </p>

        {{-- Referencia --}}
        <div class="mt-5 px-6 py-3 bg-[#f5efea] rounded-2xl border border-[#e8ddd0]">
            <p class="text-[10px] font-bold text-[#706f6c] uppercase tracking-widest mb-1">Número de pedido</p>
            <p class="text-xl font-bold text-[#2c1a0e] font-mono tracking-wider">{{ $pedido['referencia'] }}</p>
        </div>

        <p class="text-xs text-[#706f6c] mt-3">📅 {{ $pedido['fecha'] }}</p>
    </div>

    {{-- ═══ DETALLES DEL PEDIDO ═══ --}}
    <div class="space-y-4">

        {{-- Método de pago --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-xs">
            <h3 class="text-xs font-bold text-[#706f6c] uppercase tracking-widest mb-4">Método de pago</h3>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                     style="background:{{ $metodoInfo['color'] }}">
                    {{ $metodoInfo['letra'] }}
                </div>
                <div>
                    <p class="text-sm font-bold text-[#1b1b18]">{{ $metodoInfo['label'] }}</p>
                    @if($pedido['metodo_pago'] === 'nequi')
                        <p class="text-xs text-[#706f6c]">Notificación enviada a tu app Nequi</p>
                    @elseif($pedido['metodo_pago'] === 'bancolombia')
                        <p class="text-xs text-[#706f6c]">Débito procesado desde tu cuenta Bancolombia</p>
                    @elseif($pedido['metodo_pago'] === 'tarjeta')
                        <p class="text-xs text-[#706f6c]">Cargo realizado a tu tarjeta</p>
                    @else
                        <p class="text-xs text-[#706f6c]">Pagarás al recibir tu pedido</p>
                    @endif
                </div>
                <div class="ml-auto">
                    <span class="px-3 py-1 text-xs font-bold rounded-full text-white"
                          style="background:{{ $metodoInfo['color'] }}">
                        @if($pedido['metodo_pago'] === 'efectivo') Pendiente @else Aprobado @endif
                    </span>
                </div>
            </div>
        </div>

        {{-- Dirección de envío --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-xs">
            <h3 class="text-xs font-bold text-[#706f6c] uppercase tracking-widest mb-4">Dirección de entrega</h3>
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-xl bg-[#f5efea] flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#2c1a0e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-[#1b1b18]">{{ $pedido['nombre_envio'] }}</p>
                    <p class="text-xs text-[#706f6c]">{{ $pedido['direccion'] }}</p>
                    <p class="text-xs text-[#706f6c]">{{ $pedido['ciudad'] }}</p>
                    <p class="text-xs text-[#706f6c] mt-1">📞 {{ $pedido['telefono'] }}</p>
                </div>
                <div class="ml-auto flex items-center gap-1.5 text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                    Envío gratis
                </div>
            </div>
        </div>

        {{-- Productos --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-xs">
            <h3 class="text-xs font-bold text-[#706f6c] uppercase tracking-widest mb-4">
                Productos ({{ array_sum(array_map(fn($i) => $i['cantidad'], $pedido['items'])) }} artículos)
            </h3>
            <div class="space-y-3">
                @foreach($pedido['items'] as $item)
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-[#f5efea] flex-shrink-0">
                        @if(!empty($item['img']))
                            <img src="{{ $item['img'] }}" alt="{{ $item['nombre'] }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#c9b99a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-[#1b1b18] truncate">{{ $item['nombre'] }}</p>
                        <p class="text-[11px] text-[#706f6c]">Talla {{ $item['talla'] }} · {{ $item['cantidad'] }} unid.</p>
                    </div>
                    <span class="text-xs font-bold text-[#1b1b18]">
                        ${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}
                    </span>
                </div>
                @endforeach
            </div>

            {{-- Total --}}
            <div class="border-t border-gray-100 mt-4 pt-4 flex justify-between items-center">
                <span class="text-sm font-bold text-[#1b1b18]">Total pagado</span>
                <span class="text-lg font-bold text-[#2c1a0e]">${{ number_format($pedido['total'], 0, ',', '.') }}</span>
            </div>
        </div>

        {{-- Timeline de entrega --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-xs">
            <h3 class="text-xs font-bold text-[#706f6c] uppercase tracking-widest mb-4">Estado del pedido</h3>
            <div class="space-y-0">

                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#2c1a0e] flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                            </svg>
                        </div>
                        <div class="w-0.5 h-8 bg-gray-200 mt-1"></div>
                    </div>
                    <div class="pb-6">
                        <p class="text-sm font-bold text-[#1b1b18]">Pedido confirmado</p>
                        <p class="text-xs text-[#706f6c]">{{ $pedido['fecha'] }}</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-amber-100 border-2 border-amber-300 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25"/>
                            </svg>
                        </div>
                        <div class="w-0.5 h-8 bg-gray-200 mt-1"></div>
                    </div>
                    <div class="pb-6">
                        <p class="text-sm font-bold text-[#1b1b18]">En preparación</p>
                        <p class="text-xs text-[#706f6c]">Alistando tu pedido</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-gray-100 border-2 border-gray-200 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                            </svg>
                        </div>
                        <div class="w-0.5 h-8 bg-gray-200 mt-1"></div>
                    </div>
                    <div class="pb-6">
                        <p class="text-sm font-semibold text-gray-400">En camino</p>
                        <p class="text-xs text-gray-300">1–3 días hábiles</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-gray-100 border-2 border-gray-200 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-400">Entregado</p>
                        <p class="text-xs text-gray-300">Estimado: 3 días hábiles</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- Botones de acción --}}
    <div class="flex flex-col sm:flex-row gap-3 mt-8">
        <a href="/"
           class="flex-1 py-3.5 text-center text-sm font-bold text-[#2c1a0e] border-2 border-[#2c1a0e] rounded-2xl hover:bg-[#f5efea] transition-colors">
            Volver al inicio
        </a>
        <a href="/catalogo"
           class="flex-1 py-3.5 text-center text-sm font-bold text-white bg-[#2c1a0e] rounded-2xl hover:bg-[#3d2510] transition-colors shadow-sm">
            Seguir comprando
        </a>
    </div>

    {{-- Nota de contacto --}}
    <div class="mt-6 text-center text-xs text-[#706f6c]">
        ¿Tienes dudas sobre tu pedido? Escríbenos al WhatsApp o al correo
        <a href="mailto:soporte@salinasoriginal.com" class="text-[#2c1a0e] font-semibold hover:underline">soporte@salinasoriginal.com</a>
    </div>

</div>

@endsection

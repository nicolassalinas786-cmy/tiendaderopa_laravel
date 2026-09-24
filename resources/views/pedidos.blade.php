@extends('layouts.app')

@section('content')
<div class="relative min-h-[calc(100vh-4rem)] bg-[#f7f6f3]">

    {{-- Fondo Catálogo difuminado para simular el modal flotando sobre la tienda --}}
    <div class="max-w-7xl mx-auto px-6 py-8 opacity-30 pointer-events-none blur-xs">
        <div class="flex items-start justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold font-serif text-[#1b1b18]">Catálogo Completo</h1>
                <p class="text-xs text-[#706f6c]">Explora toda nuestra colección por categoría</p>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <div class="h-64 bg-gray-200 rounded-2xl"></div>
            <div class="h-64 bg-gray-200 rounded-2xl"></div>
            <div class="h-64 bg-gray-200 rounded-2xl"></div>
            <div class="h-64 bg-gray-200 rounded-2xl"></div>
        </div>
    </div>

    {{-- ═══ MODAL MIS PEDIDOS ═══ --}}
    <div class="fixed inset-0 bg-black/40 backdrop-blur-xs flex items-center justify-center z-50 p-4">
        
        <div class="bg-white rounded-3xl max-w-lg w-full max-h-[85vh] overflow-y-auto shadow-2xl border border-gray-100 p-6 relative animate-in fade-in zoom-in duration-200">
            
            {{-- Encabezado Modal --}}
            <div class="flex items-center justify-between pb-4 mb-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-[#2c1a0e]/10 flex items-center justify-center text-[#2c1a0e]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-[#1b1b18]">Mis Pedidos</h2>
                </div>

                {{-- Botón Cerrar ✕ --}}
                <a href="/catalogo" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

            {{-- Lista de Pedidos --}}
            <div class="space-y-4">
                @foreach($pedidos as $p)
                    @php
                        $estadoSlug = strtolower(str_replace(' ', '', $p['estado']));
                        $badgeClasses = match($estadoSlug) {
                            'entregado'  => 'bg-[#dcfce7] text-[#15803d]',
                            'encamino'   => 'bg-[#dbeafe] text-[#1d4ed8]',
                            'pendiente'  => 'bg-[#fef9c3] text-[#a16207]',
                            'procesando' => 'bg-[#f3e8ff] text-[#7e22ce]',
                            default      => 'bg-gray-100 text-gray-700'
                        };
                    @endphp

                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-2xs hover:border-gray-200 transition-all">
                        
                        {{-- Fila Superior: Ícono + ID + Fecha + Badge --}}
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                {{-- Ícono según estado --}}
                                @if($p['icono'] == 'check')
                                    <div class="w-7 h-7 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                @elseif($p['icono'] == 'truck')
                                    <div class="w-7 h-7 rounded-full bg-blue-500 text-white flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124l-.847-13.5a1.125 1.125 0 00-1.119-1.051H16.5" />
                                        </svg>
                                    </div>
                                @elseif($p['icono'] == 'clock')
                                    <div class="w-7 h-7 rounded-full bg-amber-500 text-white flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-7 h-7 rounded-full bg-purple-500 text-white flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </div>
                                @endif

                                <div>
                                    <h3 class="font-bold text-base text-[#1b1b18] leading-tight">{{ $p['id'] }}</h3>
                                    <p class="text-xs text-gray-400">{{ $p['fecha'] }}</p>
                                </div>
                            </div>

                            {{-- Badge Estado --}}
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $badgeClasses }}">
                                {{ strtolower($p['estado']) }}
                            </span>
                        </div>

                        {{-- Fila Media: Icono Paquete + Productos --}}
                        <div class="flex items-center gap-2 text-xs font-medium text-[#706f6c] my-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            <span>{{ $p['productos'] }}</span>
                        </div>

                        {{-- Fila Inferior: Total + Nombre Cliente --}}
                        <div class="flex items-center justify-between pt-2 border-t border-gray-50">
                            <span class="font-bold text-base text-[#1b1b18]">{{ $p['total'] }}</span>
                            <span class="text-xs text-gray-400 font-medium">{{ $p['cliente'] }}</span>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </div>

</div>
@endsection

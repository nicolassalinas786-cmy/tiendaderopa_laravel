@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Saludo --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#1b1b18]">
            Hola, {{ Auth::user()->nombre }} 👋
        </h1>
        <p class="text-[#706f6c] mt-1">Bienvenido a tu panel de cliente</p>
    </div>

    {{-- Cards resumen --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs text-[#706f6c] uppercase tracking-widest mb-1">Mis Pedidos</p>
            <p class="text-3xl font-bold text-[#2c1a0e]">2</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs text-[#706f6c] uppercase tracking-widest mb-1">Favoritos</p>
            <p class="text-3xl font-bold text-[#2c1a0e]">5</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs text-[#706f6c] uppercase tracking-widest mb-1">Devoluciones</p>
            <p class="text-3xl font-bold text-[#2c1a0e]">0</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs text-[#706f6c] uppercase tracking-widest mb-1">Total gastado</p>
            <p class="text-3xl font-bold text-[#2c1a0e]">$0</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Mis pedidos --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-bold text-[#1b1b18] mb-4 flex items-center gap-2">
                📦 Mis pedidos recientes
            </h2>
            <div class="text-center py-8 text-gray-400 text-sm">
                Aún no tienes pedidos.<br>
                <a href="/" class="text-[#2c1a0e] font-semibold hover:underline mt-2 inline-block">Ver catálogo →</a>
            </div>
        </div>

        {{-- Mi cuenta --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-bold text-[#1b1b18] mb-4 flex items-center gap-2">
                👤 Mi cuenta
            </h2>
            <div class="space-y-3">
                <div class="flex justify-between text-sm py-2 border-b border-gray-100">
                    <span class="text-[#706f6c]">Nombre</span>
                    <span class="font-medium text-[#1b1b18]">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                </div>
                <div class="flex justify-between text-sm py-2 border-b border-gray-100">
                    <span class="text-[#706f6c]">Correo</span>
                    <span class="font-medium text-[#1b1b18]">{{ Auth::user()->correo }}</span>
                </div>
                <div class="flex justify-between text-sm py-2 border-b border-gray-100">
                    <span class="text-[#706f6c]">Teléfono</span>
                    <span class="font-medium text-[#1b1b18]">{{ Auth::user()->telefono ?? 'No registrado' }}</span>
                </div>
                <div class="flex justify-between text-sm py-2">
                    <span class="text-[#706f6c]">Rol</span>
                    <span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-bold rounded-full">Cliente</span>
                </div>
            </div>
            <button class="mt-4 w-full py-2.5 border border-[#2c1a0e] text-[#2c1a0e] text-sm font-semibold rounded-xl hover:bg-[#f0ece6] transition-colors">
                Editar perfil
            </button>
        </div>
    </div>

    {{-- Cerrar sesión --}}
    <div class="mt-6 flex justify-end">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="flex items-center gap-2 px-5 py-2.5 bg-red-50 text-red-600 text-sm font-semibold rounded-xl hover:bg-red-100 transition-colors border border-red-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                Cerrar sesión
            </button>
        </form>
    </div>

</div>
@endsection

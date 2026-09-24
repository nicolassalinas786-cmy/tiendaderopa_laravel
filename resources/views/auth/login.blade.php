<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar — Salinas Original</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body>

    {{-- Fondo degradado marrón --}}
    <div class="min-h-screen flex items-center justify-center p-4"
         style="background: radial-gradient(ellipse at top right, #c49a6c 0%, #7a4f2e 40%, #3b2212 100%);">

        {{-- Card principal --}}
        <div class="w-full max-w-sm rounded-3xl overflow-hidden shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.45);">

            {{-- Parte superior oscura --}}
            <div class="px-8 pt-6 pb-10 flex flex-col items-center" style="background-color: #2c1a0e;">

                {{-- Volver --}}
                <div class="w-full mb-4">
                    <a href="/" class="flex items-center gap-1.5 text-white/60 hover:text-white/90 text-sm transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Volver
                    </a>
                </div>

                {{-- Logo S --}}
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-4"
                     style="background-color: #3d2410;">
                    <span class="text-white font-bold text-2xl" style="font-family: 'Playfair Display', serif;">S</span>
                </div>

                {{-- Nombre marca --}}
                <p class="text-white font-extrabold text-xl tracking-[0.15em] uppercase" style="font-family: 'Playfair Display', serif;">
                    SALINAS
                </p>
                <p class="text-white/50 text-xs tracking-[0.3em] uppercase mt-0.5">
                    ORIGINAL
                </p>
            </div>

            {{-- Parte blanca: formulario --}}
            <div class="bg-white px-8 py-8">

                <h2 class="text-xl font-bold text-[#1b1b18] mb-1">Bienvenido</h2>
                <p class="text-sm text-gray-400 mb-6">Ingresa tus datos para continuar</p>

                {{-- Error --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
                        <p class="text-sm text-red-500">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-4">
                    @csrf

                    {{-- Correo --}}
                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">
                            Correo Electrónico
                        </label>
                        <div class="flex items-center gap-3 bg-[#f5f4f2] rounded-xl px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="tu@correo.com"
                                required
                                class="flex-1 bg-transparent text-sm text-[#1b1b18] placeholder-gray-400 focus:outline-none"
                            />
                        </div>
                    </div>

                    {{-- Contraseña --}}
                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">
                            Contraseña
                        </label>
                        <div class="flex items-center gap-3 bg-[#f5f4f2] rounded-xl px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <input
                                type="password"
                                name="password"
                                id="pwd"
                                placeholder="••••••••"
                                required
                                class="flex-1 bg-transparent text-sm text-[#1b1b18] placeholder-gray-400 focus:outline-none"
                            />
                            <button type="button" onclick="togglePwd()" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Botón Ingresar --}}
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl text-white text-sm font-semibold tracking-wide transition-all active:scale-[0.98] mt-2"
                        style="background-color: #2c1a0e;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Ingresar
                    </button>
                </form>

                {{-- Link registro --}}
                <p class="text-center text-sm text-gray-400 mt-5">
                    ¿Primera vez?
                    <a href="/register" class="text-[#2c1a0e] font-semibold hover:underline">Crea tu cuenta</a>
                </p>

            </div>
        </div>
    </div>

    <script>
        function togglePwd() {
            const pwd = document.getElementById('pwd');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>

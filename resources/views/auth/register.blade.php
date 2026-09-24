<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse — Salinas Original</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .step-line { transition: background 0.4s ease; }
        .input-box { display: flex; align-items: center; gap: 10px; background: #f5f4f2; border-radius: 12px; padding: 12px 16px; }
        .input-box input { flex: 1; background: transparent; border: none; outline: none; font-size: 14px; color: #1b1b18; }
        .input-box input::placeholder { color: #aaa; }
    </style>
</head>
<body>

<div class="min-h-screen flex items-center justify-center p-4"
     style="background: radial-gradient(ellipse at top right, #c49a6c 0%, #7a4f2e 40%, #3b2212 100%);">

    <div class="w-full max-w-sm rounded-3xl overflow-hidden shadow-2xl" style="box-shadow: 0 25px 60px rgba(0,0,0,0.45);">

        {{-- Header oscuro --}}
        <div class="px-8 pt-6 pb-10 flex flex-col items-center" style="background-color: #2c1a0e;">
            <div class="w-full mb-4">
                <a href="/" class="flex items-center gap-1.5 text-white/60 hover:text-white/90 text-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Volver
                </a>
            </div>
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-4" style="background-color: #3d2410;">
                <span class="text-white font-bold text-2xl" style="font-family: 'Playfair Display', serif;">S</span>
            </div>
            <p class="text-white font-extrabold text-xl tracking-[0.15em] uppercase" style="font-family: 'Playfair Display', serif;">SALINAS</p>
            <p class="text-white/50 text-xs tracking-[0.3em] uppercase mt-0.5">ORIGINAL</p>
        </div>

        {{-- Cuerpo blanco --}}
        <div class="bg-white px-8 py-8">

            <h2 class="text-xl font-bold text-[#1b1b18] mb-1">Crea tu cuenta</h2>
            <p class="text-sm text-gray-400 mb-6">Completa los datos para registrarte</p>

            {{-- Indicador de pasos --}}
            <div class="flex items-center mb-2">
                {{-- Paso 1 --}}
                <div id="dot-1" class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold text-white shrink-0 transition-all"
                     style="background-color: #2c1a0e;">1</div>
                <div id="line-1" class="flex-1 h-0.5 mx-1 step-line" style="background-color: #e5e7eb;"></div>
                {{-- Paso 2 --}}
                <div id="dot-2" class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold shrink-0 transition-all"
                     style="background-color: #e5e7eb; color: #9ca3af;">2</div>
                <div id="line-2" class="flex-1 h-0.5 mx-1 step-line" style="background-color: #e5e7eb;"></div>
                {{-- Paso 3 --}}
                <div id="dot-3" class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold shrink-0 transition-all"
                     style="background-color: #e5e7eb; color: #9ca3af;">3</div>
            </div>
            <p id="step-label" class="text-xs text-gray-400 mb-5">Paso 1 de 3 — Datos personales</p>

            {{-- Errores Laravel --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-500">• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="/register" id="reg-form">
                @csrf

                {{-- ══════════ PASO 1: Datos personales ══════════ --}}
                <div id="step-1" class="space-y-4">
                    {{-- Nombre + Apellido --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Nombre</label>
                            <div class="input-box">
                                <input type="text" name="nombre" id="f-nombre" value="{{ old('nombre') }}" placeholder="Carlos" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Apellido</label>
                            <div class="input-box">
                                <input type="text" name="apellido" id="f-apellido" value="{{ old('apellido') }}" placeholder="García" />
                            </div>
                        </div>
                    </div>

                    {{-- Correo --}}
                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Correo Electrónico</label>
                        <div class="input-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <input type="email" name="email" id="f-email" value="{{ old('email') }}" placeholder="tu@correo.com" />
                        </div>
                    </div>

                    {{-- Teléfono --}}
                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Teléfono</label>
                        <div class="input-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <input type="tel" name="telefono" id="f-telefono" value="{{ old('telefono') }}" placeholder="+57 300 123 4567" />
                        </div>
                    </div>

                    <button type="button" onclick="goStep(2)"
                        class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl text-white text-sm font-semibold tracking-wide transition-all active:scale-[0.98] mt-2"
                        style="background-color: #2c1a0e;">
                        Continuar →
                    </button>
                </div>

                {{-- ══════════ PASO 2: Contraseña ══════════ --}}
                <div id="step-2" class="space-y-4 hidden">

                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Contraseña</label>
                        <div class="input-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <input type="password" name="password" id="pwd1" placeholder="Mínimo 8 caracteres" />
                            <button type="button" onclick="togglePwd('pwd1')" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-semibold tracking-widest uppercase text-gray-500 mb-2">Confirmar Contraseña</label>
                        <div class="input-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                            <input type="password" name="password_confirmation" id="pwd2" placeholder="Repite tu contraseña" />
                            <button type="button" onclick="togglePwd('pwd2')" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Indicador fuerza contraseña --}}
                    <div>
                        <div class="flex gap-1 mb-1">
                            <div id="str-1" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                            <div id="str-2" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                            <div id="str-3" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                            <div id="str-4" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                        </div>
                        <p id="str-label" class="text-[10px] text-gray-400">Ingresa una contraseña</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="goStep(1)"
                            class="flex-1 py-3.5 rounded-xl text-sm font-semibold border transition-all"
                            style="border-color: #2c1a0e; color: #2c1a0e;">
                            ← Atrás
                        </button>
                        <button type="button" onclick="goStep(3)"
                            class="flex-1 py-3.5 rounded-xl text-white text-sm font-semibold transition-all active:scale-[0.98]"
                            style="background-color: #2c1a0e;">
                            Continuar →
                        </button>
                    </div>
                </div>

                {{-- ══════════ PASO 3: Confirmación ══════════ --}}
                <div id="step-3" class="space-y-4 hidden">

                    {{-- Resumen --}}
                    <div class="bg-[#f5f4f2] rounded-2xl p-4 space-y-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Resumen</p>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Nombre</span>
                            <span id="sum-nombre" class="font-medium text-[#1b1b18]">—</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Correo</span>
                            <span id="sum-email" class="font-medium text-[#1b1b18] text-right max-w-[180px] truncate">—</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Teléfono</span>
                            <span id="sum-telefono" class="font-medium text-[#1b1b18]">—</span>
                        </div>
                    </div>

                    {{-- Términos --}}
                    <div class="flex items-start gap-2">
                        <input type="checkbox" name="terminos" id="terminos" required
                            class="w-4 h-4 mt-0.5 rounded border-gray-300 accent-[#2c1a0e]">
                        <label for="terminos" class="text-xs text-gray-500">
                            Acepto los <a href="#" class="text-[#2c1a0e] font-semibold hover:underline">términos y condiciones</a> de Salinas Original
                        </label>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="goStep(2)"
                            class="flex-1 py-3.5 rounded-xl text-sm font-semibold border transition-all"
                            style="border-color: #2c1a0e; color: #2c1a0e;">
                            ← Atrás
                        </button>
                        <button type="submit"
                            class="flex-1 flex items-center justify-center gap-2 py-3.5 rounded-xl text-white text-sm font-semibold transition-all active:scale-[0.98]"
                            style="background-color: #2c1a0e;">
                            Crear cuenta
                        </button>
                    </div>
                </div>

            </form>

            <p class="text-center text-sm text-gray-400 mt-5">
                ¿Ya tienes cuenta?
                <a href="/login" class="text-[#2c1a0e] font-semibold hover:underline">Ingresar</a>
            </p>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;

    const labels = [
        '',
        'Paso 1 de 3 — Datos personales',
        'Paso 2 de 3 — Contraseña',
        'Paso 3 de 3 — Confirmación',
    ];

    function goStep(n) {
        // Validar antes de avanzar
        if (n > currentStep) {
            if (currentStep === 1 && !validateStep1()) return;
            if (currentStep === 2 && !validateStep2()) return;
        }

        // Llenar resumen al llegar al paso 3
        if (n === 3) fillSummary();

        // Ocultar paso actual, mostrar nuevo
        document.getElementById('step-' + currentStep).classList.add('hidden');
        document.getElementById('step-' + n).classList.remove('hidden');
        currentStep = n;

        // Actualizar dots y líneas
        for (let i = 1; i <= 3; i++) {
            const dot = document.getElementById('dot-' + i);
            if (i < n) {
                // Completado
                dot.style.backgroundColor = '#2c1a0e';
                dot.style.color = '#fff';
                dot.innerHTML = '✓';
            } else if (i === n) {
                // Activo
                dot.style.backgroundColor = '#2c1a0e';
                dot.style.color = '#fff';
                dot.innerHTML = i;
            } else {
                // Pendiente
                dot.style.backgroundColor = '#e5e7eb';
                dot.style.color = '#9ca3af';
                dot.innerHTML = i;
            }
        }

        // Líneas
        for (let i = 1; i <= 2; i++) {
            const line = document.getElementById('line-' + i);
            line.style.backgroundColor = i < n ? '#2c1a0e' : '#e5e7eb';
        }

        document.getElementById('step-label').textContent = labels[n];
    }

    function validateStep1() {
        const nombre   = document.getElementById('f-nombre').value.trim();
        const apellido = document.getElementById('f-apellido').value.trim();
        const email    = document.getElementById('f-email').value.trim();
        if (!nombre)   { alert('Ingresa tu nombre.'); return false; }
        if (!apellido) { alert('Ingresa tu apellido.'); return false; }
        if (!email || !email.includes('@')) { alert('Ingresa un correo válido.'); return false; }
        return true;
    }

    function validateStep2() {
        const pwd1 = document.getElementById('pwd1').value;
        const pwd2 = document.getElementById('pwd2').value;
        if (pwd1.length < 8) { alert('La contraseña debe tener al menos 8 caracteres.'); return false; }
        if (pwd1 !== pwd2)   { alert('Las contraseñas no coinciden.'); return false; }
        return true;
    }

    function fillSummary() {
        const nombre   = document.getElementById('f-nombre').value.trim();
        const apellido = document.getElementById('f-apellido').value.trim();
        const email    = document.getElementById('f-email').value.trim();
        const tel      = document.getElementById('f-telefono').value.trim();
        document.getElementById('sum-nombre').textContent   = nombre + ' ' + apellido;
        document.getElementById('sum-email').textContent    = email;
        document.getElementById('sum-telefono').textContent = tel || '—';
    }

    // Fuerza de contraseña
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('pwd1').addEventListener('input', function() {
            const val = this.value;
            let score = 0;
            if (val.length >= 8)          score++;
            if (/[A-Z]/.test(val))        score++;
            if (/[0-9]/.test(val))        score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colors = ['', '#ef4444', '#f97316', '#eab308', '#22c55e'];
            const texts  = ['', 'Muy débil', 'Débil', 'Buena', 'Fuerte'];
            for (let i = 1; i <= 4; i++) {
                document.getElementById('str-' + i).style.backgroundColor = i <= score ? colors[score] : '#e5e7eb';
            }
            document.getElementById('str-label').textContent = val.length ? texts[score] : 'Ingresa una contraseña';
            document.getElementById('str-label').style.color = val.length ? colors[score] : '#9ca3af';
        });
    });

    function togglePwd(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Salinas Original') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#f7f6f3] min-h-screen antialiased">

    {{-- NAVBAR --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between gap-4">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2 shrink-0">
                <div class="w-9 h-9 bg-[#2c2416] rounded-lg flex items-center justify-center text-white font-bold text-base">S</div>
                <div class="leading-tight">
                    <div class="font-bold text-[#1b1b18] text-sm tracking-wide uppercase">Salinas</div>
                    <div class="text-[10px] text-[#706f6c] tracking-widest uppercase" style="margin-top:-2px">Original</div>
                </div>
            </a>

            {{-- Nav Links --}}
            <nav class="hidden md:flex items-center gap-1">
                <a href="/" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('/') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Inicio</a>
                <a href="/catalogo" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('catalogo*') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Catálogo</a>
                <a href="/pedidos" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('pedidos*') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Mis pedidos</a>
                <a href="/favoritos" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('favoritos*') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Favoritos</a>
                <a href="/ofertas" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('ofertas*') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Ofertas</a>
                <a href="/devoluciones" class="px-3 py-2 text-sm font-medium transition-colors border-b-2 {{ request()->is('devoluciones*') ? 'text-[#1b1b18] font-bold border-[#2c2416]' : 'text-[#706f6c] border-transparent hover:text-[#1b1b18]' }}">Devoluciones</a>
            </nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-3 shrink-0">

                {{-- Carrito --}}
                <button onclick="toggleCarritoDrawer()" class="relative w-9 h-9 flex items-center justify-center text-[#1b1b18] hover:bg-gray-100 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                    </svg>
                    {{-- Badge contador --}}
                    <span id="carrito-badge"
                          class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm
                          {{ (session('carrito') && array_sum(array_map(fn($i) => $i['cantidad'], session('carrito')))) > 0 ? '' : 'hidden' }}">
                        {{ session('carrito') ? array_sum(array_map(fn($i) => $i['cantidad'], session('carrito'))) : 0 }}
                    </span>
                </button>

                @auth
                    {{-- Usuario logueado --}}
                    <div class="flex items-center gap-2 pl-3 border-l border-gray-200">
                        {{-- Avatar --}}
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0"
                             style="background-color:#2c1a0e">
                            {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
                        </div>
                        <div class="hidden sm:block leading-tight">
                            <a href="{{ Auth::user()->esAdmin() ? '/admin' : '/mi-cuenta' }}"
                               class="text-xs font-semibold text-[#1b1b18] hover:underline">
                                {{ Auth::user()->nombre }}
                            </a>
                            <div class="text-[10px] {{ Auth::user()->esAdmin() ? 'text-orange-500' : 'text-[#706f6c]' }}">
                                {{ Auth::user()->esAdmin() ? 'Administrador' : 'Cliente' }}
                            </div>
                        </div>
                        {{-- Logout --}}
                        <form method="POST" action="/logout" class="ml-1">
                            @csrf
                            <button type="submit" class="w-8 h-8 flex items-center justify-center text-[#706f6c] hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    {{-- Sin sesión --}}
                    <div class="flex items-center gap-2">
                        <a href="/login"
                           class="flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-[#2c2416] border border-[#2c2416] rounded-lg hover:bg-[#f0ece6] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Ingresar
                        </a>
                        <a href="/register"
                           class="flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-[#2c2416] rounded-lg hover:bg-[#3d3020] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                            Registrarse
                        </a>
                    </div>
                @endauth

            </div>
        </div>
    </header>

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- ═══════════════════════════════════════════════════
         CHAT IA SOFÍA
    ═══════════════════════════════════════════════════ --}}

    {{-- Botón flotante --}}
    <button id="sofia-btn" onclick="toggleChat()"
        class="fixed bottom-6 right-6 w-14 h-14 text-white rounded-full shadow-xl flex items-center justify-center hover:scale-105 transition-all z-50"
        style="background-color:#2c1a0e;">
        <svg id="sofia-icon-chat" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
        </svg>
        <svg id="sofia-icon-close" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        {{-- Punto verde online --}}
        <span class="absolute top-0.5 right-0.5 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
    </button>

    {{-- Ventana del chat --}}
    <div id="sofia-chat"
         class="fixed bottom-24 right-6 w-80 rounded-3xl overflow-hidden shadow-2xl z-50 hidden flex-col"
         style="max-height:520px; box-shadow:0 20px 60px rgba(0,0,0,0.3);">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 py-3" style="background-color:#2c1a0e;">
            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0" style="background-color:#3d2410;">S</div>
            <div class="flex-1 min-w-0">
                <p class="text-white font-bold text-sm">Sofía — Asistente</p>
                <p class="text-green-400 text-xs flex items-center gap-1">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full inline-block"></span>
                    En línea ahora
                </p>
            </div>
            <button onclick="toggleChat()" class="text-white/60 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mensajes --}}
        <div id="sofia-messages" class="flex-1 overflow-y-auto p-4 space-y-3" style="background:#f7f6f3; min-height:260px; max-height:300px;">
            {{-- Mensaje inicial de Sofía --}}
            <div class="flex items-start gap-2">
                <div class="w-7 h-7 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 mt-0.5" style="background-color:#2c1a0e;">S</div>
                <div class="bg-white rounded-2xl rounded-tl-sm px-3 py-2.5 shadow-sm max-w-[85%]">
                    <p class="text-sm text-[#1b1b18]">👋 ¡Hola! Soy <strong>Sofía</strong>.<br>¿En qué te puedo ayudar hoy?</p>
                </div>
            </div>
        </div>

        {{-- Chips rápidos --}}
        <div class="px-3 py-2 flex gap-2 overflow-x-auto" style="background:#f7f6f3; border-top:1px solid #e5e7eb;">
            <button onclick="chipClick('pedido')"  class="shrink-0 text-xs px-3 py-1.5 rounded-full border border-gray-300 bg-white hover:border-[#2c1a0e] transition-colors whitespace-nowrap">🚚 Envíos</button>
            <button onclick="chipClick('talla')"   class="shrink-0 text-xs px-3 py-1.5 rounded-full border border-gray-300 bg-white hover:border-[#2c1a0e] transition-colors whitespace-nowrap">📏 Tallas</button>
            <button onclick="chipClick('pago')"    class="shrink-0 text-xs px-3 py-1.5 rounded-full border border-gray-300 bg-white hover:border-[#2c1a0e] transition-colors whitespace-nowrap">💳 Pagos</button>
            <button onclick="chipClick('devolucion')" class="shrink-0 text-xs px-3 py-1.5 rounded-full border border-gray-300 bg-white hover:border-[#2c1a0e] transition-colors whitespace-nowrap">↩️ Dev.</button>
            <button onclick="chipClick('pedido')"  class="shrink-0 text-xs px-3 py-1.5 rounded-full border border-gray-300 bg-white hover:border-[#2c1a0e] transition-colors whitespace-nowrap">📦 Pedido</button>
        </div>

        {{-- Input --}}
        <div class="flex items-center gap-2 px-3 py-3 bg-white border-t border-gray-100">
            <input id="sofia-input" type="text" placeholder="Escribe tu pregunta..."
                class="flex-1 text-sm text-[#1b1b18] placeholder-gray-400 focus:outline-none"
                onkeydown="if(event.key==='Enter') enviarMensaje()"/>
            <button onclick="enviarMensaje()"
                class="w-9 h-9 rounded-xl flex items-center justify-center text-white shrink-0 hover:opacity-90 transition-all"
                style="background-color:#2c1a0e;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                </svg>
            </button>
        </div>
    </div>

    <script>
    // ── Toggle chat ──────────────────────────────────────────
    function toggleChat() {
        const chat  = document.getElementById('sofia-chat');
        const ico1  = document.getElementById('sofia-icon-chat');
        const ico2  = document.getElementById('sofia-icon-close');
        const open  = chat.classList.contains('hidden');
        chat.classList.toggle('hidden', !open);
        chat.classList.toggle('flex', open);
        ico1.classList.toggle('hidden', open);
        ico2.classList.toggle('hidden', !open);
        if (open) setTimeout(() => document.getElementById('sofia-input').focus(), 100);
    }

    // ── Base de conocimiento ─────────────────────────────────
    const respuestas = [
        {
            claves: ['pedido', 'compra', 'orden', 'mis pedidos', 'ver pedido'],
            respuesta: `📦 <strong>Tus pedidos:</strong><br><br>
                <div style="background:#f0ece6;border-radius:12px;padding:10px;font-size:12px;line-height:1.6;">
                  🔸 <strong>#1042</strong> — Buzo Oversized Negro<br>
                  &nbsp;&nbsp;&nbsp;Estado: <span style="color:#f97316;font-weight:600;">En camino 🚚</span><br>
                  &nbsp;&nbsp;&nbsp;Llega: 13 ago · $89.900<br><br>
                  🔸 <strong>#1038</strong> — Chaqueta Denim Azul<br>
                  &nbsp;&nbsp;&nbsp;Estado: <span style="color:#22c55e;font-weight:600;">Entregado ✅</span><br>
                  &nbsp;&nbsp;&nbsp;Fecha: 5 ago · $185.000
                </div>`
        },
        {
            claves: ['envío', 'envio', 'envíos', 'envios', 'despacho', 'demora', 'llega', 'entrega'],
            respuesta: `🚚 <strong>Información de envíos:</strong><br><br>
                • <strong>Bogotá:</strong> 1–2 días hábiles<br>
                • <strong>Otras ciudades:</strong> 2–4 días hábiles<br>
                • <strong>Envío gratis</strong> en compras mayores a $150.000<br>
                • Seguimiento por correo al confirmar el pedido`
        },
        {
            claves: ['talla', 'tallas', 'medida', 'medidas', 'tabla', 'size'],
            respuesta: `📏 <strong>Guía de tallas:</strong><br><br>
                <div style="background:#f0ece6;border-radius:12px;padding:10px;font-size:12px;line-height:1.8;">
                  <strong>Buzos / Camisas</strong><br>
                  S → Tórax 86–91 cm<br>
                  M → Tórax 91–97 cm<br>
                  L → Tórax 97–102 cm<br>
                  XL → Tórax 102–107 cm<br><br>
                  <strong>Pantalones</strong><br>
                  28 · 30 · 32 · 34 · 36
                </div>`
        },
        {
            claves: ['pago', 'pagos', 'pagar', 'nequi', 'bancolombia', 'transferencia', 'precio'],
            respuesta: `💳 <strong>Métodos de pago:</strong><br><br>
                ✅ Nequi<br>
                ✅ Bancolombia (PSE / Botón)<br>
                ✅ Tarjeta débito / crédito<br>
                ✅ Efectivo (contraentrega)<br><br>
                Todos los pagos son <strong>100% seguros</strong> 🔒`
        },
        {
            claves: ['devolucion', 'devolución', 'devolver', 'cambio', 'cambiar', 'reembolso'],
            respuesta: `↩️ <strong>Política de devoluciones:</strong><br><br>
                • Tienes <strong>15 días</strong> desde la entrega<br>
                • El producto debe estar sin usar y con etiquetas<br>
                • Escríbenos al WhatsApp con el #pedido<br>
                • El reembolso toma 3–5 días hábiles`
        },
        {
            claves: ['hola', 'buenas', 'buenos', 'hi', 'hey', 'saludos'],
            respuesta: `👋 ¡Hola! ¿En qué te puedo ayudar hoy?<br>Puedes preguntarme sobre pedidos, tallas, pagos o devoluciones.`
        },
        {
            claves: ['gracias', 'thanks', 'ok', 'listo', 'perfecto', 'excelente'],
            respuesta: `😊 ¡Con gusto! Si necesitas algo más, aquí estoy.`
        },
    ];

    function obtenerRespuesta(texto) {
        const t = texto.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        for (const r of respuestas) {
            if (r.claves.some(c => t.includes(c.normalize('NFD').replace(/[\u0300-\u036f]/g,'')))) {
                return r.respuesta;
            }
        }
        return `🤔 No tengo esa información exacta aún, pero puedes escribirnos al WhatsApp o preguntarme sobre:<br>
            <span style="color:#2c1a0e;cursor:pointer" onclick="chipClick('pedido')">📦 Pedidos</span> · 
            <span style="color:#2c1a0e;cursor:pointer" onclick="chipClick('envio')">🚚 Envíos</span> · 
            <span style="color:#2c1a0e;cursor:pointer" onclick="chipClick('talla')">📏 Tallas</span>`;
    }

    // ── Agregar mensaje al chat ──────────────────────────────
    function addMsg(html, esUsuario = false) {
        const box = document.getElementById('sofia-messages');
        const div = document.createElement('div');
        div.className = 'flex items-start gap-2' + (esUsuario ? ' justify-end' : '');
        if (esUsuario) {
            div.innerHTML = `<div style="background:#2c1a0e;border-radius:16px 16px 4px 16px;padding:8px 12px;max-width:80%">
                <p style="color:#fff;font-size:13px">${html}</p></div>`;
        } else {
            div.innerHTML = `
                <div class="w-7 h-7 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 mt-0.5" style="background:#2c1a0e">S</div>
                <div class="bg-white rounded-2xl rounded-tl-sm px-3 py-2.5 shadow-sm" style="max-width:85%">
                    <p style="font-size:13px;color:#1b1b18;line-height:1.5">${html}</p>
                </div>`;
        }
        box.appendChild(div);
        box.scrollTop = box.scrollHeight;
    }

    // ── Typing indicator ────────────────────────────────────
    function showTyping() {
        const box = document.getElementById('sofia-messages');
        const div = document.createElement('div');
        div.id = 'typing-indicator';
        div.className = 'flex items-start gap-2';
        div.innerHTML = `
            <div class="w-7 h-7 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0" style="background:#2c1a0e">S</div>
            <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-3 shadow-sm">
                <div style="display:flex;gap:4px;align-items:center">
                    <span style="width:6px;height:6px;background:#c9b99a;border-radius:50%;animation:bounce 1s infinite 0s"></span>
                    <span style="width:6px;height:6px;background:#c9b99a;border-radius:50%;animation:bounce 1s infinite 0.2s"></span>
                    <span style="width:6px;height:6px;background:#c9b99a;border-radius:50%;animation:bounce 1s infinite 0.4s"></span>
                </div>
            </div>`;
        box.appendChild(div);
        box.scrollTop = box.scrollHeight;
    }

    function hideTyping() {
        const t = document.getElementById('typing-indicator');
        if (t) t.remove();
    }

    // ── Enviar mensaje ───────────────────────────────────────
    function enviarMensaje() {
        const input = document.getElementById('sofia-input');
        const texto = input.value.trim();
        if (!texto) return;
        input.value = '';
        addMsg(texto, true);
        showTyping();
        setTimeout(() => {
            hideTyping();
            addMsg(obtenerRespuesta(texto));
        }, 900 + Math.random() * 400);
    }

    // ── Chip click ───────────────────────────────────────────
    function chipClick(tema) {
        const msgs = {
            pedido:     'Ver mis pedidos',
            talla:      '¿Cuáles son las tallas?',
            pago:       '¿Cómo puedo pagar?',
            devolucion: '¿Cómo hago una devolución?',
            envio:      '¿Cuánto demora el envío?',
        };
        document.getElementById('sofia-input').value = msgs[tema] || tema;
        enviarMensaje();
    }
    </script>

    {{-- ═══ MODAL DETALLE DE PRODUCTO ═══ --}}
    <div id="modal-detalle-producto" class="hidden fixed inset-0 bg-black/50 backdrop-blur-xs flex items-center justify-center z-[100] p-4">
        <div class="bg-white rounded-3xl max-w-3xl w-full p-6 sm:p-8 relative shadow-2xl border border-gray-100 overflow-y-auto max-h-[90vh]">
            
            {{-- Botón Cerrar ✕ --}}
            <button onclick="cerrarDetalleProducto()" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-800 transition-colors absolute top-4 right-4 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-center">
                
                {{-- Columna Izquierda: Imagen --}}
                <div class="h-72 sm:h-96 w-full bg-[#f8f6f2] rounded-2xl flex items-center justify-center p-4 overflow-hidden relative border border-gray-100">
                    <img id="modal-img" src="" alt="" class="max-h-full max-w-full object-contain drop-shadow-md transition-transform duration-300 hover:scale-105">
                </div>

                {{-- Columna Derecha: Detalles --}}
                <div class="space-y-4">
                    {{-- Categoría Tag Pill --}}
                    <div>
                        <span id="modal-cat" class="px-3 py-1 bg-[#f5efea] text-[#8c7660] text-[10px] font-bold tracking-widest uppercase rounded-full inline-block">
                            BUZOS
                        </span>
                    </div>

                    {{-- Título --}}
                    <h2 id="modal-nombre" class="text-2xl sm:text-3xl font-bold font-serif text-[#1b1b18] leading-tight">
                        Hoodie Gris Jaspeado
                    </h2>

                    {{-- Reseñas --}}
                    <div class="flex items-center gap-1 text-xs text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602c-.38-.325-.178-.948.32-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        <span>Sin reseñas aún</span>
                    </div>

                    {{-- Precio --}}
                    <div id="modal-precio" class="text-3xl font-bold text-[#1b1b18]">
                        $79.900
                    </div>

                    {{-- Descripción --}}
                    <p id="modal-desc" class="text-xs text-[#706f6c] leading-relaxed">
                        Hoodie clásico en tela jaspeada suave. Perfecto para climas fríos.
                    </p>

                    {{-- Selección de Talla --}}
                    <div>
                        <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">TALLA</label>
                        <div class="flex flex-wrap gap-2" id="modal-tallas">
                            @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $talla)
                                <button onclick="seleccionarTalla(this)" class="talla-btn px-3.5 py-1.5 border rounded-xl text-xs font-semibold transition-all {{ $talla == 'M' ? 'border-[#2c1a0e] bg-[#fcfbfa] text-[#1b1b18] shadow-2xs font-bold' : 'border-gray-200 text-gray-600 hover:border-gray-400' }}">
                                    {{ $talla }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Selección de Cantidad --}}
                    <div>
                        <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">CANTIDAD</label>
                        <div class="flex items-center gap-3">
                            <button onclick="cambiarCantidadModal(-1)" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-sm font-bold text-gray-600 hover:bg-gray-50 transition-colors">-</button>
                            <span id="modal-cantidad" class="w-8 text-center text-sm font-bold text-[#1b1b18]">1</span>
                            <button onclick="cambiarCantidadModal(1)" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-sm font-bold text-gray-600 hover:bg-gray-50 transition-colors">+</button>
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div class="flex items-center gap-2 text-xs font-medium text-emerald-600">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span>
                        <span id="modal-stock">En stock (20 disponibles)</span>
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="flex items-center gap-3 pt-2">
                        <button onclick="modalAgregarCarrito()" class="flex-1 py-3.5 px-6 rounded-2xl text-white font-bold text-xs shadow-sm hover:opacity-90 transition-all flex items-center justify-center gap-2" style="background:#2c1a0e">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                            </svg>
                            Agregar al carrito
                        </button>
                        <button id="modal-fav-btn" onclick="modalToggleFavorito()" class="w-12 h-12 rounded-2xl border border-gray-200 flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
    let productoModalActual = null;

    function abrirDetalleProducto(prod) {
        if (!prod) return;
        productoModalActual = prod;

        document.getElementById('modal-cat').textContent = (prod.cat || 'BUZOS').toUpperCase();
        document.getElementById('modal-nombre').textContent = prod.nombre || 'Prenda Salinas';
        
        let pFormatted = prod.precio;
        if (typeof prod.precio === 'number') {
            pFormatted = '$' + new Intl.NumberFormat('es-CO').format(prod.precio);
        } else if (!pFormatted.toString().startsWith('$')) {
            pFormatted = '$' + pFormatted;
        }
        document.getElementById('modal-precio').textContent = pFormatted;

        document.getElementById('modal-desc').textContent = prod.desc || 'Hoodie clásico en tela jaspeada suave. Perfecto para climas fríos.';
        document.getElementById('modal-stock').textContent = `En stock (${prod.stock || 20} disponibles)`;
        
        const imgEl = document.getElementById('modal-img');
        imgEl.src = prod.img || 'https://images.unsplash.com/photo-1556821840-3a63f15732ce?w=400&q=80';

        document.getElementById('modal-cantidad').textContent = '1';

        document.getElementById('modal-detalle-producto').classList.remove('hidden');
    }

    function cerrarDetalleProducto() {
        document.getElementById('modal-detalle-producto').classList.add('hidden');
    }

    function seleccionarTalla(btn) {
        document.querySelectorAll('.talla-btn').forEach(b => {
            b.className = 'talla-btn px-3.5 py-1.5 border rounded-xl text-xs font-semibold transition-all border-gray-200 text-gray-600 hover:border-gray-400';
        });
        btn.className = 'talla-btn px-3.5 py-1.5 border rounded-xl text-xs font-bold transition-all border-[#2c1a0e] bg-[#fcfbfa] text-[#1b1b18] shadow-2xs';
    }

    function cambiarCantidadModal(delta) {
        const el = document.getElementById('modal-cantidad');
        let val = parseInt(el.textContent) + delta;
        if (val < 1) val = 1;
        el.textContent = val;
    }

    function modalAgregarCarrito() {
        if (!productoModalActual) return;
        const cantidad = parseInt(document.getElementById('modal-cantidad').textContent) || 1;
        // Leer talla seleccionada (el botón activo tiene border-[#2c1a0e])
        const tallaBtnActivo = document.querySelector('#modal-tallas .talla-btn[class*="border-[#2c1a0e]"]');
        const talla = tallaBtnActivo ? tallaBtnActivo.textContent.trim() : 'U';

        if (window.agregarAlCarrito) {
            window.agregarAlCarrito(productoModalActual, talla, cantidad);
        }
        cerrarDetalleProducto();
    }

    function modalToggleFavorito() {
        if (!productoModalActual) return;
        let favs = JSON.parse(localStorage.getItem('salinas_favoritos') || '[]');
        const index = favs.findIndex(p => p.id === productoModalActual.id);
        const btn = document.getElementById('modal-fav-btn');
        const svg = btn.querySelector('svg');

        if (index > -1) {
            favs.splice(index, 1);
            svg.setAttribute('fill', 'none');
            btn.classList.remove('text-red-500');
            btn.classList.add('text-gray-400');
        } else {
            favs.push(productoModalActual);
            svg.setAttribute('fill', 'currentColor');
            btn.classList.remove('text-gray-400');
            btn.classList.add('text-red-500');
        }
        localStorage.setItem('salinas_favoritos', JSON.stringify(favs));
    }
    </script>

    @stack('scripts')

    {{-- ═══════════════════════════════════════════════════
         DRAWER CARRITO (panel lateral)
    ═══════════════════════════════════════════════════ --}}

    {{-- Overlay --}}
    <div id="carrito-overlay"
         onclick="cerrarCarritoDrawer()"
         class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-[200] transition-opacity"></div>

    {{-- Panel --}}
    <div id="carrito-drawer"
         class="fixed top-0 right-0 h-full w-full sm:w-96 bg-white shadow-2xl z-[201] flex flex-col
                translate-x-full transition-transform duration-300 ease-in-out">

        {{-- Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#2c1a0e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                </svg>
                <h2 class="text-base font-bold text-[#1b1b18]">Carrito</h2>
                <span id="drawer-cuenta-pill"
                      class="bg-[#2c1a0e] text-white text-[10px] font-bold px-2 py-0.5 rounded-full hidden">0</span>
            </div>
            <button onclick="cerrarCarritoDrawer()" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Lista de items --}}
        <div id="drawer-lista" class="flex-1 overflow-y-auto px-5 py-4 space-y-3">
            {{-- Items se inyectan por JS --}}
        </div>

        {{-- Estado vacío --}}
        <div id="drawer-vacio" class="flex-1 flex flex-col items-center justify-center py-16 px-6 text-center">
            <div class="w-16 h-16 bg-[#f5efea] rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#c9b99a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z"/>
                </svg>
            </div>
            <p class="text-sm font-bold text-[#1b1b18] mb-1">Tu carrito está vacío</p>
            <p class="text-xs text-[#706f6c]">Agrega productos para empezar.</p>
        </div>

        {{-- Footer totales + botones --}}
        <div id="drawer-footer" class="hidden border-t border-gray-100 px-5 py-4 space-y-3 bg-white">
            <div class="flex justify-between text-sm font-bold text-[#1b1b18]">
                <span>Total</span>
                <span id="drawer-total">$0</span>
            </div>
            <a href="/carrito"
               class="block w-full py-3 text-center text-sm font-bold text-white bg-[#2c1a0e] rounded-2xl hover:bg-[#3d2510] transition-colors shadow-sm">
                Ver carrito completo
            </a>
            <button onclick="vaciarDesdeDrawer()"
                class="w-full py-2 text-xs text-red-400 hover:text-red-600 hover:underline transition-colors">
                Vaciar carrito
            </button>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════
         JS GLOBAL DEL CARRITO
    ═══════════════════════════════════════════════════ --}}
    <script>
    // ── Meta CSRF ────────────────────────────────────────────
    const _CSRF = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

    // ── Estado en memoria ────────────────────────────────────
    let _carritoItems = [];

    // ── Formatear COP ────────────────────────────────────────
    function _formatCOP(n) {
        return '$' + new Intl.NumberFormat('es-CO').format(Math.round(n));
    }

    // ── Actualizar badge del navbar ──────────────────────────
    window.actualizarBadgeCarrito = function(cuenta) {
        const badge = document.getElementById('carrito-badge');
        const pill  = document.getElementById('drawer-cuenta-pill');
        if (!badge) return;
        if (cuenta > 0) {
            badge.textContent = cuenta > 99 ? '99+' : cuenta;
            badge.classList.remove('hidden');
        } else {
            badge.classList.add('hidden');
        }
        if (pill) {
            pill.textContent = cuenta;
            cuenta > 0 ? pill.classList.remove('hidden') : pill.classList.add('hidden');
        }
    };

    // ── Renderizar items en el drawer ────────────────────────
    function _renderDrawer(items, total) {
        _carritoItems = items;
        const lista   = document.getElementById('drawer-lista');
        const vacio   = document.getElementById('drawer-vacio');
        const footer  = document.getElementById('drawer-footer');
        const totEl   = document.getElementById('drawer-total');

        lista.innerHTML = '';

        if (!items || items.length === 0) {
            lista.classList.add('hidden');
            vacio.classList.remove('hidden');
            footer.classList.add('hidden');
            return;
        }

        lista.classList.remove('hidden');
        vacio.classList.add('hidden');
        footer.classList.remove('hidden');
        if (totEl) totEl.textContent = _formatCOP(total);

        items.forEach(item => {
            const clave = item.id + '_' + item.talla;
            const div   = document.createElement('div');
            div.id      = 'drawer-item-' + clave;
            div.className = 'flex gap-3 bg-[#fafaf9] rounded-xl p-3 border border-gray-100';
            div.innerHTML = `
                <div class="w-14 h-14 rounded-lg overflow-hidden bg-[#f0ece6] flex-shrink-0">
                    ${item.img
                        ? `<img src="${item.img}" alt="${item.nombre}" class="w-full h-full object-cover">`
                        : `<div class="w-full h-full flex items-center justify-center text-[#c9b99a]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                           </div>`}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-1">
                        <p class="text-xs font-bold text-[#1b1b18] leading-tight truncate">${item.nombre}</p>
                        <button onclick="_quitarItemDrawer('${clave}')" class="text-gray-300 hover:text-red-500 transition-colors flex-shrink-0 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <span class="text-[10px] text-[#706f6c] bg-gray-200/70 px-1.5 py-0.5 rounded-full">T: ${item.talla}</span>
                    <div class="flex items-center justify-between mt-1.5">
                        <div class="flex items-center gap-1">
                            <button onclick="_cambiarCantDrawer('${clave}', -1)" class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center text-xs font-bold text-gray-500 hover:bg-gray-100">−</button>
                            <span id="drawer-cant-${clave}" class="w-5 text-center text-xs font-bold">${item.cantidad}</span>
                            <button onclick="_cambiarCantDrawer('${clave}', 1)" class="w-5 h-5 rounded border border-gray-200 flex items-center justify-center text-xs font-bold text-gray-500 hover:bg-gray-100">+</button>
                        </div>
                        <span class="text-xs font-bold text-[#2c1a0e]">${_formatCOP(item.precio * item.cantidad)}</span>
                    </div>
                </div>`;
            lista.appendChild(div);
        });
    }

    // ── Cargar carrito desde servidor ────────────────────────
    function _cargarCarrito() {
        fetch('/carrito/estado')
            .then(r => r.json())
            .then(data => {
                actualizarBadgeCarrito(data.cuenta);
                _renderDrawer(data.items, data.total);
            });
    }

    // ── Abrir/cerrar drawer ──────────────────────────────────
    function toggleCarritoDrawer() {
        const drawer  = document.getElementById('carrito-drawer');
        const overlay = document.getElementById('carrito-overlay');
        const abierto = !drawer.classList.contains('translate-x-full');
        if (abierto) {
            cerrarCarritoDrawer();
        } else {
            _cargarCarrito();
            drawer.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function cerrarCarritoDrawer() {
        document.getElementById('carrito-drawer').classList.add('translate-x-full');
        document.getElementById('carrito-overlay').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // ── Cambiar cantidad desde drawer ────────────────────────
    function _cambiarCantDrawer(clave, delta) {
        const span    = document.getElementById('drawer-cant-' + clave);
        let cantidad  = parseInt(span?.textContent ?? 1) + delta;
        if (cantidad < 1) { _quitarItemDrawer(clave); return; }
        if (cantidad > 99) return;

        fetch('/carrito/actualizar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _CSRF },
            body: JSON.stringify({ clave, cantidad })
        })
        .then(r => r.json())
        .then(data => {
            if (!data.ok) return;
            actualizarBadgeCarrito(data.cuenta);
            _renderDrawer(data.items, data.total);
        });
    }

    // ── Quitar item desde drawer ─────────────────────────────
    function _quitarItemDrawer(clave) {
        fetch('/carrito/quitar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _CSRF },
            body: JSON.stringify({ clave })
        })
        .then(r => r.json())
        .then(data => {
            if (!data.ok) return;
            actualizarBadgeCarrito(data.cuenta);
            _renderDrawer(data.items, data.total);
        });
    }

    // ── Vaciar desde drawer ──────────────────────────────────
    function vaciarDesdeDrawer() {
        if (!confirm('¿Vaciar todo el carrito?')) return;
        fetch('/carrito/vaciar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _CSRF },
            body: '{}'
        })
        .then(r => r.json())
        .then(data => {
            actualizarBadgeCarrito(0);
            _renderDrawer([], 0);
        });
    }

    // ── Función global para agregar al carrito ───────────────
    window.agregarAlCarrito = function(prod, talla, cantidad) {
        talla    = talla    ?? 'U';
        cantidad = cantidad ?? 1;

        fetch('/carrito/agregar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _CSRF },
            body: JSON.stringify({
                id:       prod.id,
                nombre:   prod.nombre,
                precio:   prod.precio,
                img:      prod.img ?? '',
                talla:    talla,
                cantidad: cantidad,
            })
        })
        .then(r => r.json())
        .then(data => {
            if (!data.ok) return;
            actualizarBadgeCarrito(data.cuenta);
            _renderDrawer(data.items, data.total);
            // Abrir drawer automáticamente
            const drawer  = document.getElementById('carrito-drawer');
            const overlay = document.getElementById('carrito-overlay');
            if (drawer.classList.contains('translate-x-full')) {
                drawer.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            // Toast confirmación
            _toastCarrito(prod.nombre);
        })
        .catch(() => {
            _toastCarrito(prod.nombre, true);
        });
    };

    // ── Toast mini ───────────────────────────────────────────
    function _toastCarrito(nombre, error = false) {
        const t = document.createElement('div');
        t.className = 'fixed bottom-24 left-1/2 -translate-x-1/2 px-4 py-2.5 rounded-xl shadow-lg text-sm font-semibold text-white z-[300] transition-all';
        t.style.background = error ? '#ef4444' : '#2c1a0e';
        t.innerHTML = error
            ? '✗ Error al agregar al carrito'
            : `✓ <strong>${nombre}</strong> agregado`;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 2200);
    }

    // ── Inicializar badge al cargar la página ────────────────
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/carrito/estado')
            .then(r => r.json())
            .then(data => actualizarBadgeCarrito(data.cuenta));
    });
    </script>
</body>
</html>

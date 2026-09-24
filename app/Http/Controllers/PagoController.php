<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagoController extends Controller
{
    private const CARRITO_KEY = 'carrito';
    private const PEDIDO_KEY  = 'pedido_actual';

    // ── Paso 1: Mostrar página de pago ────────────────────────
    public function index()
    {
        $carrito = session(self::CARRITO_KEY, []);

        if (empty($carrito)) {
            return redirect('/carrito')->with('error', 'Tu carrito está vacío.');
        }

        $items  = array_values($carrito);
        $total  = array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $items));
        $cuenta = array_sum(array_map(fn($i) => $i['cantidad'], $items));

        return view('pago', compact('items', 'total', 'cuenta'));
    }

    // ── Paso 2: Procesar formulario de pago ───────────────────
    public function procesar(Request $request)
    {
        $carrito = session(self::CARRITO_KEY, []);

        if (empty($carrito)) {
            return redirect('/carrito')->with('error', 'Tu carrito está vacío.');
        }

        $metodo = $request->input('metodo_pago');

        // Validaciones según método
        $rules = [
            'metodo_pago'   => 'required|in:nequi,bancolombia,tarjeta,efectivo',
            'nombre_envio'  => 'required|string|min:3|max:100',
            'direccion'     => 'required|string|min:5|max:200',
            'ciudad'        => 'required|string|min:2|max:80',
            'telefono'      => 'required|string|min:7|max:20',
        ];

        if ($metodo === 'nequi') {
            $rules['nequi_telefono'] = 'required|digits:10';
        } elseif ($metodo === 'bancolombia') {
            $rules['banco_tipo_cuenta'] = 'required|in:ahorros,corriente';
            $rules['banco_numero']      = 'required|digits_between:8,16';
            $rules['banco_titular']     = 'required|string|min:3|max:100';
        } elseif ($metodo === 'tarjeta') {
            $rules['tarjeta_numero']    = 'required|digits:16';
            $rules['tarjeta_nombre']    = 'required|string|min:3|max:100';
            $rules['tarjeta_expiry']    = ['required', 'regex:/^\d{2}\/\d{2}$/'];
            $rules['tarjeta_cvv']       = 'required|digits:3';
        }

        $messages = [
            'metodo_pago.required'      => 'Selecciona un método de pago.',
            'nombre_envio.required'     => 'El nombre de envío es obligatorio.',
            'direccion.required'        => 'La dirección es obligatoria.',
            'ciudad.required'           => 'La ciudad es obligatoria.',
            'telefono.required'         => 'El teléfono de contacto es obligatorio.',
            'nequi_telefono.required'   => 'Ingresa tu número Nequi.',
            'nequi_telefono.digits'     => 'El número Nequi debe tener 10 dígitos.',
            'banco_numero.required'     => 'Ingresa el número de cuenta.',
            'banco_titular.required'    => 'Ingresa el nombre del titular.',
            'tarjeta_numero.required'   => 'Ingresa el número de tarjeta.',
            'tarjeta_numero.digits'     => 'El número de tarjeta debe tener 16 dígitos.',
            'tarjeta_nombre.required'   => 'Ingresa el nombre en la tarjeta.',
            'tarjeta_expiry.required'   => 'Ingresa la fecha de vencimiento.',
            'tarjeta_expiry.regex'      => 'Formato: MM/AA',
            'tarjeta_cvv.required'      => 'Ingresa el CVV.',
            'tarjeta_cvv.digits'        => 'El CVV debe tener 3 dígitos.',
        ];

        $validated = $request->validate($rules, $messages);

        // Generar referencia de pedido
        $referencia = 'SAL-' . strtoupper(Str::random(8));
        $items      = array_values($carrito);
        $total      = array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $items));

        // Guardar pedido en sesión para la confirmación
        $pedido = [
            'referencia'    => $referencia,
            'metodo_pago'   => $metodo,
            'nombre_envio'  => $validated['nombre_envio'],
            'direccion'     => $validated['direccion'],
            'ciudad'        => $validated['ciudad'],
            'telefono'      => $validated['telefono'],
            'items'         => $items,
            'total'         => $total,
            'fecha'         => now()->format('d/m/Y H:i'),
        ];

        session([self::PEDIDO_KEY => $pedido]);

        // Vaciar carrito
        session()->forget(self::CARRITO_KEY);

        return redirect('/pago/confirmacion');
    }

    // ── Paso 3: Página de confirmación / éxito ────────────────
    public function confirmacion()
    {
        $pedido = session(self::PEDIDO_KEY);

        if (!$pedido) {
            return redirect('/');
        }

        return view('pago-confirmacion', compact('pedido'));
    }
}

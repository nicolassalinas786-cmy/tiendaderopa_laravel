<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // ── Clave de sesión ───────────────────────────────────────
    private const KEY = 'carrito';

    // ── Ver carrito (página completa) ─────────────────────────
    public function index()
    {
        $items  = session(self::KEY, []);
        $total  = array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $items));
        $cuenta = array_sum(array_map(fn($i) => $i['cantidad'], $items));

        return view('carrito', compact('items', 'total', 'cuenta'));
    }

    // ── Agregar producto ──────────────────────────────────────
    public function agregar(Request $request)
    {
        $request->validate([
            'id'       => 'required',
            'nombre'   => 'required|string|max:200',
            'precio'   => 'required|numeric|min:0',
            'cantidad' => 'integer|min:1|max:99',
            'talla'    => 'nullable|string|max:10',
            'img'      => 'nullable|string|max:500',
        ]);

        $carrito = session(self::KEY, []);
        $id      = $request->id;
        $talla   = $request->talla ?? 'U';
        $clave   = $id . '_' . $talla;          // clave única id+talla

        if (isset($carrito[$clave])) {
            $carrito[$clave]['cantidad'] += max(1, (int) $request->cantidad);
        } else {
            $carrito[$clave] = [
                'id'       => $id,
                'nombre'   => $request->nombre,
                'precio'   => (float) $request->precio,
                'cantidad' => max(1, (int) $request->cantidad),
                'talla'    => $talla,
                'img'      => $request->img ?? '',
            ];
        }

        session([self::KEY => $carrito]);

        return response()->json([
            'ok'      => true,
            'cuenta'  => array_sum(array_map(fn($i) => $i['cantidad'], $carrito)),
            'items'   => array_values($carrito),
            'total'   => array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito)),
        ]);
    }

    // ── Quitar un item ────────────────────────────────────────
    public function quitar(Request $request)
    {
        $clave   = $request->clave;
        $carrito = session(self::KEY, []);

        unset($carrito[$clave]);
        session([self::KEY => $carrito]);

        return response()->json([
            'ok'     => true,
            'cuenta' => array_sum(array_map(fn($i) => $i['cantidad'], $carrito)),
            'total'  => array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito)),
            'items'  => array_values($carrito),
        ]);
    }

    // ── Actualizar cantidad de un item ────────────────────────
    public function actualizar(Request $request)
    {
        $request->validate(['clave' => 'required', 'cantidad' => 'required|integer|min:1|max:99']);

        $carrito = session(self::KEY, []);
        $clave   = $request->clave;

        if (isset($carrito[$clave])) {
            $carrito[$clave]['cantidad'] = (int) $request->cantidad;
            session([self::KEY => $carrito]);
        }

        return response()->json([
            'ok'     => true,
            'cuenta' => array_sum(array_map(fn($i) => $i['cantidad'], $carrito)),
            'total'  => array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito)),
            'items'  => array_values($carrito),
        ]);
    }

    // ── Vaciar todo ───────────────────────────────────────────
    public function vaciar()
    {
        session()->forget(self::KEY);

        return response()->json(['ok' => true, 'cuenta' => 0, 'total' => 0, 'items' => []]);
    }

    // ── Estado actual (para inicializar el JS) ────────────────
    public function estado()
    {
        $carrito = session(self::KEY, []);

        return response()->json([
            'cuenta' => array_sum(array_map(fn($i) => $i['cantidad'], $carrito)),
            'total'  => array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito)),
            'items'  => array_values($carrito),
        ]);
    }
}

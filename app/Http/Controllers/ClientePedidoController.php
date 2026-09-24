<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientePedidoController extends Controller
{
    public function index()
    {
        $pedidos = [
            [
                'id' => '#0001',
                'fecha' => '2024-04-01',
                'productos' => 'Buzo Oversized + Jean Slim',
                'total' => '$264.800',
                'estado' => 'entregado',
                'cliente' => Auth::check() ? Auth::user()->nombre : 'Carlos García',
                'icono' => 'check',
                'color_icono' => 'emerald'
            ],
            [
                'id' => '#0002',
                'fecha' => '2024-04-03',
                'productos' => 'Blazer Azul Marino',
                'total' => '$189.900',
                'estado' => 'en camino',
                'cliente' => Auth::check() ? Auth::user()->nombre : 'Ana Martínez',
                'icono' => 'truck',
                'color_icono' => 'blue'
            ],
            [
                'id' => '#0003',
                'fecha' => '2024-04-05',
                'productos' => 'Camisa Oxford + Cinturón',
                'total' => '$139.800',
                'estado' => 'pendiente',
                'cliente' => Auth::check() ? Auth::user()->nombre : 'Luis Rodríguez',
                'icono' => 'clock',
                'color_icono' => 'amber'
            ],
            [
                'id' => '#0004',
                'fecha' => '2024-04-07',
                'productos' => 'Hoodie Gris + Pantalón',
                'total' => '$159.800',
                'estado' => 'procesando',
                'cliente' => Auth::check() ? Auth::user()->nombre : 'Sofía Torres',
                'icono' => 'processing',
                'color_icono' => 'purple'
            ],
        ];

        return view('pedidos', compact('pedidos'));
    }
}

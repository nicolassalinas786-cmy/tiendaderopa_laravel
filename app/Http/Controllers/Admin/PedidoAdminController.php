<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->esAdmin()) return redirect('/login');

        $pedidos = [
            [
                'id' => '#0001',
                'raw_id' => 1,
                'cliente' => 'Carlos García',
                'fecha' => '2024-04-01',
                'productos' => 'Buzo Oversized + Jean Slim',
                'total' => '$264.800',
                'estado' => 'entregado',
            ],
            [
                'id' => '#0002',
                'raw_id' => 2,
                'cliente' => 'Ana Martínez',
                'fecha' => '2024-04-03',
                'productos' => 'Blazer Azul Marino',
                'total' => '$189.900',
                'estado' => 'en camino',
            ],
            [
                'id' => '#0003',
                'raw_id' => 3,
                'cliente' => 'Luis Rodríguez',
                'fecha' => '2024-04-05',
                'productos' => 'Camisa Oxford + Cinturón',
                'total' => '$139.800',
                'estado' => 'pendiente',
            ],
            [
                'id' => '#0004',
                'raw_id' => 4,
                'cliente' => 'Sofía Torres',
                'fecha' => '2024-04-07',
                'productos' => 'Hoodie Gris + Pantalón',
                'total' => '$159.800',
                'estado' => 'procesando',
            ],
            [
                'id' => '#0005',
                'raw_id' => 5,
                'cliente' => 'Carlos García',
                'fecha' => '2024-04-08',
                'productos' => 'Reloj Clásico Dorado',
                'total' => '$219.900',
                'estado' => 'entregado',
            ],
            [
                'id' => '#0006',
                'raw_id' => 6,
                'cliente' => 'Ana Martínez',
                'fecha' => '2024-04-10',
                'productos' => 'Chaqueta Bomber Kaki',
                'total' => '$199.900',
                'estado' => 'pendiente',
            ],
            [
                'id' => '#0007',
                'raw_id' => 7,
                'cliente' => 'Luis Rodríguez',
                'fecha' => '2024-04-11',
                'productos' => 'Buzo Zip Café + Jean',
                'total' => '$189.800',
                'estado' => 'en camino',
            ],
            [
                'id' => '#0008',
                'raw_id' => 8,
                'cliente' => 'Sofía Torres',
                'fecha' => '2024-04-12',
                'productos' => 'Camisa Lino + Accesorios',
                'total' => '$145.800',
                'estado' => 'procesando',
            ],
        ];

        return view('admin.pedidos', compact('pedidos'));
    }
}

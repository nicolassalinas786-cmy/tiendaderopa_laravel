<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfertaController extends Controller
{
    public function index()
    {
        $usuarioNombre = Auth::check() ? Auth::user()->nombre : 'maicol becerra';

        $productosOferta = [
            [
                'id' => 101,
                'nombre' => 'Hoodie Gris Jaspeado',
                'precio_original' => '128900.00',
                'precio_descuento' => '79900.00',
                'descuento' => '-31%',
                'img' => 'https://images.unsplash.com/photo-1578768079052-aa76e52ff9ef?w=400&q=80',
                'placeholder_bg' => '#f4f3f0'
            ],
            [
                'id' => 102,
                'nombre' => 'Camisa Lino Azul Slim',
                'precio_original' => '105000.00',
                'precio_descuento' => '65000.00',
                'descuento' => '-38%',
                'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&q=80',
                'placeholder_bg' => '#f4f3f0'
            ],
            [
                'id' => 103,
                'nombre' => 'Jean Slim Denim Clásico',
                'precio_original' => '199000.00',
                'precio_descuento' => '135000.00',
                'descuento' => '-32%',
                'img' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&q=80',
                'placeholder_bg' => '#f4f3f0'
            ],
            [
                'id' => 104,
                'nombre' => 'Chaqueta Bomber Kaki',
                'precio_original' => '285000.00',
                'precio_descuento' => '199000.00',
                'descuento' => '-30%',
                'img' => 'https://images.unsplash.com/photo-1548883354-7622d03aca27?w=400&q=80',
                'placeholder_bg' => '#f4f3f0'
            ],
        ];

        return view('ofertas', compact('usuarioNombre', 'productosOferta'));
    }
}

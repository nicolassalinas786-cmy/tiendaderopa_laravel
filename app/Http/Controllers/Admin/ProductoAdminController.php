<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductoAdminController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->esAdmin()) return redirect('/login');

        // Productos con fotos reales (después se reemplaza con BD)
        $productos = [
            ['id'=>1,  'nombre'=>'Buzo Oversized Negro',   'categoria'=>'buzos',      'precio'=>89900,  'stock'=>15, 'img'=>'https://images.unsplash.com/photo-1556821840-3a63f15732ce?w=80&q=80'],
            ['id'=>2,  'nombre'=>'Hoodie Gris Jaspeado',   'categoria'=>'buzos',      'precio'=>79900,  'stock'=>20, 'img'=>'https://images.unsplash.com/photo-1578768079052-aa76e52ff9ef?w=80&q=80'],
            ['id'=>3,  'nombre'=>'Buzo Zip Café',          'categoria'=>'buzos',      'precio'=>99900,  'stock'=>8,  'img'=>'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=80&q=80'],
            ['id'=>4,  'nombre'=>'Hoodie Blanco Básico',   'categoria'=>'buzos',      'precio'=>74900,  'stock'=>18, 'img'=>'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=80&q=80'],
            ['id'=>5,  'nombre'=>'Buzo Tie Dye Azul',      'categoria'=>'buzos',      'precio'=>84900,  'stock'=>10, 'img'=>'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=80&q=80'],
            ['id'=>6,  'nombre'=>'Camisa Lino Blanca',     'categoria'=>'camisas',    'precio'=>65000,  'stock'=>22, 'img'=>'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=80&q=80'],
            ['id'=>7,  'nombre'=>'Camisa Oversize Negra',  'categoria'=>'camisas',    'precio'=>72000,  'stock'=>14, 'img'=>'https://images.unsplash.com/photo-1602810319428-019690571b5b?w=80&q=80'],
            ['id'=>8,  'nombre'=>'Polo Premium Beige',     'categoria'=>'camisas',    'precio'=>55000,  'stock'=>30, 'img'=>'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=80&q=80'],
            ['id'=>9,  'nombre'=>'Chaqueta Cuero Negro',   'categoria'=>'chaquetas',  'precio'=>249000, 'stock'=>5,  'img'=>'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=80&q=80'],
            ['id'=>10, 'nombre'=>'Chaqueta Denim Azul',    'categoria'=>'chaquetas',  'precio'=>185000, 'stock'=>12, 'img'=>'https://images.unsplash.com/photo-1542272604-787c3835535d?w=80&q=80'],
            ['id'=>11, 'nombre'=>'Bomber Verde Militar',   'categoria'=>'chaquetas',  'precio'=>199000, 'stock'=>7,  'img'=>'https://images.unsplash.com/photo-1548883354-7622d03aca27?w=80&q=80'],
            ['id'=>12, 'nombre'=>'Jogger Cargo Beige',     'categoria'=>'pantalones', 'precio'=>120000, 'stock'=>16, 'img'=>'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=80&q=80'],
            ['id'=>13, 'nombre'=>'Jean Slim Negro',        'categoria'=>'pantalones', 'precio'=>135000, 'stock'=>11, 'img'=>'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=80&q=80'],
            ['id'=>14, 'nombre'=>'Gorra Snapback Negra',   'categoria'=>'accesorios', 'precio'=>45000,  'stock'=>25, 'img'=>'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=80&q=80'],
            ['id'=>15, 'nombre'=>'Mochila Urbana Marrón',  'categoria'=>'accesorios', 'precio'=>89000,  'stock'=>9,  'img'=>'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=80&q=80'],
        ];

        return view('admin.productos', compact('productos'));
    }
}

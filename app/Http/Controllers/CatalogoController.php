<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $catFiltro = strtolower($request->get('cat', 'todos'));

        $todasCategorias = [
            [
                'nombre' => 'Buzos',
                'slug' => 'buzo',
                'productos' => [
                    ['id' => 1, 'nombre' => 'Buzo Oversized Negro', 'precio' => '89900.00', 'es_nuevo' => true, 'es_promo' => false, 'img' => null, 'placeholder_bg' => '#e6d8c3'],
                    ['id' => 2, 'nombre' => 'Hoodie Gris Jaspeado', 'precio' => '79900.00', 'es_nuevo' => false, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 3, 'nombre' => 'Buzo Zip Café', 'precio' => '99900.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1578768079052-aa76e52ff9ef?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 4, 'nombre' => 'Hoodie Blanco Básico', 'precio' => '74900.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1556821840-3a63f15732ce?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 5, 'nombre' => 'Buzo Tie Dye Azul', 'precio' => '84900.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 6, 'nombre' => 'Hoodie Minimalist Sand', 'precio' => '92900.00', 'es_nuevo' => true, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=400&q=80', 'placeholder_bg' => null],
                ]
            ],
            [
                'nombre' => 'Camisas',
                'slug' => 'camisa',
                'productos' => [
                    ['id' => 7, 'nombre' => 'Camisa Lino Blanca', 'precio' => '65000.00', 'es_nuevo' => false, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 8, 'nombre' => 'Camisa Oversize Negra', 'precio' => '72000.00', 'es_nuevo' => true, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1602810319428-019690571b5b?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 9, 'nombre' => 'Camisa Cuadros Flannel', 'precio' => '68000.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1598032895397-b9472444bf93?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 10, 'nombre' => 'Polo Premium Beige', 'precio' => '55000.00', 'es_nuevo' => false, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=400&q=80', 'placeholder_bg' => null],
                ]
            ],
            [
                'nombre' => 'Chaquetas',
                'slug' => 'chaqueta',
                'productos' => [
                    ['id' => 11, 'nombre' => 'Chaqueta Cuero Negro', 'precio' => '249000.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 12, 'nombre' => 'Chaqueta Denim Azul', 'precio' => '185000.00', 'es_nuevo' => true, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 13, 'nombre' => 'Bomber Verde Militar', 'precio' => '199000.00', 'es_nuevo' => false, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1548883354-7622d03aca27?w=400&q=80', 'placeholder_bg' => null],
                ]
            ],
            [
                'nombre' => 'Pantalones',
                'slug' => 'pantalon',
                'productos' => [
                    ['id' => 14, 'nombre' => 'Jogger Cargo Beige', 'precio' => '120000.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 15, 'nombre' => 'Jean Slim Negro', 'precio' => '135000.00', 'es_nuevo' => true, 'es_promo' => true, 'img' => 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=400&q=80', 'placeholder_bg' => null],
                ]
            ],
            [
                'nombre' => 'Accesorios',
                'slug' => 'accesorio',
                'productos' => [
                    ['id' => 16, 'nombre' => 'Gorra Snapback Negra', 'precio' => '45000.00', 'es_nuevo' => true, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=400&q=80', 'placeholder_bg' => null],
                    ['id' => 17, 'nombre' => 'Mochila Urbana Marrón', 'precio' => '89000.00', 'es_nuevo' => false, 'es_promo' => false, 'img' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&q=80', 'placeholder_bg' => null],
                ]
            ]
        ];

        // Filtrado si viene con parametro cat
        if ($catFiltro === 'nuevo') {
            $categorias = [
                [
                    'nombre' => 'Nuevos Ingresos',
                    'slug' => 'nuevos',
                    'productos' => array_merge(...array_map(fn($c) => array_filter($c['productos'], fn($p) => $p['es_nuevo']), $todasCategorias))
                ]
            ];
        } elseif ($catFiltro === 'promo') {
            $categorias = [
                [
                    'nombre' => 'Promociones u Ofertas',
                    'slug' => 'promo',
                    'productos' => array_merge(...array_map(fn($c) => array_filter($c['productos'], fn($p) => $p['es_promo']), $todasCategorias))
                ]
            ];
        } elseif ($catFiltro !== 'todos') {
            $categorias = array_filter($todasCategorias, fn($c) => $c['slug'] === $catFiltro || str_contains($c['slug'], $catFiltro));
            if (empty($categorias)) {
                $categorias = $todasCategorias;
            }
        } else {
            $categorias = $todasCategorias;
        }

        return view('catalogo', compact('categorias', 'catFiltro'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReporteAdminController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !Auth::user()->esAdmin()) return redirect('/login');

        $kpis = [
            'ingresos_totales' => [
                'valor' => '$3.440',
                'cambio' => '+12% vs período anterior',
                'color' => 'emerald'
            ],
            'pedidos' => [
                'valor' => '8',
                'subtext' => '3 entregados',
                'color' => 'blue'
            ],
            'ticket_promedio' => [
                'valor' => '$430.00',
                'subtext' => 'Por pedido',
                'color' => 'purple'
            ],
            'tasa_entrega' => [
                'valor' => '38%',
                'subtext' => 'Pedidos entregados',
                'color' => 'amber'
            ],
        ];

        $ventasDiarias = [
            ['dia' => 'Lun', 'monto' => 320, 'formateado' => '$320'],
            ['dia' => 'Mar', 'monto' => 540, 'formateado' => '$540'],
            ['dia' => 'Mié', 'monto' => 210, 'formateado' => '$210'],
            ['dia' => 'Jue', 'monto' => 680, 'formateado' => '$680'],
            ['dia' => 'Vie', 'monto' => 490, 'formateado' => '$490'],
            ['dia' => 'Sáb', 'monto' => 820, 'formateado' => '$820'],
            ['dia' => 'Dom', 'monto' => 390, 'formateado' => '$390'],
        ];

        $categorias = [
            ['nombre' => 'Buzos', 'porcentaje' => 28, 'color' => '#2c1a0e'],
            ['nombre' => 'Chaquetas', 'porcentaje' => 22, 'color' => '#5c4028'],
            ['nombre' => 'Camisas', 'porcentaje' => 18, 'color' => '#8c684d'],
            ['nombre' => 'Pantalones', 'porcentaje' => 16, 'color' => '#c2a68c'],
            ['nombre' => 'Accesorios', 'porcentaje' => 10, 'color' => '#e2d5c8'],
            ['nombre' => 'Otros', 'porcentaje' => 6, 'color' => '#e5e7eb'],
        ];

        return view('admin.reportes', compact('kpis', 'ventasDiarias', 'categorias'));
    }
}

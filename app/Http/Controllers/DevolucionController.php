<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevolucionController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        return view('devoluciones', compact('usuario'));
    }

    public function store(Request $request)
    {
        return back()->with('success', '¡Tu solicitud de devolución ha sido enviada con éxito! Te contactaremos en menos de 24 horas.');
    }
}

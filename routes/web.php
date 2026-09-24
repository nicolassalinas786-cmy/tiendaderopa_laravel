<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProductoAdminController;
use App\Http\Controllers\Admin\PedidoAdminController;
use App\Http\Controllers\Admin\ReporteAdminController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ClientePedidoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PagoController;

// ── Inicio ────────────────────────────────────────────────────
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/catalogo',     [CatalogoController::class, 'index'])->name('catalogo');
Route::get('/pedidos',      [ClientePedidoController::class, 'index'])->name('pedidos');
Route::get('/favoritos',    [FavoritoController::class, 'index'])->name('favoritos');
Route::get('/ofertas',      [OfertaController::class, 'index'])->name('ofertas');
Route::get('/devoluciones', [DevolucionController::class, 'index'])->name('devoluciones');
Route::post('/devoluciones',[DevolucionController::class, 'store']);

// ── Pago ──────────────────────────────────────────────────────
Route::get('/pago',               [PagoController::class, 'index'])->name('pago');
Route::post('/pago/procesar',     [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmacion',  [PagoController::class, 'confirmacion'])->name('pago.confirmacion');

// ── Carrito ───────────────────────────────────────────────────
Route::get('/carrito',           [CarritoController::class, 'index'])->name('carrito');
Route::get('/carrito/estado',    [CarritoController::class, 'estado'])->name('carrito.estado');
Route::post('/carrito/agregar',  [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/quitar',   [CarritoController::class, 'quitar'])->name('carrito.quitar');
Route::post('/carrito/actualizar',[CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::post('/carrito/vaciar',   [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

// ── Auth ──────────────────────────────────────────────────────
Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',    [AuthController::class, 'login']);
Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

// ── Panel Usuario (solo clientes autenticados) ─────────────────
Route::get('/mi-cuenta', function () {
    if (!Auth::check()) return redirect('/login');
    if (Auth::user()->esAdmin()) return redirect('/admin');
    return view('usuario.dashboard');
})->name('usuario.dashboard');

// ── Panel Admin (solo administradores) ────────────────────────
Route::get('/admin', function () {
    if (!Auth::check()) return redirect('/login');
    if (!Auth::user()->esAdmin()) return redirect('/mi-cuenta');
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/productos', [ProductoAdminController::class, 'index'])->name('admin.productos');
Route::get('/admin/pedidos',   [PedidoAdminController::class, 'index'])->name('admin.pedidos');
Route::get('/admin/usuarios',  function () { return redirect('/admin'); });
Route::get('/admin/reportes',  [ReporteAdminController::class, 'index'])->name('admin.reportes');

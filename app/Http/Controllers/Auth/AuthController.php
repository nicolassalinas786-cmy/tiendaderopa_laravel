<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ── LOGIN ────────────────────────────────────────────────
    public function showLogin()
    {
        if (Auth::check()) return redirect('/');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'El correo es obligatorio.',
            'email.email'       => 'Ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Buscar por campo 'correo' (no 'email')
        $usuario = Usuario::where('correo', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()
                ->withInput(['email' => $request->email])
                ->withErrors(['email' => 'Correo o contraseña incorrectos.']);
        }

        Auth::login($usuario, $request->boolean('remember'));
        $request->session()->regenerate();

        // Redirigir según rol (2 = admin en salinas_db)
        if ($usuario->esAdmin()) {
            return redirect('/admin');
        }

        return redirect('/');
    }

    // ── REGISTER ─────────────────────────────────────────────
    public function showRegister()
    {
        if (Auth::check()) return redirect('/');
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|min:2|max:80',
            'apellido' => 'required|string|min:2|max:80',
            'email'    => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'terminos' => 'accepted',
        ], [
            'nombre.required'    => 'El nombre es obligatorio.',
            'apellido.required'  => 'El apellido es obligatorio.',
            'email.required'     => 'El correo es obligatorio.',
            'email.email'        => 'Ingresa un correo válido.',
            'email.unique'       => 'Este correo ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'terminos.accepted'  => 'Debes aceptar los términos y condiciones.',
        ]);

        // Si el correo es el de admin, asignar rol admin (2), si no, cliente (1)
        $esAdmin = $request->email === 'admin@salinasoriginal.com';

        $usuario = Usuario::create([
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'correo'          => $request->email,
            'telefono'        => $request->telefono,
            'password'        => Hash::make($request->password),
            'id_rol'          => $esAdmin ? 2 : 1,
            'fecha_registro'  => now(),
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect('/');
    }

    // ── LOGOUT ───────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

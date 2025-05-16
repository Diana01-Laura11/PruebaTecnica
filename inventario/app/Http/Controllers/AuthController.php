<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController  
{
    /**
     * Mostrar el formulario de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Manejar el intento de login
     */
    public function login(Request $request)
    {
        // Validar campos
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        // Buscar el usuario por correo
        $user = User::where('correo', $request->correo)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['correo' => 'No encontramos una cuenta con ese correo.']);
        }

        if (!$user->estatus) {
            return back()
                ->withInput()
                ->withErrors(['correo' => 'Esta cuenta está desactivada.']);
        }

        if (!Hash::check($request->contrasena, $user->contrasena)) {
            return back()
                ->withInput()
                ->withErrors(['contrasena' => 'La contraseña es incorrecta.']);
        }

        Auth::login($user);

        // Verificar login
        if (Auth::check()) {
            $request->session()->regenerate();
            return redirect()->intended('/ViewInventory');
        }

        // Fallback
        return back()
            ->withInput()
            ->withErrors(['error' => 'Hubo un problema al iniciar sesión. Intenta nuevamente.']);
    }


    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

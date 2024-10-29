<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    //Mostrar la vista para el inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('enterprises')->with('success', 'Sesión iniciada exitosamente');
        }
        
        // Si la autenticación falla
        return back()->withErrors([
            'username' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->except('password'));
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Sesión cerrada');
    }

}

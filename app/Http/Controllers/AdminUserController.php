<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    // Función para crear usuarios
    public function create()
    {
        return view('auth.createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Generar un nombre de usuario único
        $username = Str::random(16);

        // Generar una contraseña aleatoria
        $password = Str::random(12);
        // $hashedPassword = Hash::make($password);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'username' => $username,
            // 'email' => $username . '@sysvecse.com',
            'password' => $password,
        ]);

        // Aquí puedes decidir enviar la contraseña generada al administrador o al usuario.
        return redirect()->route('enterprises.index')->with('success', 'Usuario creado exitosamente. Username: ' . $username . ', Contraseña: ' . $password);
    }
}

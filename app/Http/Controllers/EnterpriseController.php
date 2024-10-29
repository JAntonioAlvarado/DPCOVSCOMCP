<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EnterpriseController extends Controller
{
    // INICIA
    // Métodos para las vistas de las empresas 
    public function index()
    {
        $activeEnterprises = Enterprise::where('active', true)->get();
        $inactiveEnterprises = Enterprise::where('active', false)->get();

        return view('enterprises.index', compact('activeEnterprises', 'inactiveEnterprises'));
    }

    public function create()
    {
        return view('enterprises.create');
    }

    public function show(Enterprise $enterprise)
    {
        return view('enterprises.show', compact('enterprise'));
    }

    public function edit(Enterprise $enterprise)
    {
        return view('enterprises.edit', compact('enterprise'));
    }
    // TERMINA
    // Métodos para las vistas de las empresas 

     // Método para crear una nueva empresa
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:25',
            'sector' => 'required|string|max:25',
            'direction' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
        ],[
            'name.required' => 'La empresa requiere un nombre.',
            'type.required' => 'Se requiere el tipo de empresa.',
            'sector.required' => 'Se requiere el sector de la empresa.',
        ]
        );

        // Validar la información del representante solo si se proporciona
        if ($request->filled('representative')) {
            $representativeData = $request->validate([
                'representative' => 'required|string|max:50',
                'username' => 'required|string|max:16|unique:users,username', 
                'password' => 'required|string|max:16',
            ],[
                'representative.required' => 'El representante requiere un nombre.',
                'username.required' => 'El nombre de usuario es obligatorio.',
                'username.unique' => 'El nombre de usuario ya está en uso.',
                'password.required' => 'La contraseña es obligatoria.',
            ]);

            $user = User::create([
                'name' => $representativeData['representative'],
                'username' => $representativeData['username'],
                'password' => $representativeData['password'],
            ]);

            $validatedData['user_id'] = $user->id;
        }
    
        // Añadir el campo "active" en true por defecto
        $validatedData['active'] = true;
    
        if ($request->representative) {
            $user = User::create([
                'name' => $request->representative,
                'username' => $request->username,
                'password' => $request->password,
            ]);
    
            $validatedData['user_id'] = $user->id;
        }

        Enterprise::create($validatedData);
    
        return redirect()->route('enterprises.index')->with('success', 'Empresa creada exitosamente');
    }

    // Método para actualizar los valores de la empresa
    public function update(Request $request, Enterprise $enterprise)
    {
        // Validar los datos de la empresa
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:25',
            'sector' => 'required|string|max:25',
            'direction' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'active' => 'required|boolean',
        ],[
            'name.required' => 'La empresa requiere un nombre.',
            'type.required' => 'Se requiere el tipo de empresa.',
            'sector.required' => 'Se requiere el sector de la empresa.',
        ]);

        // Actualizar la información del usuario
        if ($request->filled('representative')) {
            $representativeData = $request->validate([
                'representative' => 'required|string|max:50',
                'username' => 'required|string|max:16|unique:users,username,' . ($enterprise->user ? $enterprise->user->id : 'NULL') . ',id',
                'password' => 'required|string|max:16',
            ],[
                'representative.required' => 'El representante requiere un nombre.',
                'username.required' => 'El nombre de usuario es obligatorio.',
                'username.unique' => 'El nombre de usuario ya está en uso.',
                'password.required' => 'La contraseña es obligatoria.',
            ]);
    
            if ($enterprise->user) {
                $user = $enterprise->user;
                $enterprise->user_id = null; // Desasociar el usuario de la empresa
                $enterprise->save();
                $user->delete(); // Eliminar el usuario de la base de datos
            }
            
            // Crear el nuevo usuario
            $user = User::create([
                'name' => $representativeData['representative'],
                'username' => $representativeData['username'],
                'password' => $representativeData['password'],
            ]);

            $validatedData['user_id'] = $user->id;
        }    
    
        // Actualizar la empresa con los datos validados
        $enterprise->update($validatedData);
    
        return redirect()->route('enterprises.index')->with('success', 'Empresa actualizada exitosamente.');
    }

    public function removeRepresentative(Enterprise $enterprise)
    {
        // Verificar si la empresa tiene un representante
        if ($enterprise->user) {
            $user = $enterprise->user;
            $enterprise->user_id = null; // Desasociar el usuario de la empresa
            $enterprise->save();

            $user->delete(); // Eliminar el usuario de la base de datos
        }

        return redirect()->route('enterprises.index')->with('success', 'Representante eliminado exitosamente.');
    }

    // Método para eliminar la empresa de la base de datos (En caso de ser necesario)
    public function destroy(Enterprise $enterprise)
    {
        $enterprise->delete();
        return redirect()->route('enterprises.index')->with('success', 'Empresa eliminada exitosamente');
    }

    // Método para cambiar el estado de la empresa entre activo/inactivo
    public function toggleActive(Enterprise $enterprise)
    {
        $enterprise->active = !$enterprise->active;
        $enterprise->save();

        return redirect()->route('enterprises.index')->with('success', 'Estado de la empresa actualizado exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {
        $enterprises = Enterprise::all();
        return view('enterprises.index', compact('enterprises'));
    }

    public function create()
    {
        return view('enterprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Enterprise::create($request->all());
        return redirect()->route('enterprises.index')->with('success', 'Empresa creada exitosamente');
    }

    public function show(Enterprise $enterprise)
    {
        return view('enterprises.show', compact('enterprise'));
    }

    public function edit(Enterprise $enterprise)
    {
        return view('enterprises.edit', compact('enterprise'));
    }

    public function update(Request $request, Enterprise $enterprise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $enterprise->update($request->all());
        return redirect()->route('enterprises.index')->with('success', 'Empresa actualizada exitosamente');
    }

    public function destroy(Enterprise $enterprise)
    {
        $enterprise->delete();
        return redirect()->route('enterprises.index')->with('success', 'Empresa eliminada exitosamente');
    }
}

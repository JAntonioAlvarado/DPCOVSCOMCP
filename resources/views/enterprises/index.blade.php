<!-- resources/views/enterprises/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empresas</h1>
    <a href="{{ route('enterprises.create') }}" class="btn btn-primary">Crear una nueva empresa</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enterprises as $enterprise)
                <tr>
                    <td>{{ $enterprise->name }}</td>
                    <td>{{ $enterprise->description }}</td>
                    <td>
                        <a href="{{ route('enterprises.show', $enterprise) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('enterprises.edit', $enterprise) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('enterprises.destroy', $enterprise) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

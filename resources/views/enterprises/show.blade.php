@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la empresa</h1>
    <p><strong>Nombre:</strong> {{ $enterprise->name }}</p>
    <p><strong>Descripción:</strong> {{ $enterprise->description }}</p>

    <h2>Encuestas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID del encuestado: </th>
                <th>Creado el: </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enterprise->surveyeds as $surveyed)
                <tr>
                    <td>{{ $surveyed->id }}</td>
                    <td>{{ $surveyed->created_at }}</td>
                    <td>
                        <a href="{{ route('survey.responses.show', $surveyed->id) }}" class="btn btn-info">Ver respuestas</a>
                        <a href="{{ route('survey.responses.edit', $surveyed->id) }}" class="btn btn-warning">Editar respuestas</a>
                        <form action="{{ route('survey.destroy', $surveyed->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('survey.create', $enterprise->id) }}" class="btn btn-primary">Crear Encuesta</a>

    <a href="{{ route('enterprises.index') }}" class="btn btn-secondary">Volver a las empresas</a>
</div>
@endsection

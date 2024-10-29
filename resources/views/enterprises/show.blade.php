@extends('layouts.app')

@section('title')
    SysVECSE - {{ $enterprise->name }}
@endsection

@section('content')
<div class="container">
    <h1>{{ $enterprise->name }}</h1>
    <div class="enterprise-info">
        <p><strong>Tipo de empresa:</strong> {{ $enterprise->type }}</p>
        <p><strong>Sector de la empresa:</strong> {{ $enterprise->sector }}</p>
        <p><strong>Dirección de la empresa:</strong> {{ $enterprise->direction }}</p>
        <p><strong>Descripción de la empresa:</strong> {{ $enterprise->description }}</p>
        {{-- Aquí se está usando un accesor que conecta al modelo de la empresa--}}
        <p><strong>Estado de la empresa:</strong> {{ $enterprise->active_status }}</p>
        @if ($enterprise->representative)
            <h3>Información del representante</h3>
            <p><strong>Nombre:</strong> {{ $enterprise->representative->name }}</p>
            <p><strong>Usuario:</strong> {{ $enterprise->representative->username }}</p>
            <p><strong>Contraseña:</strong> {{ $enterprise->representative->password }}</p>
        @else
            <p>Esta empresa no tiene representante asignado.</p>
        @endif
    </div>

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
                    <td class="buttons">
                        <a href="{{ route('survey.responses.show', $surveyed->id) }}">
                            <i class="fa-solid fa-eye" title="Ver respuestas"></i>
                        </a>
                        {{-- <a href="{{ route('survey.responses.show', $surveyed->id) }}" class="btn btn-info">Ver respuestas</a> --}}
                        <a href="{{ route('survey.responses.edit', $surveyed->id) }}">
                            <i class="fa-regular fa-pen-to-square" title="Editar respuestas"></i>
                        </a>
                        {{-- <a href="{{ route('survey.responses.edit', $surveyed->id) }}" class="btn btn-warning">Editar respuestas</a> --}}
                        <form action="{{ route('survey.destroy', $surveyed->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <i type="submit" class="fa-solid fa-power-off" title="Eliminar encuesta"></i>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('survey.create', $enterprise->id) }}" class="btn btn-primary">Crear Encuesta</a>

    <a href="{{ route('enterprises.index') }}" class="btn btn-secondary mt-3">Volver a las empresas</a>
</div>
@endsection

<!-- resources/views/enterprises/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar empresa</h1>
    <form action="{{ route('enterprises.update', $enterprise->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $enterprise->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control">{{ $enterprise->description }}</textarea>
        </div>
        <a href="{{ route('survey.create', $enterprise->id) }}" class="btn btn-primary">Crear Encuesta</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

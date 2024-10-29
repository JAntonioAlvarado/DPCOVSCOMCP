<!-- resources/views/auth/createUser.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear un nuevo usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del usuario</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear usuario</button>
    </form>
</div>
@endsection

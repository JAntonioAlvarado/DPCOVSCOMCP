@extends('layouts.app')

@section('title', 'SysVECSE - Inicio de Sesión')

@section('content')
<div class="container">
    <h1 class="centered-title">Sistema para Evaluación de Economía Circular y Sustentabilidad de las Empresas</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 centered-input">
            <label for="username" class="form-label">Usuario:</label>
            <input type="username" name="username" id="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3 centered-input">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="fixed-center">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('title', 'SysVECSE - Crear una empresa')

@section('content')
<div class="container">
    <h1>Crear una nueva empresa</h1>
    <form action="{{ route('enterprises.store') }}" method="POST" novalidate>
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <label class="required-inputs">* Campos obligatorios</label>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la empresa <a>*</a></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo de empresa <a>*</a></label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('type'))
                <div class="alert alert-danger">{{ $errors->first('type') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="sector" class="form-label">Sector de la empresa <a>*</a></label>
            <input type="text" name="sector" id="sector" class="form-control" value="{{ old('sector') }}" required>
            @if ($errors->has('sector'))
                <div class="alert alert-danger">{{ $errors->first('sector') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="direction" class="form-label">Dirección de la empresa</label>
            <textarea name="direction" id="direction" class="form-control" rows="2">{{ old('direction') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción de la empresa</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>
        <h2>Información del representante</h2>
        <div class="mb-3">
            <label for="representative" class="form-label">Nombre</label>
            <input type="text" name="representative" id="representative" class="form-control" onclick="showMessage()" onblur="hideMessage()" value="{{ old('representative') }}">
            <p id="user-message">Si agrega un representante debe de generarle un nombre de usuario y una contraseña</p>
            @if ($errors->has('representative'))
                <div class="alert alert-danger">{{ $errors->first('representative') }}</div>
            @endif
        </div>
        <div class="mb-3" id="username-container">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
            @if ($errors->has('username'))
                <div class="alert alert-danger">{{ $errors->first('username') }}</div>
            @endif
        </div>
        <div class="mb-3" id="password-container">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Crear empresa</button>
    </form>
    <a href="{{ route('enterprises.index') }}" class="btn btn-secondary">Volver a las empresas</a>
</div>
<script>
    function showMessage() {
        var message = document.getElementById('user-message');
        message.style.display = 'block';
    }
    function hideMessage() {
        var message = document.getElementById('user-message');
        message.style.display = 'none';
    }

    // function showContainers() {
    //     var message = document.getElementById('username-container');
    //     message.style.display = 'block';
    //     var message = document.getElementById('password-container');
    //     message.style.display = 'block';
    // }
    // function hideContainers() {
    //     var message = document.getElementById('username-container');
    //     message.style.display = 'none';
    //     var message = document.getElementById('password-container');
    //     message.style.display = 'none';
    // }
</script>
@endsection

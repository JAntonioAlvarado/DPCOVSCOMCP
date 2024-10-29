@extends('layouts.app')

@section('title')
    SysVECSE - {{ $enterprise->name }}
@endsection

@section('content')
<div class="container">
    <h1>Editar empresa: {{ $enterprise->name }}</h1>
    <form action="{{ route('enterprises.update', $enterprise->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Información de la empresa -->
        <div class="enterprise-info">
            <div class="mb-3 fixed-container">
                <label for="name" class="form-label"><strong>Nombre de la empresa</strong></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $enterprise->name }}" required>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3 fixed-container">
                <label for="type" class="form-label"><strong>Tipo de empresa</strong></label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $enterprise->type }}" required>
                @if ($errors->has('type'))
                    <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                @endif
            </div>

            <div class="mb-3 fixed-container">
                <label for="sector" class="form-label"><strong>Sector de la empresa</strong></label>
                <input type="text" name="sector" id="sector" class="form-control" value="{{ $enterprise->sector }}" required>
                @if ($errors->has('sector'))
                    <div class="alert alert-danger">{{ $errors->first('sector') }}</div>
                @endif
            </div>

            <div class="mb-3 fixed-container">
                <label for="direction" class="form-label"><strong>Dirección de la empresa</strong></label>
                <textarea name="direction" id="direction" class="form-control" rows="2">{{ $enterprise->direction }}</textarea>
            </div>

            <div class="mb-3 fixed-container">
                <label for="description" class="form-label"><strong>Descripción de la empresa</strong></label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $enterprise->description }}</textarea>
            </div>

            <div class="mb-3 fixed-container">
                <label for="active" class="form-label"><strong>Estado de la empresa</strong></label>
                <select name="active" id="active" class="form-control">
                    <option value="1" {{ $enterprise->active ? 'selected' : '' }}>Activa</option>
                    <option value="0" {{ !$enterprise->active ? 'selected' : '' }}>Inactiva</option>
                </select>
            </div>
        </div>

        <!-- Información del representante -->
        <div class="enterprise-info">
            <h2>Información del representante</h2>
            @if ($enterprise->representative)
            {{-- agregar la propiedad "readonly" y la clase non-editable para hacer los objetos no editables --}}
                <div class="mb-3 fixed-container">
                    <label for="representative" class="form-label"><strong>Nombre</strong></label>
                    <input type="text" name="representative" id="representative" class="form-control" onclick="showMessage()" onblur="hideMessage()"
                    value="{{ $enterprise->representative ? $enterprise->representative->name : '' }}">
                    <p id="user-message">Si cambia el nombre del representante debe de generarle un nuevo nombre de usuario y una contraseña</p>
                    @if ($errors->has('representative'))
                        <div class="alert alert-danger">{{ $errors->first('representative') }}</div>
                    @endif
                </div>
                <div class="mb-3 fixed-container">
                    <label for="username" class="form-label"><strong>Nombre de usuario</strong></label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $enterprise->representative->username }}">
                    @if ($errors->has('username'))
                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                    @endif
                </div>
                <div class="mb-3 fixed-container">
                    <label for="password" class="form-label"><strong>Contraseña</strong></label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ $enterprise->representative->password }}">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            @else
                <p>Esta empresa no tiene representante asignado. Asigne uno:</p>
                <div class="mb-3 fixed-container">
                    <label for="representative" class="form-label"><strong>Nombre</strong></label>
                    <input type="text" name="representative" id="representative" class="form-control" onclick="showMessage()" onblur="hideMessage()" value="{{ old('representative') }}">
                    <p id="user-message">Si agrega un representante debe de generarle un nombre de usuario y una contraseña</p>
                    @if ($errors->has('representative'))
                        <div class="alert alert-danger">{{ $errors->first('representative') }}</div>
                    @endif
                </div>
                <div class="mb-3 fixed-container">
                    <label for="username" class="form-label"><strong>Nombre de usuario</strong></label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                    @endif
                </div>
                <div class="mb-3 fixed-container">
                    <label for="password" class="form-label"><strong>Contraseña</strong></label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>

            @endif
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
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
</script>
@endsection
@extends('layouts.app')

@section('title', 'SysVECSE - Empresas')

@section('content')
<div class="container">
    <h1>SysVECSE</h1>
    <h2>Empresas</h2>
    <div class="fixed-right">
        <a href="{{ route('enterprises.create') }}" class="btn btn-primary">Crear una nueva empresa</a>
    </div>
    <div class="accordion mt-4" id="accordionExample">
        
        <!-- Acordeón para empresas activas -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingActive">
                <button class="accordion-button enterprises-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseActive" aria-expanded="true" aria-controls="collapseActive">
                    Empresas Activas
                </button>
            </h2>
            {{-- Agregar data-bs-parent="#accordionExample" para hacer que no puedan estar los dos abiertos al mismo tiempo --}}
            <div id="collapseActive" class="accordion-collapse collapse show" aria-labelledby="headingActive">
                <div class="accordion-body">
                    @if($activeEnterprises->isEmpty())
                        <p>No hay empresas activas.</p>
                    @else
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Sector</th>
                                    <th>Representante</th>
                                    <th>Dirección</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeEnterprises as $enterprise)
                                    <tr>
                                        <td>{{ $enterprise->name }}</td>
                                        <td>{{ $enterprise->type }}</td>
                                        <td>{{ $enterprise->sector }}</td>
                                        <td>{{ $enterprise->representative ? $enterprise->representative->name : '' }}</td>
                                        <td>{{ $enterprise->direction }}</td>
                                        <td>{{ $enterprise->description }}</td>
                                        <td class="buttons">
                                            <a href="{{ route('enterprises.show', $enterprise) }}">
                                                <i class="fa-solid fa-eye" title="Ver"></i>
                                            </a>
                                            <a href="{{ route('enterprises.edit', $enterprise) }}">
                                                <i class="fa-regular fa-pen-to-square" title="Editar"></i>
                                            </a>
                                            <form action="{{ route('enterprises.toggleActive', $enterprise) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" style="border:none; background:none;">
                                                    <i class="fa-solid fa-power-off" title="Desactivar"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Acordeón para empresas inactivas -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingInactive">
                <button class="accordion-button enterprises-accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInactive" aria-expanded="false" aria-controls="collapseInactive">
                    Empresas Inactivas
                </button>
            </h2>
            <div id="collapseInactive" class="accordion-collapse collapse" aria-labelledby="headingInactive">
                <div class="accordion-body">
                    @if($inactiveEnterprises->isEmpty())
                        <p>No hay empresas inactivas.</p>
                    @else
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Sector</th>
                                    <th>Representante</th>
                                    <th>Dirección</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inactiveEnterprises as $enterprise)
                                    <tr>
                                        <td>{{ $enterprise->name }}</td>
                                        <td>{{ $enterprise->type }}</td>
                                        <td>{{ $enterprise->sector }}</td>
                                        <td>{{ $enterprise->representative->name }}</td>
                                        <td>{{ $enterprise->direction }}</td>
                                        <td>{{ $enterprise->description }}</td>
                                        <td class="buttons">
                                            <a href="{{ route('enterprises.show', $enterprise) }}">
                                                <i class="fa-solid fa-eye" title="Ver"></i>
                                            </a>
                                            <a href="{{ route('enterprises.edit', $enterprise) }}">
                                                <i class="fa-regular fa-pen-to-square" title="Editar"></i>
                                            </a>
                                            <form action="{{ route('enterprises.toggleActive', $enterprise) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" style="border:none; background:none;">
                                                    <i class="fa-solid fa-power-off" title="Activar"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
@endsection
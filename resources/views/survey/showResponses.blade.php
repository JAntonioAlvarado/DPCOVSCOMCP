<!-- resources/views/enterprises/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="responses-title">Respuestas de la Encuesta: {{ $survey->title }} <p> de la empresa {{ $surveyed->enterprise->name }}</h1>

    @foreach($sections as $section)
        <div class="section">
            <h2 class="section-title">{{ $section->title }}</h2>
            @foreach($section->questions as $question)
                <div class="mb-3">
                    <h4>{{ $question->question }}</h4>
                    <p><strong class="answer">Respuesta:</strong>
                        <label class="show-label"> 
                        @php
                            // Filtrar las respuestas que pertenecen a esta pregunta
                            $response = $question->responses->where('surveyed_id', $surveyed->id)->first();
                        @endphp
                        {{ $response ? ($response->answer ? 'Sí' : 'No') : 'No hay respuesta' }}
                        </label>
                    </p>
                </div>
            @endforeach
        </div>
    @endforeach

    <a href="{{ $surveyed->enterprise ? route('enterprises.show', $surveyed->enterprise->id) : '#' }}" class="btn btn-secondary">Volver a la empresa</a>
</div>
@endsection

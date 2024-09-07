@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Respuestas de la Encuesta: {{ $surveyed->survey->title }}<p> de la empresa {{ $surveyed->enterprise->name }}</h1>

    <form action="{{ route('survey.responses.update', $surveyed->id) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach($sections as $section)
            <div class="section">
                <h2 class="section-title">{{ $section->title }}</h2>
                @foreach($section->questions as $question)
                    <div class="mb-3">
                        <h4>{{ $question->question }}</h4>
                        @php
                            // Filtrar la respuesta correspondiente a la pregunta actual
                            $response = $question->responses->where('surveyed_id', $surveyed->id)->first();
                        @endphp

                        @if($response)
                            <div class="options-container">
                                <label class="option-label si">
                                    <input type="radio" name="responses[{{ $response->id }}][answer]" value="1" {{ $response->answer ? 'checked' : '' }}>
                                    <span>Sí</span>
                                </label>
                                <label class="option-label no">
                                    <input type="radio" name="responses[{{ $response->id }}][answer]" value="0" {{ !$response->answer ? 'checked' : '' }}>
                                    <span>No</span>
                                </label>
                            </div>
                        @else
                            <p class="text-danger">No hay respuesta disponible para esta pregunta.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Actualizar Respuestas</button>
    </form>
    <a href="{{ route('enterprises.show', $surveyed->enterprise->id) }}" class="btn btn-secondary">Volver a la empresa</a>
</div>
@endsection

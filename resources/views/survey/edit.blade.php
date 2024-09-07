<!-- resources/views/surveyeds/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Encuesta para {{ $enterprise->name }}</h1>
    <form action="{{ route('survey.update', $surveyed->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        @foreach($questions as $question)
            @php
                $response = $responses->firstWhere('question_id', $question->id);
            @endphp
            <div class="mb-3">
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $response->id }}][answer]" value="1" {{ $response->answer ? 'checked' : '' }} required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $response->id }}][answer]" value="0" {{ !$response->answer ? 'checked' : '' }} required> No
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

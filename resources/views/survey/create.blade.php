@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Encuesta para {{ $enterprise->name }}</h1>
    <a href="{{ route('survey.createSurvey') }}" class="btn btn-secondary mb-3">Crear Nueva Encuesta</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('survey.store', $enterprise->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="survey_id" class="form-label">Seleccionar Encuesta</label>
            <select name="survey_id" id="survey_id" class="form-control" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}">{{ $survey->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="accordion" id="accordionSections">
            @foreach($surveys as $survey)
                <div class="survey-questions d-none" data-survey-id="{{ $survey->id }}">
                    @foreach($survey->sections as $section)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSection{{ $section->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSection{{ $section->id }}" aria-expanded="false" aria-controls="collapseSection{{ $section->id }}">
                                    {{ $section->title }}
                                </button>
                            </h2>
                            <div id="collapseSection{{ $section->id }}" class="accordion-collapse collapse" aria-labelledby="headingSection{{ $section->id }}" data-bs-parent="#accordionSections">
                                <div class="accordion-body">
                                    @foreach($section->questions as $question)
                                        <div class="question-container">
                                            <p>{{ $question->question }}</p>
                                            <div class="options-container">
                                                <label class="option-label si">
                                                    <input type="radio" name="responses[{{ $question->id }}][answer]" value="1" required>
                                                    <span>Sí</span>
                                                </label>
                                                <label class="option-label no">
                                                    <input type="radio" name="responses[{{ $question->id }}][answer]" value="0" required>
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="responses[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    <a href="{{ route('enterprises.show', $enterprise->id) }}" class="btn btn-secondary">Volver a la empresa</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const surveySelect = document.getElementById('survey_id');
        const questionContainers = document.querySelectorAll('.survey-questions');
        
        surveySelect.addEventListener('change', function () {
            const selectedSurveyId = this.value;
            
            questionContainers.forEach(container => {
                if (container.dataset.surveyId == selectedSurveyId) {
                    container.classList.remove('d-none');
                } else {
                    container.classList.add('d-none');
                }
            });
        });

        surveySelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection

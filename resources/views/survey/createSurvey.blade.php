<!-- resources/views/survey/createSurvey.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Encuesta</h1>
    <form action="{{ route('survey.storeSurvey') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título de la Encuesta</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        
        <div id="sections-container">
            <div class="section-item">
                <h3>Sección 1</h3>
                <div class="mb-3">
                    <label for="sections[0][title]" class="form-label">Título de la Sección</label>
                    <input type="text" name="sections[0][title]" class="form-control" required>
                </div>
                <div class="questions-container">
                    <div class="question-item">
                        <label for="sections[0][questions][0][question]" class="form-label">Pregunta 1</label>
                        <input type="text" name="sections[0][questions][0][question]" class="form-control" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-question">Añadir Pregunta</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary add-section">Añadir Sección</button>
        <button type="submit" class="btn btn-primary">Guardar Encuesta</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let sectionIndex = 1;
        let questionIndex = 1;

        document.querySelector('.add-section').addEventListener('click', function () {
            const newSection = document.createElement('div');
            newSection.classList.add('section-item');
            newSection.innerHTML = `
                <h3>Sección ${sectionIndex + 1}</h3>
                <div class="mb-3">
                    <label for="sections[${sectionIndex}][title]" class="form-label">Título de la Sección</label>
                    <input type="text" name="sections[${sectionIndex}][title]" class="form-control" required>
                </div>
                <div class="questions-container">
                    <div class="question-item">
                        <label for="sections[${sectionIndex}][questions][0][question]" class="form-label">Pregunta 1</label>
                        <input type="text" name="sections[${sectionIndex}][questions][0][question]" class="form-control" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-question">Añadir Pregunta</button>
            `;
            document.getElementById('sections-container').appendChild(newSection);
            sectionIndex++;
            questionIndex = 1;
        });

        document.getElementById('sections-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('add-question')) {
                const questionsContainer = e.target.previousElementSibling;
                const newQuestion = document.createElement('div');
                newQuestion.classList.add('question-item');
                newQuestion.innerHTML = `
                    <label for="sections[${sectionIndex - 1}][questions][${questionIndex}][question]" class="form-label">Pregunta ${questionIndex + 1}</label>
                    <input type="text" name="sections[${sectionIndex - 1}][questions][${questionIndex}][question]" class="form-control" required>
                `;
                questionsContainer.appendChild(newQuestion);
                questionIndex++;
            }
        });
    });
</script>
@endsection

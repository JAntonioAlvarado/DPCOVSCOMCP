<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @vite(['resources/css/survey.css', 'public/css/app.css'])
</head>
<body>
    <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="form-label">Nombre del encuestado:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="accordion" id="accordionSections">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingReduce">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReduce" aria-expanded="true" aria-controls="collapseReduce">
                        Reducir consumo de insumos
                    </button>
                </h2>
                <div id="collapseReduce" class="accordion-collapse collapse" aria-labelledby="headingReduce" data-bs-parent="#accordionSections">
                    <div class="accordion-body">
                        <h3>En la empresa:</h3>
                        @foreach($reduceQuestions as $question)
                            <div class="question-container">
                                <p>{{ $question->question }}</p>
                                <div class="options-container">
                                    <label class="option-label si">
                                        <input type="radio" name="responses[{{ $loop->index }}][answer]" value="1" required>
                                        <span>Sí</span>
                                    </label>
                                    <label class="option-label no">
                                        <input type="radio" name="responses[{{ $loop->index }}][answer]" value="0" required>
                                        <span>No</span>
                                    </label>
                                </div>
                                <input type="hidden" name="responses[{{ $loop->index }}][section]" value="reduce">
                                <input type="hidden" name="responses[{{ $loop->index }}][question_id]" value="{{ $question->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingReuse">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReuse" aria-expanded="false" aria-controls="collapseReuse">
                        Reusar
                    </button>
                </h2>
                <div id="collapseReuse" class="accordion-collapse collapse" aria-labelledby="headingReuse" data-bs-parent="#accordionSections">
                    <div class="accordion-body">
                        <h3>En la empresa:</h3>
                        @foreach($reuseQuestions as $question)
                            <div class="question-container">
                                <p>{{ $question->question }}</p>
                                <div class="options-container">
                                    <label class="option-label si">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) }}][answer]" value="1" required>
                                        <span>Sí</span>
                                    </label>
                                    <label class="option-label no">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) }}][answer]" value="0" required>
                                        <span>No</span>
                                    </label>
                                </div>
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) }}][section]" value="reusar">
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) }}][question_id]" value="{{ $question->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRecover">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRecover" aria-expanded="false" aria-controls="collapseRecover">
                        Recuperar
                    </button>
                </h2>
                <div id="collapseRecover" class="accordion-collapse collapse" aria-labelledby="headingRecover" data-bs-parent="#accordionSections">
                    <div class="accordion-body">
                        <h3>La empresa incluye acciones para extender el uso del ciclo de vida de los productos y de sus partes:</h3>
                        @foreach($recoverQuestions as $question)
                            <div class="question-container">
                                <p>{{ $question->question }}</p>
                                <div class="options-container">
                                    <label class="option-label si">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][answer]" value="1" required>
                                        <span>Sí</span>
                                    </label>
                                    <label class="option-label no">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][answer]" value="0" required>
                                        <span>No</span>
                                    </label>
                                </div>
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][section]" value="recuperar">
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][question_id]" value="{{ $question->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRecycle">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRecycle" aria-expanded="false" aria-controls="collapseRecycle">
                        Reciclar
                    </button>
                </h2>
                <div id="collapseRecycle" class="accordion-collapse collapse" aria-labelledby="headingRecycle" data-bs-parent="#accordionSections">
                    <div class="accordion-body">
                        <h3>La empresa tiene un programa de reciclaje de residuos:</h3>
                        @foreach($recycleQuestions as $question)
                            <div class="question-container">
                                <p>{{ $question->question }}</p>
                                <div class="options-container">
                                    <label class="option-label si">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][answer]" value="1" required>
                                        <span>Sí</span>
                                    </label>
                                    <label class="option-label no">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][answer]" value="0" required>
                                        <span>No</span>
                                    </label>
                                </div>
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][section]" value="reciclar">
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][question_id]" value="{{ $question->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRemanufacture">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemanufacture" aria-expanded="false" aria-controls="collapseRemanufacture">
                        Remanufacturar
                    </button>
                </h2>
                <div id="collapseRemanufacture" class="accordion-collapse collapse" aria-labelledby="headingRemanufacture" data-bs-parent="#accordionSections">
                    <div class="accordion-body">
                        <h3>En la empresa:</h3>
                        @foreach($remanufactureQuestions as $question)
                            <div class="question-container">
                                <p>{{ $question->question }}</p>
                                <div class="options-container">
                                    <label class="option-label si">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][answer]" value="1" required>
                                        <span>Sí</span>
                                    </label>
                                    <label class="option-label no">
                                        <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][answer]" value="0" required>
                                        <span>No</span>
                                    </label>
                                </div>
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][section]" value="remanufacturar">
                                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][question_id]" value="{{ $question->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

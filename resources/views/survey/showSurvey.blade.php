<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
</head>
<body>
    <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre del encuestado:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <h2>Reducir consumo de insumos</h2>
        @foreach($reduceQuestions as $question)
            <div>
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $loop->index }}][answer]" value="1" required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $loop->index }}][answer]" value="0" required> No
                </label>
                <input type="hidden" name="responses[{{ $loop->index }}][section]" value="reduce">
                <input type="hidden" name="responses[{{ $loop->index }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <h2>Reusar</h2>
        @foreach($reuseQuestions as $question)
            <div>
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) }}][answer]" value="1" required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) }}][answer]" value="0" required> No
                </label>
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) }}][section]" value="reusar">
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <h2>Recuperar</h2>
        @foreach($recoverQuestions as $question)
            <div>
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][answer]" value="1" required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][answer]" value="0" required> No
                </label>
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][section]" value="recuperar">
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <h2>Reciclar</h2>
        @foreach($recycleQuestions as $question)
            <div>
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][answer]" value="1" required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][answer]" value="0" required> No
                </label>
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][section]" value="reciclar">
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <h2>Remanufacturar</h2>
        @foreach($remanufactureQuestions as $question)
            <div>
                <p>{{ $question->question }}</p>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][answer]" value="1" required> Sí
                </label>
                <label>
                    <input type="radio" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][answer]" value="0" required> No
                </label>
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][section]" value="remanufacturar">
                <input type="hidden" name="responses[{{ $loop->index + count($reduceQuestions) + count($reuseQuestions) + count($recoverQuestions) + count($recycleQuestions) }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

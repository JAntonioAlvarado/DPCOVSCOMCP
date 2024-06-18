<?php

namespace App\Http\Controllers;

use App\Models\Surveyeds;
use App\Models\Responses;
use App\Models\Reduce;
use App\Models\Reuse;
use App\Models\Recover;
use App\Models\Recycle;
use App\Models\Remanufacture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    // Mostrar el formulario del cuestionario
    public function show()
    {
        $reduceQuestions = Reduce::all();
        $reuseQuestions = Reuse::all();
        $recoverQuestions = Recover::all();
        $recycleQuestions = Recycle::all();
        $remanufactureQuestions = Remanufacture::all();
        
        return view('survey.showSurvey', compact('reduceQuestions', 'reuseQuestions', 'recoverQuestions', 'recycleQuestions', 'remanufactureQuestions'));
    }

    // Almacenar las respuestas del cuestionario
    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'responses' => 'required|array',
            'responses.*.section' => 'required|string',
            'responses.*.question_id' => 'required|integer',
            'responses.*.answer' => 'required|boolean',
        ]);

        // Crear el encuestado
        $surveyed = Surveyeds::create(['name' => $request->input('name')]);

        // Almacenar las respuestas
        foreach ($request->input('responses') as $response) {
            Responses::create([
                'surveyed_id' => $surveyed->id,
                'section' => $response['section'],
                'question_id' => $response['question_id'],
                'answer' => $response['answer'],
            ]);
        }

        return redirect()->back()->with('success', 'Survey submitted successfully.');
    }
}

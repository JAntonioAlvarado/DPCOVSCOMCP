<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Surveyeds;
use App\Models\Responses;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function create($enterprise_id)
    {
        $enterprise = Enterprise::findOrFail($enterprise_id);
        $surveys = Survey::with('sections.questions')->get();
        return view('survey.create', compact('enterprise', 'surveys'));
    }

    // Mostrar el formulario del cuestionario
    public function show($survey_id)
    {
        $survey = Survey::findOrFail($survey_id);
        $questions = $survey->questions;
        return view('survey.showSurvey', compact('survey', 'questions'));
    }

    // Almacenar las respuestas del cuestionario
    public function store(Request $request, $enterprise_id)
    {
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'responses.*.answer' => 'required|boolean',
            'responses.*.question_id' => 'required|exists:survey_questions,id', // Validación de question_id
        ]);

        // Verificar si ya existe una encuesta contestada para esta empresa y encuesta
        $existingSurveyed = Surveyeds::where('enterprise_id', $enterprise_id)
                                    ->where('survey_id', $request->survey_id)
                                    ->first();

        if ($existingSurveyed) {
            return redirect()->route('enterprises.show', $enterprise_id)
                                ->with('error', 'Esta encuesta ya ha sido contestada.');
        }

        // Si no existe, crear una nueva entrada
        $surveyed = Surveyeds::create([
            'enterprise_id' => $enterprise_id,
            'survey_id' => $request->survey_id,
        ]);

        // Debugging: Verificar los datos enviados desde el formulario
        // \Log::info('Respuestas recibidas:', $request->responses);

        // Depurar el Request para ver los datos que llegan
        foreach ($request->responses as $response) {
            // Asegúrate de que question_id y answer estén presentes
            if (!isset($response['question_id']) || !isset($response['answer'])) {
                return redirect()->back()->with('error', 'Faltan datos en las respuestas.');
            }

            // Almacenar las respuestas
            $surveyed->responses()->create([
                'answer' => $response['answer'],
                'survey_question_id' => $response['question_id'], // Cambiado a 'survey_question_id'
            ]);
        }

        return redirect()->route('enterprises.show', $enterprise_id)->with('success', 'Encuesta contestada exitosamente.');
    }



    public function edit($id)
    {
        $surveyed = Surveyeds::findOrFail($id);
        $enterprise = $surveyed->enterprise;
        $responses = $surveyed->responses;
        $questions = $surveyed->survey->questions;
        return view('survey.edit', compact('surveyed', 'enterprise', 'responses', 'questions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'responses.*.answer' => 'required|boolean',
        ]);

        $surveyed = Surveyeds::findOrFail($id);

        foreach ($request->responses as $response_id => $response_data) {
            $response = Responses::findOrFail($response_id);
            $response->update($response_data);
        }

        return redirect()->route('enterprises.show', $surveyed->enterprise_id)->with('success', 'Survey updated successfully.');
    }

        public function createSurvey()
    {
        return view('survey.createSurvey');
    }

    //Almacenar el cuestionario
    public function storeSurvey(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.questions.*.question' => 'required|string|max:255',
        ]);

        $survey = Survey::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        foreach ($request->sections as $sectionData) {
            $section = $survey->sections()->create(['title' => $sectionData['title']]);
            foreach ($sectionData['questions'] as $questionData) {
                $section->questions()->create(['question' => $questionData['question']]);
            }
        }

        return redirect()->route('survey.createSurvey')->with('success', 'Encuesta creada exitosamente.');
    }

    //Eliminar una encuesta
    public function destroy($id)
    {
        $surveyed = Surveyeds::findOrFail($id);
        $surveyed->responses()->delete(); // Elimina las respuestas asociadas
        $surveyed->delete(); // Elimina la encuesta

        return redirect()->route('enterprises.show', $surveyed->enterprise_id)->with('success', 'Encuesta eliminada correctamente.');
    }

    public function showResponses($surveyed_id)
    {
        // Encuentra la encuesta contestada junto con la encuesta asociada, las secciones, las preguntas y las respuestas
        $surveyed = Surveyeds::with(['survey.sections.questions.responses', 'enterprise'])->findOrFail($surveyed_id);

        // Encuesta asociada al encuestado
        $survey = $surveyed->survey;

        // Aseguramos que las secciones estén cargadas
        $sections = $survey->sections()->with('questions.responses')->get();

        return view('survey.showResponses', compact('surveyed', 'survey', 'sections'));
    }

    public function editResponses($id)
    {
        // Encuentra la encuesta contestada junto con la encuesta asociada, las secciones, las preguntas y las respuestas
        $surveyed = Surveyeds::with(['survey.sections.questions.responses', 'enterprise'])->findOrFail($id);

        // Encuesta asociada al encuestado
        $survey = $surveyed->survey;

        // Aseguramos que las secciones estén cargadas
        $sections = $survey->sections()->with('questions.responses')->get();

        return view('survey.editResponses', compact('surveyed', 'survey', 'sections'));
    }



    public function updateResponses(Request $request, $id)
    {
        $request->validate([
            'responses.*.answer' => 'required|boolean',
        ]);

        $surveyed = Surveyeds::findOrFail($id); // Encuentra la encuesta contestada

        foreach ($request->responses as $response_id => $response_data) {
            $response = Responses::findOrFail($response_id);
            $response->update(['answer' => $response_data['answer']]); // Actualizamos solo el campo 'answer'
        }

        return redirect()->route('survey.responses.show', $surveyed->id)->with('success', 'Respuestas actualizadas exitosamente.');
    }

}

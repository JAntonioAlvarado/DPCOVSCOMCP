<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\EnterpriseController;

// Route::get('/survey', [SurveyController::class, 'show'])->name('survey.show');
// Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
Route::resource('/enterprises', EnterpriseController::class);

Route::get('/enterprises/{enterprise_id}/survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/enterprises/{enterprise_id}/survey', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/survey/{survey_id}/show', [SurveyController::class, 'show'])->name('survey.show');
Route::get('/surveyeds/{id}/edit', [SurveyController::class, 'edit'])->name('survey.edit');
Route::put('/surveyeds/{id}', [SurveyController::class, 'update'])->name('survey.update');

// Vista para crear encuestas y rutas para almacenar y eliminar
Route::get('/survey/createSurvey', [SurveyController::class, 'createSurvey'])->name('survey.createSurvey');
Route::post('/survey/storeSurvey', [SurveyController::class, 'storeSurvey'])->name('survey.storeSurvey');
Route::delete('/surveyeds/{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');

// Vistas para las respuestas de las encuestas
Route::get('/surveyeds/{id}/responses', [SurveyController::class, 'showResponses'])->name('survey.responses.show');
Route::get('/surveyeds/{id}/responses/edit', [SurveyController::class, 'editResponses'])->name('survey.responses.edit');
Route::put('/surveyeds/{id}/responses', [SurveyController::class, 'updateResponses'])->name('survey.responses.update');

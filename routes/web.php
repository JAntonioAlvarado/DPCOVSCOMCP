<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;

// Rutas para la creación de usuarios
Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');

// Métodos para el Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas que requieren autenticación
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Ruta general de las empresas
// Route::middleware('auth')->group(function () {
    Route::resource('/enterprises', EnterpriseController::class);
// });
// Ruta para eliminar el representante de una empresa
Route::delete('enterprises/{enterprise}/remove-representative', [EnterpriseController::class, 'removeRepresentative'])->name('enterprises.removeRepresentative');

// Ruta para alternar el estado de las empresas
Route::patch('enterprises/{enterprise}/toggle-active', [EnterpriseController::class, 'toggleActive'])->name('enterprises.toggleActive');

// ENCUESTAS
// Rutas para crear una encuesta para una empresa específica. Visualización y subida
Route::get('/enterprises/{enterprise_id}/survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/enterprises/{enterprise_id}/survey', [SurveyController::class, 'store'])->name('survey.store');


Route::get('/survey/{survey_id}/show', [SurveyController::class, 'show'])->name('survey.show');
Route::get('/surveyeds/{id}/edit', [SurveyController::class, 'edit'])->name('survey.edit');
Route::put('/surveyeds/{id}', [SurveyController::class, 'update'])->name('survey.update');

// Vista para crear nuevos formatos de encuesta y rutas para almacenar y eliminar
Route::get('/survey/createSurvey', [SurveyController::class, 'createSurvey'])->name('survey.createSurvey');
Route::post('/survey/storeSurvey', [SurveyController::class, 'storeSurvey'])->name('survey.storeSurvey');
Route::delete('/surveyeds/{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');

// Vistas para las respuestas de las encuestas
Route::get('/surveyeds/{id}/responses', [SurveyController::class, 'showResponses'])->name('survey.responses.show');
Route::get('/surveyeds/{id}/responses/edit', [SurveyController::class, 'editResponses'])->name('survey.responses.edit');
Route::put('/surveyeds/{id}/responses', [SurveyController::class, 'updateResponses'])->name('survey.responses.update');

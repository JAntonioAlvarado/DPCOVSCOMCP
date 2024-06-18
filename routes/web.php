<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

Route::get('/survey', [SurveyController::class, 'show'])->name('survey.show');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
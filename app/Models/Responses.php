<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;

    protected $fillable = ['surveyed_id', 'survey_question_id', 'answer'];

    public function surveyed()
    {
        return $this->belongsTo(Surveyeds::class, 'surveyed_id');
    }

    public function surveyQuestion() {
        return $this->belongsTo(SurveyQuestion::class);
    }
}

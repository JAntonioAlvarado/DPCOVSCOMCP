<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['survey_section_id', 'question', 'type'];

    public function section() {
        return $this->belongsTo(Survey::class);
    }

    public function responses() {
        return $this->hasMany(Responses::class, 'survey_question_id');
    }
}

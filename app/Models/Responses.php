<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;

    protected $fillable = ['surveyed_id', 'section', 'question_id', 'answer'];

    public function surveyed()
    {
        return $this->belongsTo(Surveyeds::class);
    }
}

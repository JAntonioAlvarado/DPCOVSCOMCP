<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyeds extends Model
{
    use HasFactory;

    protected $fillable = ['enterprise_id', 'survey_id'];

    public function enterprise() {
        return $this->belongsTo(Enterprise::class);
    }

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function responses() {
        return $this->hasMany(Responses::class, 'surveyed_id');
    }
}

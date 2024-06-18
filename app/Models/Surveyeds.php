<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyeds extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function responses()
    {
        return $this->hasMany(Responses::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'sector', 'direction', 'description', 'active', 'user_id'];

    public function surveyeds()
    {
        return $this->hasMany(Surveyeds::class);
    }

    public function representative()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Activa' : 'Inactiva';
    }
}

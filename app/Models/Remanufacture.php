<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remanufacture extends Model
{
    use HasFactory;

    protected $table = 'remanufacture';

    protected $fillable = ['question'];
}

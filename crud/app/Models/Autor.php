<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable  = [
        'nome',
        'ano_de_nascimento',
        'sexo',
        'nacionalidade'
    ];
}

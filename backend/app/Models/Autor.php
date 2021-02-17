<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    protected $attributes = [
        'nome'=>'',
        'ano_de_nascimento'=>0,
        'sexo'=>'',
        'nacionalidade'=>''
    ];
    protected $fillable  = [
        'nome',
        'ano_de_nascimento',
        'sexo',
        'nacionalidade'
    ];
    public function livros()
    {
        return $this->belongsToMany('App\Livro', 'livro_autor');
    }
}

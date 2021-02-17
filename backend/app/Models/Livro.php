<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{

    protected $fillable = ['autor', 'genero', 'editora', 'titulo', 'ano_de_lancamento'];

    public function genero()
    {
        return $this->belongsTo('App\Models\Genero');
    }
    public function editora()
    {
        return $this->belongsTo('App\Models\Editora');
    }
    public function autores()
    {
        return $this->belongsToMany('App\Models\Autor', 'livro_autor');
    }
}

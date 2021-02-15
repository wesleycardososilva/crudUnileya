<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{

    protected $fillable  = [
        'nome'
    ];
    public function livros()
    {
        return $this->hasMany('App\Models\Livro');
    }
}

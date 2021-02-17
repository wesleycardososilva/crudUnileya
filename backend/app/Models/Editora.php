<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    public $timestamps = true;
    public $primaryKey= "id";

    protected $attributes = [
        'nome'=>''
    ];
    protected $fillable  = [
        'nome'
    ];
    public function livros()
    {
        return $this->hasMany('App\Models\Livro');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller
{
    public function  index()
    {

        $livros = Livro::get();

        return \response()->json($livros);
    }

    public function  add(Request $request)
    {

        $book = Livro::create($request->all());
        foreach ($request->get('autor') as $id) {
            $author = Autor::findOrFail($id);
            $book->autores()->save($author);
        }
        $book->save();
        return (true);
    }
    public function edit($id)
    {
        $livro = livro::findOrFail($id);
        return view('livros.formLivro', ['livro' => $livro]);
    }
    public function update($id, Request $request)
    {
        $livro = livro::findOrFail($id);
        $livro->update($request->all());
        return (true);
    }
    public function delete($id)
    {
        $livro = livro::findOrFail($id);
        $livro->delete();
        return (true);
    }
}

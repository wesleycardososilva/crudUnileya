<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
class LivrosController extends Controller
{
    public function  index(){

        $livros= Livro:: get();

        return view('livros.listaLivro', ['livros'=> $livros]);
    }
    public function  novo(){
        return view('livros.formLivro');
    }
    public function  add(Request $request){
        $livro = new Livro;
        $livro = $livro ->create( $request->all());
        return Redirect::to('/livros');
    }
    public function edit( $id){
        $livro= livro::findOrFail($id);
        return view('livros.formLivro',['livro' => $livro] );
    }
    public function update($id, Request $request){
        $livro= livro::findOrFail($id);
        $livro ->update( $request->all());
        return Redirect::to('/livros');
    }
    public function delete($id){
        $livro= livro::findOrFail($id);
        $livro ->delete();
        return Redirect::to('/livros');
    }
}

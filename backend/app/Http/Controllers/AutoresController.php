<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Redirect;
class AutoresController extends Controller
{
    public function  index(){
        $autores= Autor:: get();

        return view('autores.list', ['autores'=> $autores]);
    }
    public function  novo(){
        return view('autores.form');
    }
    public function  add(Request $request){
        $autor = new Autor;
        $autor = $autor ->create( $request->all());
        return Redirect::to('/autores');
    }
    public function edit( $id){
        $autor= autor::findOrFail($id);
        return view('autores.form',['autor' => $autor] );
    }
    public function update($id, Request $request){
        $autor= autor::findOrFail($id);
        $autor ->update( $request->all());
        return Redirect::to('/autores');
    }
    public function delete($id){
        $autor= autor::findOrFail($id);
        $autor ->delete();
        return Redirect::to('/autores');
    }
}

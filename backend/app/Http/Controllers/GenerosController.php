<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
class GenerosController extends Controller
{
    public function  index(){
        $generos= Genero:: get();

        return view('genero.listaGenero', ['generos'=> $generos]);
    }
    public function  novo(){
        return view('genero.formGenero');
    }
    public function  add(Request $request){
        $genero = new Genero;
        $genero = $genero ->create( $request->all());
        return \Redirect::back();
    }
    public function edit( $id){
        $genero= genero::findOrFail($id);
        return view('genero.formGenero',['genero' => $genero] );
    }
    public function update($id, Request $request){
        $genero= genero::findOrFail($id);
        $genero ->update( $request->all());
        return \Redirect::back();
    }
    public function delete($id){
        $genero= genero::findOrFail($id);
        $genero ->delete();
        return \Redirect::back();
    }
}

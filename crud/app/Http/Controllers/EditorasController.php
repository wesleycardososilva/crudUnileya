<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
class EditorasController extends Controller
{
    public function  index(){
        $editoras= Editora:: get();

        return view('editoras.listaEditora', ['editoras'=> $editoras]);
    }
    public function  novo(){
        return view('editoras.formEditora');
    }
    public function  add(Request $request){
        $editora = new Editora;
        $editora = $editora ->create( $request->all());
        return \Redirect::back();
    }
    public function edit( $id){
        $editora= editora::findOrFail($id);
        return view('editoras.formEditora',['editora' => $editora] );
    }
    public function update($id, Request $request){
        $editora= editora::findOrFail($id);
        $editora ->update( $request->all());
        return \Redirect::back();
    }
    public function delete($id){
        $editora= editora::findOrFail($id);
        $editora ->delete();
        return \Redirect::back();
    }
}

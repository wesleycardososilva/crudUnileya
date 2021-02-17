<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Redirect;
class AutoresController extends Controller
{
    public function  index(){
        $autores= Autor:: get();
        return \response()->json($autores);

    }
    public function  novo(){
        return view('autores.form');
    }
    public function  add(Request $request){
        $autor = new Autor;
        $autor = $autor ->create( $request->all());
        return($autor);
    }
    public function edit( $id){
        $autor= autor::findOrFail($id);
        return view('autores.form',['autor' => $autor] );
    }
    public function update($id, Request $request){
        $autor= autor::findOrFail($id);
        $autor ->update( $request->all());
        return(true);
    }
    public function delete($id){
        $autor= autor::findOrFail($id);
        $autor ->delete();
        return(true);

    }
    public function get( $id){
        $autor= autor::findOrFail($id);
        return \response()->json($autor);
    }
}

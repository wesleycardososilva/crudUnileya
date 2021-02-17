<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
class EditorasController extends Controller
{
    public function  index(){
        $editoras= Editora:: get();

        return \response()->json($editoras);
    }
    public function  add(Request $request){
        $editora = new Editora;
        $editora = $editora ->create( $request->all());
        return (true);
    }

    public function update($id, Request $request){
        $editora= editora::findOrFail($id);
        $editora ->update( $request->all());
        return(true);
    }
    public function delete($id){
        $editora= editora::findOrFail($id);
        $editora ->delete();
        return(true);
    }
    public function get( $id){
        $editora= editora::findOrFail($id);
        return \response()->json($editora);
    }
}

<?php

namespace App\Http\Controllers;

use App\Academia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademiaController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function checkData($request){
        $validateData = $this->validate($request,[
            'nombre' => 'required|unique:academias|max:60',
        ]);
    }
    public function showAll(){
        return response()->json(Academia::all());
    }
    public function find($id){
        return response()->json(Academia::find($id));
    }
    public function store(Request $request){
        $this->checkData($request);

        $academia = new Academia;
        $academia->nombre = $request->nombre;
        return response()->json($academia->save());
    }
    public function edit(Request $request, $id){
        $academia = $this->find($id);
        $academia = $academia->original;
        $exist = (array)$academia;
        if(!count($exist)){
            return response("Academia no encontrada", 400);
        }
        if(strtoupper($academia->nombre)!=strtoupper($request->nombre)){
            $this->checkData($request);
        }

        $academia->nombre = $request->nombre;
        return response()->json($academia->save());

    }
    public function destroy($id){
        $academia = $this->find($id);
        $academia = $academia->original;
        $exist = (array)$academia;
        if(!count($exist)){
            return response("Academia no encontrada", 400);
        }
        return response()->json($academia->delete());
    }
}
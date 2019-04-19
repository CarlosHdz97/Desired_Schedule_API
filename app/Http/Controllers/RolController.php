<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolController extends Controller{
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
            'descripcion' => 'required|unique:roles|max:60',
        ]);
    }
    public function showAll(){
        return response()->json(Rol::all());
    }
    public function find($id){
        return response()->json(Rol::find($id));
    }
    public function store(Request $request){
        $this->checkData($request);

        $rol = new Rol;
        $rol->descripcion = $request->descripcion;
        return response()->json($rol->save());
    }
    public function edit(Request $request, $id){
        $rol = $this->find($id);
        $rol = $rol->original;
        $exist = (array)$rol;
        if(!count($exist)){
            return response("Rol no encontrado", 400);
        }
        if(strtoupper($rol->descripcion)!=strtoupper($request->descripcion)){
            $this->checkData($request);
        }

        $rol->descripcion = $request->descripcion;
        return response()->json($rol->save());

    }
    public function destroy($id){
        $rol = $this->find($id);
        $rol = $rol->original;
        $exist = (array)$rol;
        if(!count($exist)){
            return response("Rol no encontrado", 400);
        }
        return response()->json($rol->delete());
    }
}
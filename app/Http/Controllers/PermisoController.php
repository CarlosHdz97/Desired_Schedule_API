<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermisoController extends Controller{
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
            'descripcion' => 'required|unique:permisos|max:60',
        ]);
    }
    public function showAll(){
        return response()->json(Permiso::all());
    }
    public function find($id){
        return response()->json(Permiso::find($id));
    }
    public function store(Request $request){
        $this->checkData($request);

        $permiso = new Permiso;
        $permiso->descripcion = $request->descripcion;
        return response()->json($permiso->save());
    }
    public function edit(Request $request, $id){
        $permiso = $this->find($id);
        $permiso = $permiso->original;
        $exist = (array)$permiso;
        if(!count($exist)){
            return response("Permiso no encontrado", 400);
        }
        if(strtoupper($permiso->descripcion)!=strtoupper($request->descripcion)){
            $this->checkData($request);
        }
        $permiso->descripcion = $request->descripcion;
        return response()->json($permiso->save());
    }
    public function destroy($id){
        $permiso = $this->find($id);
        $permiso = $permiso->original;
        $exist = (array)$permiso;
        if(!count($exist)){
            return response("Permiso no encontrado", 400);
        }
        
        return response()->json($permiso->delete());

    }
}
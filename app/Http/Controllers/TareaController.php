<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TareaController extends Controller{
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
            'nombre' => 'required|unique:tareas|max:60',
        ]);
    }
    public function showAll(){
        return response()->json(Tarea::all());
    }
    public function find($id){
        return response()->json(Tarea::find($id));
    }
    public function store(Request $request){
        $this->checkData($request);

        $tarea = new Tarea;
        $tarea->nombre = $request->nombre;
        return response()->json($tarea->save());
    }
    public function edit(Request $request, $id){
        $tarea = $this->find($id);
        $tarea = $tarea->original;
        $exist = (array)$tarea;
        if(!count($exist)){
            return response("Tarea no encontrada", 400);
        }
        if(strtoupper($tarea->nombre)!=strtoupper($request->nombre)){
            $this->checkData($request);
        }

        $tarea->nombre = $request->nombre;
        return response()->json($tarea->save());

    }
    public function destroy($id){
        $tarea = $this->find($id);
        $tarea = $tarea->original;
        $exist = (array)$tarea;
        if(!count($exist)){
            return response("Tarea no encontrado", 400);
        }
        return response()->json($tarea->delete());
    }
}
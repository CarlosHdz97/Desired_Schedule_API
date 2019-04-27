<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller{
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
            'curp' => 'required|unique:users|max:18',
            'email' => 'required|unique:users|max:100',
            'rol_id' => 'required|exists:roles'
        ]);
    }
    public function showAll(){
        return response()->json(User::all());
    }
    public function find($id){
        return response()->json(User::find($id));
    }
    public function store(Request $request){
        $this->checkData($request);

        $user = new User;
        $user->curp = $request->curp;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->nombres = $request->nombres;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->nivel_academico = $request->nivel_academico;
        $user->formacion_academica = $request->formacion_academica;
        $user->horas_nombramiento = $request->horas_nombramiento;
        $user->dictamen_categoria_docente = $request->dictamen_categoria_docente;
        $user->rol_id = $request->rol_id;
        $user->password = $request->password;
        return response()->json($user->save());
    }
    public function edit(Request $request, $id){
        $user = $this->find($id);
        $user = $user->original;
        $exist = (array)$user;
        if(!count($exist)){
            return response("Usuario no encontrado", 400);
        }
        if(strtoupper($user->curp)!=strtoupper($request->curp)){
            $this->checkData($request);
        }

        $user->curp = $request->curp;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->nombres = $request->nombres;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->nivel_academico = $request->nivel_academico;
        $user->formacion_academica = $request->formacion_academica;
        $user->horas_nombramiento = $request->horas_nombramiento;
        $user->dictamen_categoria_docente = $request->dictamen_categoria_docente;
        $user->rol_id = $request->rol_id;
        $user->password = $request->password;
        return response()->json($user->save());

    }
    public function destroy($id){
        $user = $this->find($id);
        $user = $user->original;
        $exist = (array)$user;
        if(!count($exist)){
            return response("Usuario no encontrado", 400);
        }
        return response()->json($user->delete());
    }
}
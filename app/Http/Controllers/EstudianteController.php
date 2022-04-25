<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    public function crearEstudiante(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'cedula' => 'required',
                'nombre' => 'required',
                'email' => 'required',
                'telefono' => 'required',
            ],

            [
                'cedula.required' => '*Rellena este campo',
                'nombre.required' => '*Rellena este campo',
                'email.required' => '*Rellena este campo',
                'telefono.required' => '*Rellena este campo',
            ]
        );

        $estudianteNuevo = new Estudiante();
        $estudianteNuevo->cedula = $request->cedula; 
        $estudianteNuevo->nombre = $request->nombre; 
        $estudianteNuevo->email = $request->email;
        $estudianteNuevo->telefono = $request->telefono;

        $response = $estudianteNuevo->save();

        return response()->json(["response" => $response], 200);
    }

    public function traerEstudiante($id_estudiante)
    {
        $estudiante = Estudiante::where('id_estudiante', $id_estudiante)->get();
        return response()->json($estudiante);
    }

    public function traerEstudiantes()
    {
        $estudiantes = Estudiante::get();
        return response()->json($estudiantes);
    }

    public function editarEstudiante(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'cedula' => 'required',
                'nombre' => 'required',
                'email' => 'required',
                'telefono' => 'required',
            ],

            [
                'cedula.required' => '*Rellena este campo',
                'nombre.required' => '*Rellena este campo',
                'email.required' => '*Rellena este campo',
                'telefono.required' => '*Rellena este campo',
            ]
        );

        $estudiante = Estudiante::findOrFail($request->id_estudiante);
        $estudiante->cedula = $request->cedula; 
        $estudiante->nombre = $request->nombre; 
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;

        $response = $estudiante->save();

        return response()->json(["response" => $response], 200);
    }

    public function eliminarEstudiante($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        $estudiante->delete();

        $res = response()->json(["response" => 'Se eliminó'], 200);
        return $res;
    }
}

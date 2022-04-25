<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramaController extends Controller
{
    public function crearPrograma(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'descripcion' => 'required',
            ],

            [
                'nombre.required' => '*Rellena este campo',
                'descripcion.required' => '*Rellena este campo',
            ]
        );

        $programaNuevo = new Programa();
        $programaNuevo->nombre = $request->nombre; 
        $programaNuevo->descripcion = $request->descripcion;

        $response = $programaNuevo->save();

        return response()->json(["response" => $response], 200);
    }

    public function traerPrograma($id_programa)
    {
        $programa = Programa::where('id_programa', $id_programa)->get();
        return response()->json($programa);
    }

    public function traerProgramas()
    {
        $programas = Programa::get();
        return response()->json($programas);
    }

    public function editarPrograma(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'descripcion' => 'required',
            ],

            [
                'nombre.required' => '*Rellena este campo',
                'descripcion.required' => '*Rellena este campo',
            ]
        );

        $programa = Programa::findOrFail($request->id_programa);
        $programa->nombre = $request->nombre; 
        $programa->descripcion = $request->descripcion;

        $response = $programa->save();

        return response()->json(["response" => $response], 200);
    }

    public function eliminarPrograma($id_programa)
    {
        $programa = Programa::findOrFail($id_programa);
        $programa->delete();

        $res = response()->json(["response" => 'Se eliminó'], 200);
        return $res;
    }
}

<?php

namespace App\Http\Controllers;

use App\Comunicacion;
use Illuminate\Http\Request;
use PDOException;

class ComunicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comunicacion::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'empleado' => 'nullable|max:50',
            'tipo_comunicacion'=> 'required|max:50',
            'departamento' => 'required|max:50',
            'mensaje_comunicacion' => 'required|max:255',
            'estado' => 'required'
        ]);

        try {
            $comunicaciones = Comunicacion::findOrFail($id);
            $comunicaciones->update($request->all());
        } catch (PDOException $pdo) {
            return [
                've' => $pdo,
                'message' => 'Ha ocurrido un error al actualizar un campo.'
            ];
        }

        return response()->json([
            'comunicacion' => $comunicaciones,
            'message' => 'El estado de la comunicación se ha modificado correctamente'
        ], 200);
    }
}

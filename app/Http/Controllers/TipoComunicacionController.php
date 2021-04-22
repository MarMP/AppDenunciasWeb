<?php

namespace App\Http\Controllers;

use App\TipoComunicacion;
use Illuminate\Http\Request;
use PDOException;

class TipoComunicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoComunicacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'incidencia' => 'required'
        ]);
        try {
            $comunicacion = TipoComunicacion::create([
                'incidencia' => request('incidencia')
            ]);
        } catch (PDOException $pdo) {
            return [
                'pdo' => $pdo,
                'message' => 'Esta incidencia ya existe'
            ];
        }

        return response()->json([
            'incidencia' => $comunicacion,
            'message' => 'Incidencia añadida correctamente'
        ], 200);
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
            'incidencia' => 'required'
        ]);
        try {
            $comunicacion = TipoComunicacion::findOrFail($id);
            $comunicacion->update($request->all());
        } catch (PDOException $pdo) {
            return [
                'pdo' => $pdo,
                'message' => 'Esta incidencia ya esta registrada'
            ];
        }
        return response()->json([
            'incidencia' => $comunicacion,
            'message' => 'Incidencia actualizada correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incidencia = TipoComunicacion::findOrFail($id);
        $incidencia->delete();
        return 204;
    }
}

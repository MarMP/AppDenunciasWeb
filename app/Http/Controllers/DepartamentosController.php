<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use PDOException;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Departamento::all();
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
            'departamento' => 'required'
        ]);
        try {
            $departamentos = Departamento::create([
                'departamento' => request('departamento')
            ]);
        } catch (PDOException $pdo) {
            return [
                'pdo' => $pdo,
                'message' => 'El departamento ya existe'
            ];
        }

        return response()->json([
            'departamento' => $departamentos,
            'message' => 'Departamento añadido correctamente'
        ], 200);

        // return Departamento::create($request->all());
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
            'departamento' => 'required'
        ]);
        try {
            $departamento = Departamento::findOrFail($id);
            $departamento->update($request->all());
        } catch (PDOException $pdo) {
            return [
                'pdo' => $pdo,
                'message' => 'Este departamento ya esta registrado'
            ];
        }
        return response()->json([
            'departamento' => $departamento,
            'message' => 'Departamento actualizado correctamente'
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
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return 204;
    }
}

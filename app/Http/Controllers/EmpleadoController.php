<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Mail\EmpleadosContrasena;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use PDOException;

class EmpleadoController extends Controller
{
    /*Función para generar contraseñas aleatorias sin encriptar */
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleado::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrasena = $this->generateRandomString();

        $this->validate($request, [
            'nombre' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'id_departamento' => 'required',
            'puesto'=> 'nullable|max:50',
            'email' => 'required',
            'telefono'=> 'nullable',
            'foto_empleado' => 'nullable',
            'password' => $contrasena,
        ]);

        //Enviar email al nuevo usuario con su contraseña de inicio de sesión
        Mail::to($request->email)->send(new EmpleadosContrasena($contrasena));

        try {
            $empleados = Empleado::create([
                'nombre' => request('nombre'),
                'apellidos' => request('apellidos'),
                'id_departamento' => request('id_departamento'),
                'puesto'=> request('puesto'),
                'email' => request('email'),
                'telefono'=> request('telefono'),
                'foto_empleado' => request('foto_empleado'),
                'password' => bcrypt($contrasena),
            ]);
        } catch (PDOException $pdo) {
            return [
                've' => $pdo,
                'message' => 'Este empleado ya existe'
            ];
        }
        return response()->json([
            'empleado' => $empleados,
            'message' => 'Empleado añadido correctamente'
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
            'nombre' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'id_departamento' => 'required',
            'puesto'=> 'nullable|max:50',
            'email' => 'required',
            'telefono'=> 'nullable',
            'foto_empleado' => 'nullable',
            'password' => 'required'
        ]);

        try {
            $empleados = Empleado::findOrFail($id);
            $empleados->update($request->all());
        } catch (PDOException $pdo) {
            return [
                've' => $pdo,
                'message' => 'Este empleado ya existe'
            ];
        }
        return response()->json([
            'empleado' => $empleados,
            'message' => 'Empleado actualizado correctamente'
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
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return 204;
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Http\Request;
use PDOException;


class AdministradorController extends Controller
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
        return User::all();
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
            'name' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'role_id' => 'required', 'integer',
            'email' => 'required',
            'password' => $contrasena,
        ]);

        //Enviar email al nuevo usuario con su contraseña de inicio de sesión
        Mail::to($request->email)->send(new MessageReceived($contrasena));

        try {
            $admin = User::create([
                'name' => request('name'),
                'apellidos' => request('apellidos'),
                'role_id' => request('role_id'),
                'email' => request('email'),
                'password' => bcrypt($contrasena),
            ]);
        } catch (PDOException $pdo) {
            return [
                've' => $pdo,
                'message' => 'Este administrador ya existe'
            ];
        }
        //dd($request->password);


        return response()->json([
            'admin' => $admin,
            'message' => 'Administrador añadido correctamente'
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
            'name' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'role_id' => 'required', 'integer',
            'email' => 'required',
            'password' => 'required', 'string', 'min:8',
        ]);

        try {
            $admin = User::findOrFail($id);
            $admin->update($request->all());
        } catch (PDOException $pdo) {
            return [
                've' => $pdo,
                'message' => 'Este administrador ya existe'
            ];
        }

        return response()->json([
            'admin' => $admin,
            'message' => 'Administrador actualizado correctamente'
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
        $admin = User::findOrFail($id);
        $admin->delete();
        return 204;
    }
}

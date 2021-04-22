<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('perfil');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'contraseña_actual' => ['required', new MatchOldPassword],
            'nueva_contraseña' => ['required', 'string', 'min:8'],
            'confirmar_contraseña' => ['same:nueva_contraseña'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->nueva_contraseña)]);

        return redirect()->back()->with('status', '¡Contraseña actualizada correctamente!');

        //dd('Contraseña cambiada correctamente.');
    }
}

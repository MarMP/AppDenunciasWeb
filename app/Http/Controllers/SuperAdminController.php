<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller {
    //Carga el middleware EsSuperAdmin en el constructor
    public function __construct(){
        $this->middleware('EsSuperAdmin');
    }
    //función para los usuarios registrados como superAdmin
    public function index(){
        return view('inicioSuperAdmin');
    }
}

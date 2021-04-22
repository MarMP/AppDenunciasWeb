<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsAdminController extends Controller {
    //Carga el middleware EsSuperAdmin en el constructor
    public function __construct() {
        $this->middleware('EsAdmin');
    }
    //función para los usuarios registrados como Admin
    public function index() {
        return view('inicioAdministrador');
    }
}

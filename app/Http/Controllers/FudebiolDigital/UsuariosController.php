<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class UsuariosController extends Controller
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

    /* Llama la vista de mantenimiento de categorías */
    public function mantenimientoUsuarios(){
          return view('app\MantenimientoUsuarios');
    }
     
        
}

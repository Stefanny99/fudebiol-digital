<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;


class PadrinosController extends Controller
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
    public function mantenimientoPadrinos(){
    	return view('app/PadrinosView');
    }

    public function registrarPadrinos(){
    	return view('app/RegistrarPadrinosView');
    }

    public function reporteGlobal(){
    	return view('app/ReportePadrinoGlobalView');
    }
    public function reporteEspecifico(){
    	return view('app/ReportePadrinoEspecificoView');
    }
     
	
}

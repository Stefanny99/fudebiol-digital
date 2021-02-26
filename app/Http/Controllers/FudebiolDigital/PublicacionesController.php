<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;


class PublicacionesController extends Controller
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
    public function publicaciones(){
    	return view('app/PublicacionesView');
    }
    public function editorPublicaciones(){
    	return view('app/EditorPublicacionesView');
    }
    public function administrarPublicaciones(){
    	return view('app/AdministrarPublicacionesView');
    }

    
     
	
}

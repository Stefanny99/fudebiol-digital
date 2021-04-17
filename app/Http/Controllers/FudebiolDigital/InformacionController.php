<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;


class InformacionController extends Controller{
    public function informacion(){
    	return view('app/InformacionView');
    }
    public function sobreNosotros(){
    	return view('app/aboutUsView');
    }
    public function mensajes(){
    	return view('app/MensajesView');
    }
    public function notificaciones(){
    	return view('app/NotificacionesView');
    }
    
	
}

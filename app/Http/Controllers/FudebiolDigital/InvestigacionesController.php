<?php

namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Helper\Util;


class InvestigacionesController extends Controller{
    public function investigaciones(){
    	return view('app/InvestigacionesView');
    }
}

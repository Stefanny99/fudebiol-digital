<?php
namespace App\Http\Controllers\FudebiolDigital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helper\Util;
use App\Models\ArbolesModel;

class ArbolesController extends Controller{
	public function registrarArbol(){
		$model = new ArbolesModel();
		$model->obtenerArboles();
		return view('app/RegistroArbolesView');
	}
}
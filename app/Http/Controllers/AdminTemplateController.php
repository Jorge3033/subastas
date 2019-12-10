<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class AdminTemplateController extends Controller
{
    public function index(){
    	$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
			return view('layouts.adminTemplate');
		}
    }
}

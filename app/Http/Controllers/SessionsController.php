<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\admin;
use Session; 
class SessionsController extends Controller
{
    public function login(){
    	return view('page.login');
    }

    public function checkLogin(Request $r){

    	$this->validate($r,[
    	 	'correo'=>['regex:/^[a-z,A-Z,1-9,]*@[a-z,A-Z,1-9,]*.[a-z,A-Z,1-9,]{1}[a-z,A-Z,1-9,]*$/'],
            'password'=>['regex:/^[a-z,A-Z,1-9, ]*$/'],
        ]);
    	
    	$correo=$r->correo;
    	$password=$r->password;
    	$consulta;
    	$consulta=admin::where('email','=',$correo)
    				   ->where('password','=',$password)
    				   ->where('status','=','activo')
    				   ->get();
    	
   		if (count($consulta)>0) {
   			Session::put('sessionName', $consulta[0]->name);
   			Session::put('sessionPhoto', $consulta[0]->photo); 
    		return redirect('/adminTemplate');    		
    	}else{
    		$consulta=user::where('mail','=',$correo)
    				      ->where('password','=',$password)
    				      ->where('status','=','activo')
    			   	      ->get();
    		if (count($consulta)>0) {

                Session::put('sessionNameUser', $consulta[0]->name);
    			Session::put('sessionPhotoUser', $consulta[0]->photo);
				return redirect('/');

    		}else{
    			Session::flash('error','Los datos ingresados son incorrectos verifica bien!');
				return redirect()->route('login');
    		}

    	}
    		 
    
	}

	public function logOutAdmin(){
   	 	
		Session::forget('sessionName');
        Session::forget('sessionPhoto');
        Session::flash('error', 'Sesion Admin Cerrada Correctamente');
		return redirect('/login');


  	}

    public function logOutUser(){
        
        Session::forget('sessionNameUser');
        Session::forget('sessionPhotoUser');
        Session::flash('error', 'Sesion Cerrada Correctamente');
        return redirect('/login');


    }
    

}
 
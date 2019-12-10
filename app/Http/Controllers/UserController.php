<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Session;
class UserController extends Controller
{
    public function generateReport(){
		
		$report= User::all();
		$report= User::get();
		return $report;
	}

	public function lastId(){
		$lastId= user::orderby('id','desc')->take(1)->get();
		$nextId=$lastId[0]->id+1;
		return $nextId;
	}
	public function report(){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$report=$this->generateReport();
		
		$nextId=$this->lastId();
		
		return view('system.admin.tables.users.report')
			   ->with('report',$report) 
			   ->with('nextId',$nextId); 
		}	   
	
	}


	public function formUpUser(){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$nextId=$this->lastId();
		return view('system.admin.tables.users.up')
					->with('nextId',$nextId);
		}
	}


	public function up(Request $request){

		$this->validate($request,[
    	 	'usuario'=>'required|string',
    	 	'contrasena'=>'required',
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'apellido'=>['regex:/^[A-Z,a-z][A-Z,a-z, ]*$/'],
            'correo'=>['regex:/^[a-z,A-Z,0-9]*@[a-z,A-Z]*.[a-z,A-Z]*$/'],
            'photo'=>'mimes:jpeg,png,gif,jpg',
        ]);

		$user=$request->usuario;

	   $file=$request->file('photo');
	   if ($file!="") {
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$user.$img;
            \Storage::disk('userPhoto')->put($img2,\File::get($file));
	   } else {
	   		if ($request->sexo=="H") {
	   			$img2="noPhotoMan.png";
	   		} else {
	   			$img2="noPhotoWoman.jfif";
	   		}
	   		 
	   }
	    
	   $nextId=$this->lastId();
	   
	   $user= new User;
	   $user->id=$nextId;
	   $user->user=$request->usuario;
	   $user->password=$request->contrasena;
	   $user->name=$request->nombre;
	   $user->LastName=$request->apellidos;
	   $user->sex=$request->sexo;
	   $user->mail=$request->correo;
	   $user->phone=$request->telefono;
	   $user->photo=$img2;
	   $user->status=$request->estado;
	   $user->save();


	   $usuario=$request->usuario;
	   $imagen="photos/usersPhotos/".$img2;
	   $action="Registrado";

	   return view('system.admin.tables.users.menssaje')
	   			  ->with("usuario",$usuario)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarUser($userId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $consulta =User::where('id','=',$userId)->get();
		 return view('system.admin.tables.users.modificarUser')->with('consulta',$consulta[0]);
		}
	}

	public function modificarUsers(Request $request){
		
		$this->validate($request,[
    	 	'usuario'=>'required|string',
    	 	'contrasena'=>'required',
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'apellido'=>['regex:/^[A-Z,a-z][A-Z,a-z, ]*$/'],
            'correo'=>['regex:/^[a-z,A-Z,0-9]*@[a-z,A-Z]*.[a-z,A-Z]*$/'],
            'photo'=>'mimes:jpeg,png,gif,jpg',
        ]);

		$user=$request->usuario;

	   $file=$request->file('photo');
	   if ($file!="") {
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$user.$img;
            \Storage::disk('userPhoto')->put($img2,\File::get($file));
	   } else {
	   		
	   		$img2=$request->imagen;	 
	   }
	    
	    
	   
	   $user= User::find($request->id);
	   $user->id=$request->id;
	   $user->user=$request->usuario;
	   $user->password=$request->contrasena;
	   $user->name=$request->nombre;
	   $user->LastName=$request->apellidos;
	   $user->sex=$request->sexo;
	   $user->mail=$request->correo;
	   $user->phone=$request->telefono;
	   $user->photo=$img2;
	   $user->status=$request->estado;
	   $user->save();


	   $usuario=$request->usuario;
	   $imagen="photos/usersPhotos/".$img2;
	   $action="Actualizado";
	   

	   return view('system.admin.tables.users.menssaje')
	   			  ->with("usuario",$usuario)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);

	}

	  

	public function lock($userId){
		 $s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $user= User::find($userId);
		 $user->status="inactivo";
		 $user->save();
		 return redirect('/reportUsers');
		}
	}

	public function unlock($userId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$user= User::find($userId);
		 $user->status="activo";
		 $user->save();
		 return redirect('/reportUsers');
		}
	}
}

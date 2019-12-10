<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Session;
class AdminController extends Controller
{
	
    public function generateReport(){
		
		$report= admin::all();
		$report= admin::get();
		return $report;
	}

	public function lastId(){
		$lastId= admin::orderby('id','desc')->take(1)->get();
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
		
		return view('system.admin.tables.admins.report')
			   ->with('report',$report) 
			   ->with('nextId',$nextId); 
		}	   
	}
 
	
	public function formUpAdmin(){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$nextId=$this->lastId();
		return view('system.admin.tables.admins.up')
					->with('nextId',$nextId);
		}
	}


	public function up(Request $request){
		//return $request;
		
		$this->validate($request,[
    	 	'contrasena'=>'required',
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'apellido'=>['regex:/^[A-Z,a-z][A-Z,a-z, ]*$/'],
            'correo'=>['regex:/^[a-z,A-Z,0-9]*@[a-z,A-Z]*.[a-z,A-Z]*$/'],
            'photo'=>'mimes:jpeg,png,gif,jpg',
        ]);

		
		$admin=$request->nombre;

	   $file=$request->file('photo');
	   if ($file!="") {
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$admin.$img;
            \Storage::disk('adminPhoto')->put($img2,\File::get($file));
	   } else {
	   		
	   			$img2="noPhotoMan.png";
	   		 
	   }
	    
	   
	   
	   $admin= new admin;
	   $admin->id=null;
	   $admin->password=$request->contrasena;
	   $admin->name=$request->nombre;
	   $admin->LastName=$request->apellidos;
	   $admin->email=$request->correo;
	   $admin->photo=$img2;
	   $admin->status=$request->estado;
	   $admin->save();
		

	   $admin=$request->nombre;
	   $imagen="photos/adminsPhotos/".$img2;
	   $action="Registrado";

	   return view('system.admin.tables.admins.menssaje')
	   			  ->with("admin",$admin)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarAdmin($adminId){
		 $s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $consulta =admin::where('id','=',$adminId)->get();
		 //return $consulta;
                    
		 return view('system.admin.tables.admins.modificarAdmin')->with('consulta',$consulta[0]);
		}
	}

	public function modificarAdmins(Request $request){
		
		$this->validate($request,[
    	 	'contrasena'=>'required',
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'apellido'=>['regex:/^[A-Z,a-z][A-Z,a-z, ]*$/'],
            'correo'=>['regex:/^[a-z,A-Z,0-9]*@[a-z,A-Z]*.[a-z,A-Z]*$/'],
            'photo'=>'mimes:jpeg,png,gif,jpg',
        ]);
        $admin=$request->nombre;

	   $file=$request->file('photo');
	   if ($file!="") {
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$admin.$img;
            \Storage::disk('adminPhoto')->put($img2,\File::get($file));
	   } else {
	   		
	   			$img2="noPhotoMan.png";
	   		 
	   }
	    
	   
	   
	   $admin= admin::find($request->id);
	   $admin->password=$request->contrasena;
	   $admin->name=$request->nombre;
	   $admin->LastName=$request->apellidos;
	   $admin->email=$request->correo;
	   if ($file!="") {
	   	$admin->photo=$img2;
	   }
	   $admin->status=$request->estado;
	   $admin->save();
		

	   $admin=$request->nombre;
	   $imagen="photos/adminsPhotos/".$img2;
	   $action="Actualizado";

	   return view('system.admin.tables.admins.menssaje')
	   			  ->with("admin",$admin)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);

	}

	  

	public function lock($adminId){
		 $s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $admin= admin::find($adminId);
		 $admin->status="inactivo";
		 $admin->save();
		 return redirect('/reportAdmins');
		}
	}

	public function unlock($adminId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$admin= admin::find($adminId);
		 $admin->status="activo";
		 $admin->save();
		 return redirect('/reportAdmins');
		}
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
    public function generateReport(){
		
		$report= category::all();
		$report= category::get();
		return $report;
	}

	public function lastId(){
		$lastId= category::orderby('id','desc')->take(1)->get();
		$nextId=$lastId[0]->id+1;
		return $nextId;
	}
	public function report(){
		 
		$report=$this->generateReport();
		
		$nextId=$this->lastId();
		
		return view('system.admin.tables.categories.report')
			   ->with('report',$report) 
			   ->with('nextId',$nextId); 
		//return $report;
	}
  
	
	public function formUpCategory(){

		$nextId=$this->lastId();
		return view('system.admin.tables.categories.up')
					->with('nextId',$nextId);

	}


	public function up(Request $request){
		//return $request;
		
		$this->validate($request,[
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'nombre'=>'required'
        ]);

		
		$category=$request->nombre;
	    
	   $nextId=$this->lastId(); 
	   
	   $category= new category;
	   $category->id=$nextId;
	   $category->Name=$request->nombre;
	   $category->description=$request->descripcion;
	   $category->status=$request->estado;
	   $category->save();
		

	   $category=$request->nombre;
	   $imagen="photos/folder.jfif";
	   $action="Registrada";

	   return view('system.admin.tables.categories.menssaje')
	   			  ->with("category",$category)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarCategory($categoryId){

		 $consulta =category::where('id','=',$categoryId)->get();
		 //return $consulta;
                    
		 return view('system.admin.tables.categories.modificar')->with('consulta',$consulta[0]);

	} 

	public function modificarCategories(Request $request){
		
		$this->validate($request,[
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/'],
            'descripcion'=>'required'
        ]);

		
		$category=$request->nombre;
	    
	   
	   $category= category::find($request->id);
	   $category->id=$request->id;
	   $category->Name=$request->nombre;
	   $category->description=$request->descripcion;
	   $category->status=$request->estado;
	   $category->save();
		

	   $category=$request->nombre;
	   $imagen="photos/folder.jfif";
	   $action="Actualizada";

	   return view('system.admin.tables.categories.menssaje')
	   			  ->with("category",$category)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);

	}

	  

	public function lock($categoryId){
		 
		 $category= category::find($categoryId);
		 $category->status="inactivo";
		 $category->save();
		 return redirect('/reportCategories');
	}

	public function unlock($categoryId){
		$category= category::find($categoryId);
		 $category->status="activo";
		 $category->save();
		 return redirect('/reportCategories');
	}
}

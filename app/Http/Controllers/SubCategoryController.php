<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subCategory;  
use App\Category;

class SubCategoryController extends Controller
{
    public function generateReport(){
		 
    	$consulta='SELECT sb.id,sb.name,sb.status,c.name AS category 
    			   FROM sub_categories AS sb 
    			   INNER JOIN categories AS c ON c.id=sb.idCategory';
 

		$report= \DB::select($consulta);
		return $report;
	}

	public function lastId(){
		$lastId= subCategory::orderby('id','desc')->take(1)->get();
		$nextId=$lastId[0]->id+1;
		return $nextId;
	}

	public function showCategories(){
		$categories=category::select('id','name')->get();
		return $categories;
	}

	public function report(){
		 
		$report=$this->generateReport();
		
		$nextId=$this->lastId();
		
		return view('system.admin.tables.subCategories.report')
			   ->with('report',$report) 
			   ->with('nextId',$nextId); 
		//return $report;
	}
  
	
	public function formUpSubCategory(){
		$categories=$this->showCategories();
		$nextId=$this->lastId();
		return view('system.admin.tables.SubCategories.up')
					->with('nextId',$nextId)
					->with('categories',$categories);

	}


	public function up(Request $request){
		//return $request;
		
		$this->validate($request,[
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/']
        ]);
 	
			
	   $subCategory=$request->nombre;
	    
	   $nextId=$this->lastId(); 
	   
	   $subCategory= new subCategory;
	   $subCategory->id=$nextId;
	   $subCategory->name=$request->nombre;
	   $subCategory->idCategory=$request->categoria;
	   $subCategory->status=$request->estado;
	   $subCategory->save();
		

	   $subCategory=$request->nombre;
	   $imagen="photos/folder.jfif";
	   $action="Registrada";

	   return view('system.admin.tables.subCategories.menssaje')
	   			  ->with("subCategory",$subCategory)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarsubCategory($SubCategoryId){
		
		 $consulta =subCategory::where('id','=',$SubCategoryId)->get();
		 $categories=$this->showCategories();
		 //return $consulta;
                    
		 return view('system.admin.tables.subCategories.modificar')
		 			->with('consulta',$consulta[0])
		 			->with('categories',$categories);

	}  

	public function modificarSubCategories(Request $request){
		
		$this->validate($request,[
            'nombre'=>['regex:/^[a-z,A-Z, ]*$/']
        ]);
 	
			
	   $subCategory=$request->nombre;
	    
	   
	   $subCategory= subCategory::find($request->id);
	   $subCategory->name=$request->nombre; 
	   $subCategory->idCategory=$request->categoria;
	   $subCategory->status=$request->estado;
	   $subCategory->save();
		

	   $subCategory=$request->nombre;
	   $imagen="photos/folder.jfif";
	   $action="Actualizada";

	   return view('system.admin.tables.subCategories.menssaje')
	   			  ->with("subCategory",$subCategory)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
 
	}

	  

	public function lock($SubCategoryId){
		
		 $subCategory= subCategory::find($SubCategoryId);
		 $subCategory->status="inactivo";
		 $subCategory->save();
		 return redirect('/reportSubCategories');
	}

	public function unlock($SubCategoryId){
		$subCategory= subCategory::find($SubCategoryId);
		 $subCategory->status="activo";
		 $subCategory->save();
		 return redirect('/reportSubCategories');
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\subCategory;
use App\User;
use Session;
class ArticleController extends Controller
{
    public function generateReport(){
		 
    	$consulta='SELECT  a.*,sbc.name AS subCategory,c.name AS category,v.user AS sellerUser,
    					   v.name AS sellerName,v.photo AS sellerPhoto,v.mail AS sellerMail,v.phone AS sellerPhone
    			   FROM articles AS a  
    			   INNER JOIN sub_categories AS sbc ON sbc.id=a.subCategoryId 
    			   INNER JOIN categories AS c ON c.id=sbc.idCategory
    			   INNER JOIN users AS v ON v.id=a.seller';
 

		$report= \DB::select($consulta);
		return $report;
	}

	public function lastId(){
		$lastId= article::orderby('id','desc')->take(1)->get();
		$nextId=$lastId[0]->id+1;
		return $nextId;
	} 

	public function showCategories(){
		$categories=subCategory::select('id','name')->get();
		return $categories;
	}

	public function showSellers(){
		$sellers = User::select('id','name');
		$sellers = User::get();
		return $sellers;
	}

	public function report(){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{ 
		$report=$this->generateReport();
		
		$nextId=$this->lastId();
		
		return view('system.admin.tables.articles.report')
			   ->with('report',$report) 
			   ->with('nextId',$nextId); 
		//return $report;
		}
	}
  
	
	public function formUpArticle(){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$categories=$this->showCategories();

		$sellers=$this->showSellers();
		
		$nextId=$this->lastId();
		return view('system.admin.tables.articles.up')
					->with('nextId',$nextId)
					->with('sellers',$sellers)
					->with('categories',$categories);
		}
	}


	public function up(Request $request){
		//return $request;
		
		$this->validate($request,[
            'nombre'=>'required',
            'marca'=>['regex:/^[a-z,A-Z, ]*$/'],
            'precio'=>'numeric',
            'fechaInicial'=>'required',
            'fechaFinal'=>'required',
            'photo'=>'required|mimes:jpeg,png,gif,jpg',
        ]); 
 	
 		$article=$request->nombre;
		 $file=$request->file('photo');
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$article.$img;
            \Storage::disk('articlePhoto')->put($img2,\File::get($file));
	   
 
	   
	    
	   $nextId=$this->lastId(); 
	   $article= new article;
	   $article->id=$nextId;
	   $article->name=$request->nombre;
	   $article->maker=$request->marca;
	   $article->price=$request->precio;
	   $article->initialDate=$request->fechaInicial;
	   $article->finalDate=$request->fechaFinal;
	   $article->subcategoryId=$request->categorias;
	   $article->seller=$request->vendedor;
	   $article->photo=$img2;
	   $article->status=$request->estado;
	   $article->save();
		 

	   $article=$request->nombre;
	   $imagen="photos/articlesPhotos/".$img2;
	   $action="Registrado";

	   return view('system.admin.tables.articles.menssaje')
	   			  ->with("article",$article)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarArticle($ArticleId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $consulta =article::where('id','=',$ArticleId)->get();
		 $categories=$this->showCategories();
		 $sellers=$this->showSellers();
		 //return $consulta;
                   
		 return view('system.admin.tables.articles.modificar')
		 			->with('consulta',$consulta[0])
		 			->with('sellers',$sellers)
		 			->with('categories',$categories);
		 }			

	}  

	public function modificararticles(Request $request){
		
		$this->validate($request,[
            'nombre'=>'required',
            'marca'=>['regex:/^[a-z,A-Z, ]*$/'],
            'precio'=>'numeric',
            'fechaInicial'=>'required',
            'fechaFinal'=>'required',
        ]); 
 	
 		$article=$request->nombre;

		$file=$request->file('photo');
	   	if ($file !="") {
	   		$article=$request->nombre;
		 $file=$request->file('photo');
	   		$ldate=date('Ymd_His_');
     	    $img=$file->getClientOriginalName();
	        $img2=$ldate.$article.$img;
            \Storage::disk('articlePhoto')->put($img2,\File::get($file));
	   		}else{
	   			$foto= article::select('photo')
	   							->where('id','=',$request->id)->get();
	   			$img2=$foto[0]->photo;
	   			
	   		}	
	   		
	   
  
	   
	    
	   $nextId=$request->id; 
	   $article= article::find($request->id);
	   $article->id=$nextId;
	   $article->name=$request->nombre;
	   $article->maker=$request->marca;
	   $article->price=$request->precio;
	   $article->initialDate=$request->fechaInicial;
	   $article->finalDate=$request->fechaFinal;
	   $article->subcategoryId=$request->categorias;
	   $article->seller=$request->vendedor;
	   if ($file!="") {
	   	$article->photo=$img2;	
	   }
	   

	   $article->status=$request->estado;
	   $article->save();
		 

	   $article=$request->nombre;
	   $imagen="photos/articlesPhotos/".$img2;
	   $action="Actualizado";

	   return view('system.admin.tables.articles.menssaje')
	   			  ->with("article",$article)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
 
	}

	  

	public function lock($ArticleId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		 $article= article::find($ArticleId);
		 $article->status="inactivo";
		 $article->save();
		 return redirect('/reportArticles');
		}
	}

	public function unlock($ArticleId){
		$s=Session::get('sessionName');
		if ($s == '') {
			Session::flash('error', 'Ruta Bloqueada Nesesitas Iniciar Sesion');
        	return redirect('/login');
		}else{
		$article= article::find($ArticleId);
		 $article->status="activo";
		 $article->save();
		 return redirect('/reportArticles');
		}
	}
}

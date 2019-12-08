<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\presale;
use App\User;
use App\article;

class PresaleController extends Controller
{
    public function generateReport(){
		 
    	$consulta='SELECT ps.id,ps.buyer,ps.article,ps.offeredPrice,ps.status,
      			    u.user AS buyerName,u.mail AS buyerMail,u.phone AS buyerphone,
       				a.name AS articleName,a.seller
       				FROM presales AS ps 
       				INNER JOIN users AS u ON ps.buyer=u.id
       				INNER JOIN articles AS a ON a.id=ps.article';
 

		$report= \DB::select($consulta);
		return $report;
	}

	public function showSeller(){

		$report=$this->generateReport();
		$consultar=$report[0]->seller;
		$consulta="SELECT u.name AS sellerName 
					From users AS u
					INNER JOIN articles AS a ON a.seller=u.id";
		$seller= \DB::select($consulta);
		return $seller;

	}

	public function lastId(){
		$lastId= presale::orderby('id','desc')->take(1)->get();
		$nextId=$lastId[0]->id+1;
		return $nextId;
	}

	

	public function report(){
		 
		$report=$this->generateReport();
		
		$nextId=$this->lastId();
		$seller=$this->showSeller();
		
		return view('system.admin.tables.presales.report')
			   ->with('report',$report) 
			   ->with('seller',$seller) 
			   ->with('nextId',$nextId);
		//return $seller;
	}
  
	
	public function formUpPresale(){
		
		$nextId=$this->lastId();
		$users=User::select('*')->get();
		$articles=article::select('*')->get();

		return view('system.admin.tables.presales.up')
					->with('nextId',$nextId)
					->with('articles',$articles)
					->with('users',$users); 

	}
 

	public function up(Request $request){
		//return $request;
		
		$this->validate($request,[
            'oferta'=>'required|numeric'
        ]);
 		//return $request;
		
	   $presale=$request->nombre;
	    
	   $nextId=$this->lastId(); 
	   
	   $presale= new presale;
	   $presale->id=$nextId;
	   $presale->buyer=$request->usuario;
	   $presale->article=$request->categoria;
	   $presale->offeredPrice=$request->oferta;
	   $presale->status=$request->estado;
	   $presale->save();
		 

	   $presale="Peventa";
	   $imagen="photos/folder.jfif";
	   $action="Registrada";

	   return view('system.admin.tables.presales.menssaje')
	   			  ->with("subCategory",$presale)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
	     
	   
	}

	public function modificarPresale($PresaleId){
		
		 $consulta =presale::where('id','=',$PresaleId)->get();
		 
		 //return $consulta;
                    
		 return view('system.admin.tables.presales.modificar')
		 			->with('consulta',$consulta[0]); 

	}   

	public function modificarPresales(Request $request){
		
		$this->validate($request,[
            'oferta'=>'required|numeric'
        ]);
 		//return $request;
 		
	   $presale= presale::find($request->id);
	   $presale->offeredPrice=$request->oferta; 
	   $presale->status=$request->estado; 
	   $presale->save();
		

	    $presale="La peventa";
	   $imagen="photos/folder.jfif";
	   $action="Modificada";

	   return view('system.admin.tables.presales.menssaje')
	   			  ->with("subCategory",$presale)
	   			  ->with("action",$action)
	   			  ->with("imagen",$imagen);
 
	}

	  

	public function lock($PresaleId){
		
		 $presale= presale::find($PresaleId);
		 $presale->status="rechazada"; 
		 $presale->save();
		 return redirect('/reportPresales');
	}

	public function unlock($PresaleId){
		$presale= presale::find($PresaleId);
		 $presale->status="aceptada";
		 $presale->save();
		 return redirect('/reportPresales');
	}
}

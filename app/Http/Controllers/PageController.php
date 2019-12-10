<?php

namespace App\Http\Controllers;
use App\subCategory;
use App\category;
use App\article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
    	return view('page.contact');
    }

    public function categories(){
    	$category=category::all();
    	$subCategory=subCategory::all();
    	//return $category;	
    	$article=article::all();	
    	return view('page.categories')
    			->with('subCategory',$subCategory)
    			->with('category',$category)
    			->with('article',$article);
    }

}

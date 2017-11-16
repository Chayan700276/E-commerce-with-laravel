<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class viewpageController extends Controller
{
    public function index(){
    	$index_content = view('pages.home');
    	return view('index')->with('main_content',$index_content);
    }

    public function login(){
        $login = view('pages.login');
        return view('index')
                    ->with('main_content',$login);
    } 

    public function register(){
        $register = view('pages.register');
        return view('index')
                    ->with('main_content',$register);
    }

     public function categoryProduct($id){



        $all_category = DB::table('categories')
                        ->where('publication_status',1)
                        ->get();

            foreach ($all_category as $category) {
                if ($category->id == $id) {
                    session()->flash('category',$category->category_name);
                }
            }

         $catProduct = DB::table('products')
                        ->where('category_id',$id)
                        ->get();
    	$index_content = view('pages.cat_wise_product')
                            ->with('category_product',$catProduct)
                            ->with('all_category',$all_category);
    	return view('index')->with('main_content',$index_content);
    }


     public function offers(){
    	$index_content = view('pages.offers');
    	return view('index')->with('main_content',$index_content);
    }


     public function contact(){
    	$index_content = view('pages.contact');
    	return view('index')->with('main_content',$index_content);
    }
}

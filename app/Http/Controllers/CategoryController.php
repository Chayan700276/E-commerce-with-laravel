<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;
use Redirect;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */
    public function __construct(){
        $this->middleware('superAdminMiddleware');
    }

    public function category(){
        $add_category = view('admin.pages.add_category');
        return view('admin.admin_master')
                        ->with('admin_main_content',$add_category);
    }

    public function UnpublishCategory($id){
       $cat_item = Category::find($id);
       $cat_item->publication_status = 0;
       $cat_item->save();
       return Redirect::back();
    }

    public function publishCategory($id){
       $cat_item = Category::find($id);
       $cat_item->publication_status = 1;
       $cat_item->save();
       return Redirect::back();
    }

    public function index()
    {
        $all_category = Category::get();
        $manage_category = view('admin.pages.manage_category',get_defined_vars());
        return view('admin.admin_master')
                        ->with('admin_main_content', $manage_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category,Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['publication_status'] = $request->publication_status;

        $this->validate($request,[
            'category_name' => 'required',
            'publication_status' => 'required'
        ]);

        $category->create($data);
        session()->flash('message','Category inserted Succesfully');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_item = Category::find($id);
        $edit_category = view('admin.pages.edit_category',get_defined_vars());
        return view('admin.admin_master')
                        ->with('admin_main_content',$edit_category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cat_item = Category::find($id);
        $cat_item->category_name = $request->category_name;
        $cat_item->publication_status = $request->publication_status;

        $cat_item->save();
        session()->flash('message','Category updated Succesfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
         $item = Category::find($id);
         $item->delete();
         session()->flash('message','Data Deleted succesfully');
        return Redirect::back();
    }
}

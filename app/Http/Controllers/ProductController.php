<?php

namespace App\Http\Controllers;

use App\models\product;
use App\models\Category;
use Illuminate\Http\Request;
use validate;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */

    public function __construct(){
        $this->middleware('superAdminMiddleware');
    }

    public function product(){
         $product_page = view('admin.pages.add_product');
        return view('admin.admin_master')
                                ->with('admin_main_content',$product_page);
    }
    public function index()
    {
        $all_product = product::get();
        $manage_product = view('admin.pages.manage_product',get_defined_vars()) ; 
        return view('admin.admin_master')
                                ->with('admin_main_content',$manage_product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(product $product,Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'product_type' => 'required',
        ]);

        $data = array();
        $data['product_name'] = $request->product_name; 
        $data['category_id'] = $request->category_id; 
        $data['product_description'] = $request->product_description; 
        $data['old_price'] = $request->old_price; 
        $data['new_price'] = $request->new_price; 
        $data['product_type'] = $request->product_type; 

    

     $image = $request->file('product_image');
     if ($image) {
         $image_name = str_random(20);  
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $ext;
          $upload_path = 'uploads/';
          $image_url = $upload_path.$image_full_name;
          $succes = $image->move($upload_path, $image_full_name);
          if ($succes) {
              $data['product_image'] = $image_url;
              $product->create($data);
              $request->session()->flash('message','Product inserted succesfullyy');
            return Redirect::back();
          }
     }else{
         $product->create($data);
              $request->session()->flash('message','Product inserted succesfully');
            return Redirect::back();
     }

}
    /**
     * Display the specified resource.
     *
     * @param  \App\models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        $show_product = view('admin.pages.show_product',get_defined_vars());
        return view('admin.admin_master')
                            ->with('admin_main_content',$show_product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro_details = product::find($id);
        $edit_product = view('admin.pages.edit_product',get_defined_vars());
        return view('admin.admin_master')
                            ->with('admin_main_content',$edit_product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product_item = product::find($id); 
       $this->validate($request,[
            'product_name' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'product_type' => 'required',
       ]);

       $product_item->product_name = $request->product_name; 
        $product_item->category_id = $request->category_id; 
        $product_item->product_description = $request->product_description; 
        $product_item->old_price = $request->old_price; 
        $product_item->new_price = $request->new_price; 
        $product_item->product_type = $request->product_type;

        $image = $request->file('product_image');
     if ($image) {
         $image_name = str_random(20);  
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $ext;
          $upload_path = 'uploads/';
          $image_url = $upload_path.$image_full_name;
          $succes = $image->move($upload_path, $image_full_name);
          if ($succes) {
              $product_item->product_image = $image_url;
              $product_item->save();
              @unlink($request->old_image);
              $request->session()->flash('message','Product Updated succesfullyy');
            return Redirect::back();
          }
     }else{
         $product_item->save();
              $request->session()->flash('message','Product Updated succesfully');
            return Redirect::back();
     }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $pro_data = product::find($id);
       $pro_data->delete();
       @unlink($pro_data->product_image);
       session()->flash('message','Product Deleted succesfully');
        return Redirect::back();
    }
}

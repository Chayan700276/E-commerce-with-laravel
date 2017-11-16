<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    


    public function index()
    {
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        $main_content = view('admin.pages.admin_dashboard');
        return view('admin.admin_master')
                    ->with('admin_main_content',$main_content);
    }

    public function loginCheck(Request $request)
    {
       
         $this->validate(request(),[
            'admin_email'    => 'required',
            'admin_password' => 'required'
        ]);

         $admin_email = $request->admin_email;
         $admin_password = $request->admin_password;

         $admin_info = DB::table('tbl_admins')
                            ->where('admin_email',$admin_email)
                            ->where('admin_password',$admin_password)
                            ->first();

        if ($admin_info) {
            session::put('admin_name',$admin_info->admin_name);
            session::put('admin_id',$admin_info->admin_id);
            return Redirect::to('/dashboard');
        }else{
            session::put('exception','Email or Password not match');
            return Redirect::back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

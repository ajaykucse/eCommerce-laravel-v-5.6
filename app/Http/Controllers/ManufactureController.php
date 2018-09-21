<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_manufacture');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthCheck();
        $all_manufacture_info=DB::table('tbl_manufacture')->get();
        $manage_manufacture=view('admin.all_manufacture')
            ->with('all_manufacture_info',$all_manufacture_info);

            return view('admin_layout')
                ->with('admin.all_manufacture',$manage_manufacture);
        return view('admin.all_manufacture');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthCheck();
        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_manufacture')->insert($data);
        Session::put('message','manufacture added successfully !!');
        return Redirect::to('/add-manufacture');
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
    public function edit($manufacture_id)
    {
        $this->AuthCheck();
        $manufacture_info=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->first();

        $manufacture_info=view('admin.edit_manufacture')
            ->with('manufacture_info',$manufacture_info);
            return view('admin_layout')
                ->with('admin.edit_manufacture',$manufacture_info);

        //return view('admin.edit_manufacture');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $manufacture_id)
    {
        $this->AuthCheck();
        $data=array();
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;

        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update($data);

            Session::put('message','Manufacture updated successfully !!!');
            return Redirect::to('/all-manufacture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($manufacture_id)
    {
        $this->AuthCheck();
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->delete();
        Session::put('message','Manufacture Deleted successfully!!!'); 
        return Redirect::to('/all-manufacture');
    }
    public function deactive($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status' => 0]);
            Session::put('message','Manufacture deactive successfully !!');
            return Redirect::to('/all-manufacture');
    }
    public function active($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Manufacture Activated successfully !!');
            return Redirect::to('/all-manufacture');
    }
    public function AuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}

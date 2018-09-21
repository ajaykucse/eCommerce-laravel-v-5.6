<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthCheck();
        $all_category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')
            ->with('all_category_info',$all_category_info);

            return view('admin_layout')
                ->with('admin.all_category',$manage_category);
        //return view('admin.all_category');   
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
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','Category added successfully !!');
        return Redirect::to('/add-category');
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
    public function edit($category_id)
    {
        $this->AuthCheck();
        $category_info=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();

        $category_info=view('admin.edit_category')
            ->with('category_info',$category_info);
            return view('admin_layout')
                ->with('admin.edit_category',$category_info);

        //return view('admin.edit_category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $this->AuthCheck();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);

            Session::put('message','Category updated successfully !!!');
            return Redirect::to('/all-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $this->AuthCheck();
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();
        Session::put('message','Category Deleted successfully!!!'); 
        return Redirect::to('/all-category');
    }
    public function deactive($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 0]);
            Session::put('message','Category deactive successfully !!');
            return Redirect::to('/all-category');
    }

    public function active($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 1]);
            Session::put('message','Category Activated successfully !!');
            return Redirect::to('/all-category');
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

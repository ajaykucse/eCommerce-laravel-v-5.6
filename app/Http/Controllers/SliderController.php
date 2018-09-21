<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_slider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthCheck();
        $all_slider_info=DB::table('tbl_slider')->get();
        $manage_slider=view('admin.all_slider')
            ->with('all_slider_info',$all_slider_info);

            return view('admin_layout')
                ->with('admin.all_slider',$manage_slider);
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
        $data['publication_status']=$request->publication_status;
        $image=$request->file('slider_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['slider_image']=$image_url;

                DB::table('tbl_slider')->insert($data);
                Session::put('message','Slider added successfully !!');
                return Redirect::to('/add-slider');

                // echo "<pre>";
                // print_r($data);
                // echo "<pre>";
                // exit();
            }
        }
        $data['slider_image']='';
        DB::table('tbl_slider')->insert($data);
        Session::put('message','Slider added successfully without image !!');
        return Redirect::to('/add-slider');
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
    public function destroy($slider_id)
    {
        $this->AuthCheck();
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();
        Session::put('message','Slider Deleted successfully!!!'); 
        return Redirect::to('/all-slider');
    }
    public function deactive($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'Slider Deactive successfully !!');
            return Redirect::to('/all-slider');
    }
    public function active($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'Slider Activated successfully !!');
            return Redirect::to('/all-slider');
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

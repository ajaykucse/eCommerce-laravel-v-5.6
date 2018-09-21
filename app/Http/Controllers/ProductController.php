<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthCheck();
        return view('admin.add_product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthCheck();
        $all_product_info=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                ->get();
            $manage_product=view('admin.all_product')
                ->with('all_product_info',$all_product_info);

            return view('admin_layout')
                ->with('admin.all_product',$manage_product);
        //return view('admin.all_product);
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
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;

        $image=$request->file('product_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('message','Product added successfully !!');
                return Redirect::to('/add-product');

                // echo "<pre>";
                // print_r($data);
                // echo "<pre>";
                // exit();
            }
        }
        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message','Product added successfully without image !!');
        return Redirect::to('/add-product');
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
    public function destroy($product_id)
    {
        $this->AuthCheck();
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();
        Session::put('message','Product Deleted successfully!!!'); 
        return Redirect::to('/all-product');
    }
    public function deactive($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'Product Deactive successfully !!');
            return Redirect::to('/all-product');
    }
    public function active($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'Product Activated successfully !!');
            return Redirect::to('/all-product');
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

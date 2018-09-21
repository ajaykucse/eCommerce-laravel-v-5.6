<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class ManageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_order_info=DB::table('tbl_orders')
                    ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
                    ->select('tbl_orders.*','tbl_customers.customer_name')
                    ->get();

        $manage_order=view('admin.manage_order')
                    ->with('all_order_info',$all_order_info);
        return view('admin_layout')
                ->with('admin.manage_order',$manage_order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id)
    {
        $order_by_id=DB::table('tbl_orders')
                    ->join('tbl_customers','tbl_orders.customer_id','=','tbl_customers.customer_id')
                    ->join('tbl_order_details','tbl_orders.order_id','=','tbl_order_details.order_id')
                    ->join('tbl_shipping','tbl_orders.shipping_id','=','tbl_shipping.shipping_id')
                    ->select('tbl_orders.*','tbl_order_details.*','tbl_shipping.*','tbl_customers.*')
                    ->get();

        $view_order=view('admin.view_order')
                    ->with('order_by_id',$order_by_id);
        return view('admin_layout')
                ->with('admin.view_order',$view_order);
    }

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

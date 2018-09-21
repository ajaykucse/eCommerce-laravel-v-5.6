<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.login');
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
    public function store(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['password']=md5($request->password);
        $data['mobile_number']=$request->mobile_number;

            $customer_id=DB::table('tbl_customers')
                        ->insertGetId($data);
                Session::put('customer_id',$customer_id);
                Session::put('customer_name',$request->customer_name);
                return Redirect('/checkout');
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
    public function checkout()
    { 
    //     $all_published_category=DB::table('tbl_category')
    //                             ->where('publication_status',1)
    //                             ->get();
    //     $manage_published_category=view('pages.checkout')
    //                             ->with('all_published_category',$all_published_category);
    //                 return view('layout')
    //                         ->with('pages.checkout',$manage_published_category);       
                       return view('pages.checkout');
    }
    public function save_shipping(Request $request)
    {
        $data=array();
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_mobile_number']=$request->shipping_mobile_number;
        $data['shipping_city']=$request->shipping_city;

        $shipping_id=DB::table('tbl_shipping')
            ->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
            return Redirect::to('/payment');
    }
    public function customer_login(Request $request)
    {
        $customer_email=$request->customer_email;
        $password=md5($request->password);
        $result=DB::table('tbl_customers')
                ->where('customer_email',$customer_email)
                ->where('password',$password)
                ->first();

               if($result){
                    Session::put('customer_id',$result->customer_id);
                    return Redirect::to('/checkout');
                }else{
                    return Redirect::to('/login-check');
                }
    }
    public function payment()
    {
        return view('pages.payment');
    }
    public function order_place(Request $request)
    {
        $payment_gateway=$request->payment_method;
        
        $pdata=array();
        $pdata['payment_method']=$payment_gateway;
        $pdata['payment_status']='pending';
        $payment_id=DB::table('tbl_payments')
                    ->insertGetId($pdata);

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']='pending';
        $order_id=DB::table('tbl_orders')
                ->insertGetId($odata);

        $contents=Cart::content();
        $oddata=array();
        foreach($contents as $v_content)
        {
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$v_content->id;
            $oddata['product_name']=$v_content->name;
            $oddata['product_price']=$v_content->price;
            $oddata['product_sales_qty']=$v_content->qty;

            DB::table('tbl_order_details')
                ->insert($oddata);
        }
        if($payment_gateway=='handcash'){
            Cart::destroy();
        }elseif($payment_gateway=='paypal'){
            Cart::destroy();
        }elseif($payment_gateway=='bkash'){
            Cart::destroy();
        }elseif($payment_gateway=='payza'){
            Cart::destroy();
        }else{
            echo "Error";
        }
    }
    public function customer_logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
}

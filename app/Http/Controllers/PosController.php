<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Pos()
    {
        $products = DB::table('products')
                    ->join('categories','products.cat_id','categories.id')
                    ->select('categories.category_name','products.*')
                    ->get();
        $customers = DB::table('customers')->get();
        $categories = DB::table('categories')->get();
        return view('pos.pos',compact('products','customers','categories'));
    }

    //pending order
    public function pendingOrder()
    {
        $pendingOrder = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->select('customers.name','orders.*')
                        ->where('order_status','pending')
                        ->get();

        return view('order.pending_order',compact('pendingOrder'));

        // echo "<pre>";
        // print_r($pendingOrder);
    }
    //view order
    public function viewOrder($id)
    {
        $order = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->where('orders.o_id',$id)
                        ->first();
        $orderDetails = DB::table('orderdetails')
                         ->join('products','orderdetails.product_id','products.id')
                         ->select('orderdetails.*','products.product_name','products.product_code')
                         ->where('order_id',$id)
                         ->get();
        return view('order.view_order',compact('orderDetails','order'));

        //   echo "<pre>";
        // print_r($order);
        //   echo "<pre>";
        // print_r($orderDetails);
    }

    //approve prnding
    public function approvePending($id)
    {
        DB::table('orders')->where('orders.o_id',$id)->update(array('order_status'=>'success'));

        return redirect('/pending-order')->with('message','Order Approved successfully');
        //   echo "<pre>";
        // print_r($orders_cus);
    }

    //success order
    public function successOrder()
    {
         $successOrder = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->select('customers.name','orders.*')
                        ->where('order_status','success')
                        ->get();

        return view('order.success_order',compact('successOrder'));
    }


    //daily report
    public function dailyReport()
    {
        $todaydate = date('d/m/y');
        $today = DB::table('orders')->where('order_date',$todaydate)->get();

        $order_details = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->select('customers.name','customers.address','customers.email','customers.phone','orders.*')
                        ->where('order_date',$todaydate)
                        ->get();
        $products_details =DB::table('orderdetails')
                            ->join('products','orderdetails.product_id','products.id')
                            ->select('orderdetails.*','products.product_name','products.product_code','products.selling_price')
                            ->where('order_date',$todaydate)
                            ->get();

       
        return view('report.daily_report',compact('today','order_details','products_details'));
    }
}

<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddCart(Request $request)
    {
       $data = array();
       $data['id']=$request->id;
       $data['name']=$request->name;
       $data['qty']=$request->qty;
       $data['price']=$request->price;
       $data['weight']=$request->weight;

        Cart::add($data);
        
        return redirect()->back();
     
    }
    //update cart
    public function cardUpdate(Request $request,$rowId )
    {
       
        $qtydata = array();
        $qtydata['qty'] = $request->qty;

         $this->validate($request,[
            'qty'=>'required|max:3',
        ]);


        Cart::update($rowId, $qtydata);

        return redirect()->back();
        // return 'jfgwuyefweuf';
        
    }
    //remove item
    public function cardRemove($rowId)
    {
        Cart::remove($rowId);
        
        return redirect()->back();

    }
    //create invoice
    public function CreateInvoice(Request $request)
    {
         $validatedData = $request->validate([
            'cus_id' => 'required',
         ],
        [
            'cus_id.required' => 'Select A Customer First,,Thank You!',
        ]
        );
        $cus_id = $request->cus_id;
        $customer = DB::table('customers')->where('id',$cus_id)->first();
        $contents = Cart::content();
        return view('pos.invoice',compact('customer','contents'));

        // echo "<pre>";
        // print_r($contents);
    }
    //make invoice
    public function makeInvoice(Request $request)
    {
        $data = array();
        $data['customer_id']= $request->customer_id;
        $data['order_date']= $request->order_date;
        $data['order_status']= $request->order_status;
        $data['total_products']= $request->total_products;
        $data['sub_total']= $request->sub_total;
        $data['vat']= $request->vat;
        $data['total']= $request->total;
        $data['payment_status']= $request->payment_status;
        $data['pay']= $request->pay;
        $data['due']= $request->due;
        $data['month']= date('F');

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        $orderData = array();
        foreach ($contents as $content) {
            $orderData['order_id'] = $order_id;
            $orderData['product_id'] = $content->id;
            $orderData['quantity'] = $content->qty;
            $orderData['unitcost'] = $content->price;
            $orderData['total'] = $content->total;
            $orderData['order_date'] = date('d/m/y');
            $orderData['month'] = date('F');

            DB::table('orderdetails')->insert($orderData);
        }

        Cart::destroy();
        
        return redirect('/pos')->with('message','successfully invoice done. Please deliver the product..');

        // echo "<pre>";

        // print_r($data);
    }
}

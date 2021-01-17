<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

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
    public function viewAllOrder()
    {
        $pendingOrder = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->select('customers.name','orders.*')
                        ->where('order_status','success')
                        ->orderBy('o_id','DESC')
                        ->get();

        return view('order.view_all_order',compact('pendingOrder'));

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
                         ->latest()
                         ->get();
        $orderSubTotal = DB::table('orders')->where('orders.o_id',$id)->first();
        return view('order.view_order',compact('orderDetails','order','orderSubTotal'));

        //   echo "<pre>";
        // print_r($order);
        //   echo "<pre>";
        // print_r($orderDetails);
    }

    //approve prnding
    // public function approvePending($id)
    // {
    //     DB::table('orders')->where('orders.o_id',$id)->update(array('order_status'=>'success'));

    //     return redirect('/pending-order')->with('message','Order Approved successfully');
    //     //   echo "<pre>";
    //     // print_r($orders_cus);
    // }

    //success order
    // public function successOrder()
    // {
    //      $successOrder = DB::table('orders')
    //                     ->join('customers','orders.customer_id','customers.id')
    //                     ->select('customers.name','orders.*')
    //                     ->where('order_status','success')
    //                     ->get();

    //     return view('order.success_order',compact('successOrder'));
    // }


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
    //monthlyReport
    public function monthlyReport()
    {
        $thisMonth = date('F');  
        $month = DB::table('orders')->where('month',$thisMonth)->get(); 

         $order_details = DB::table('orders')
                        ->join('customers','orders.customer_id','customers.id')
                        ->select('customers.name','customers.address','customers.email','customers.phone','orders.*')
                        ->where('month',$thisMonth)
                        ->get();
        
        $products_details =DB::table('orderdetails')
                            ->join('products','orderdetails.product_id','products.id')
                            ->select('orderdetails.*','products.product_name','products.product_code','products.selling_price')
                            ->where('month',$thisMonth)
                            ->get();

        return view('report.monthly_report',compact('month','order_details','products_details'));

    }




    //pdf
    public function order_list_pdf ()
    {
        $data = DB::table('orders')->get();

        view()->share('order,orderDetails',$data);

        $pdf = PDF::loadView('pdf_view', $data);

        return $pdf->download('pdf_file.pdf');
    }


//     public function get_all_employee()
//     {
//         $employeeData = DB::table('employees')->get();
//         return $employeeData;
//     }
//     function pdf()
//     {
//      $pdf = \App::make('dompdf.wrapper');
//      $pdf->loadHTML($this->convert_employee_data_to_html());
//      return $pdf->stream();
//     }

//     function convert_employee_data_to_html()
//     {
//      $employee_data = $this->get_all_employee();
//      $output = '
//      <h3 align="center">Employee Data</h3>
//      <table width="100%" style="border-collapse: collapse; border: 0px;">
//       <tr>
//     <th style="border: 1px solid; padding:12px;" width="6%">Name</th>
//     <th style="border: 1px solid; padding:12px;" width="8%">Email</th>
//     <th style="border: 1px solid; padding:12px;" width="7%">Phone</th>
//     <th style="border: 1px solid; padding:12px;" width="10%">Address</th>
//     <th style="border: 1px solid; padding:12px;" width="3%">Salary</th>
//     <th style="border: 1px solid; padding:12px;" width="15%">Experience</th>
    

//    </tr>
//      ';  
//      foreach($employee_data as $employee)
//      {
//       $output .= '
//       <tr>
//        <td style="border: 1px solid; padding:12px;">'.$employee->name.'</td>
//        <td style="border: 1px solid; padding:12px;">'.$employee->email.'</td>
//        <td style="border: 1px solid; padding:12px;">'.$employee->phone.'</td>
//        <td style="border: 1px solid; padding:12px;">'.$employee->address.'</td>
//        <td style="border: 1px solid; padding:12px;">'.$employee->salary.'</td>
//        <td style="border: 1px solid; padding:12px;">'.$employee->experience.'</td>
      
//       </tr>
//       ';
//      }
//      $output .= '</table>';
//      return $output;
//     }



}

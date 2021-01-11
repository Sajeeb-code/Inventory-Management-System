<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProfitController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function monthly_profit()
    {
         $month = date('F');
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('profit.monthly',compact('this_Monthexpense')); 
        
    }
}

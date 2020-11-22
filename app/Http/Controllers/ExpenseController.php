<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //add expense
    public function addExpense()
    {
        return view('expense.addExpense');
    }
    //insert expense
    public function insert_Expense(Request $request)
    {
        $expense = new Expense();

        $expense->expense_details = $request->expense_details;
        $expense->expense_amount = $request->expense_amount;
        $expense->month = $request->month;
        $expense->year = $request->year;
        $expense->date = $request->date;

        $expense->save();

        return redirect()->back()->with('message','expense added successfully!!');


    }
    //today expense
    public function todayExpense()
    {
        $date = date('d/m/Y');
        $today = DB::table('expenses')->where('date',$date)->get();
        return view('expense.todayExpense',compact('today'));
    }
    //edit today expense
    public function edittodayExpense($id)
    {
        $edittodayExpense = Expense::findOrFail($id);

        return view('expense.editTodayExpense',compact('edittodayExpense'));
    }
    //update todays expense
    public function updatetodaysExpense(Request $request,$id)
    {
        $updatetodaysExpense = Expense::findOrFail($id);
        
        $updatetodaysExpense->expense_details = $request->expense_details;
        $updatetodaysExpense->expense_amount = $request->expense_amount;
        $updatetodaysExpense->month = $request->month;
        $updatetodaysExpense->year = $request->year;
        $updatetodaysExpense->date = $request->date;

        $updatetodaysExpense->save();

        return redirect()->back()->with('message','expense updated successfully!!');
    }
    //this month expense
    public function thisMonthExpense()
    {
        $month = date('F');
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.thisMonthExpense',compact('this_Monthexpense'));   
    }
    //yearly expense
    public function yearlyExpense()
    {
        $year = date('Y');
        $this_Yearlyexpense = DB::table('expenses')->where('year',$year)->get();
        return view('expense.yearlyExpense',compact('this_Yearlyexpense'));   
    }
    //each month expense 
    public function januaryExpense()
    {
        $month  = 'January';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.januaryexpense',compact('this_Monthexpense')); 
    }
     public function februaryExpense()
    {
        $month  = 'February';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.februaryexpense',compact('this_Monthexpense')); 
    }
     public function marchExpense()
    {
        $month  = 'March';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.marchexpense',compact('this_Monthexpense')); 
    }
     public function aprilExpense()
    {
        $month  = 'April';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.aprilexpense',compact('this_Monthexpense')); 
    }
     public function mayExpense()
    {
        $month  = 'May';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.mayexpense',compact('this_Monthexpense')); 
    }
    public function juneExpense()
    {
        $month  = 'June';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.juneexpense',compact('this_Monthexpense')); 
    }
    public function julyExpense()
    {
        $month  = 'July';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.julyexpense',compact('this_Monthexpense')); 
    }
    public function auguestExpense()
    {
        $month  = 'Auguest';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.auguestexpense',compact('this_Monthexpense')); 
    }
    public function septemberExpense()
    {
        $month  = 'September';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.septemberexpense',compact('this_Monthexpense')); 
    }
    public function octoberExpense()
    {
        $month  = 'October';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.octoberexpense',compact('this_Monthexpense')); 
    }
    public function novemberExpense()
    {
        $month  = 'November';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.novemberexpense',compact('this_Monthexpense')); 
    }
    public function decemberExpense()
    {
        $month  = 'December';
        $this_Monthexpense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.decemberexpense',compact('this_Monthexpense')); 
    }
    

    

}

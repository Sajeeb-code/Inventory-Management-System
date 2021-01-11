<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
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
    //add advance salary
    public function add_advance_Salary()
    {
        return view('salary.add_advance_Salary');
    }
    //insert advance salary
    public function insert_advanceSalary(Request $request)
    {

        $month = $request->month;
        $employee_id = $request->employee_id;
        $paidAdvanced = DB::table('salaries')
                        ->where('month', $month)
                        ->where('employee_id', $employee_id)
                        ->first();
        if($paidAdvanced === null){
            $data = array();
            $data['employee_id'] = $request->employee_id;
            $data['month'] = $request->month;
            $data['advanced_salary'] = $request->advanced_salary;
            $data['year'] = $request->year;

            $advanced = DB::table('salaries')->insert($data);
            return redirect()->route('add.advance.salary')->with('message','Advanced Salary Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Already Advanced Paid in this Month');
        }
        
       
    }
    // all advance salary view
    public function allAvanceSalary()
    {
        $salary = DB::table('salaries')
                    ->join('employees','salaries.employee_id','employees.id')
                    ->select('salaries.*','employees.name','employees.photo','employees.salary')
                    ->latest()
                    ->get();
        return view('salary.all_advance_salary',compact('salary'));
    }
    //delete advanec salary 
    public function deleteAdvanced($id)
    {
        $delete = Salary::findOrFail($id);

        $delete->delete();

        return redirect()->back()->with('message','delete successfully!');
    }







    //pay salary
    public function pay_Salary()
    {
         $salary = DB::table('salaries')
                    ->join('employees','salaries.employee_id','employees.id')
                    ->select('salaries.*','employees.name','employees.photo','employees.salary')
                    ->latest()
                    ->get();
        // return view('salary.all_advance_salary',compact('salary'));
        return view('salary.pay_salary',compact('salary'));
    }
    //insert paid salary
    public function insert_paySalary(Request $request)
    {
        $salary_month = $request->salary_month;
        $employees_id = $request->employees_id;
        $paidAdvanced = DB::table('paysalaries')
                        ->where('salary_month', $salary_month)
                        ->where('employees_id', $employees_id)
                        ->first();
        if($paidAdvanced === null){
            $data = array();
            $data['employees_id'] = $request->employees_id;
            $data['salary_month'] = $request->salary_month;
            $data['paid_amount'] = $request->paid_amount;
            // $data['year'] = $request->year;

            $advanced = DB::table('paysalaries')->insert($data);
            return redirect()->back()->with('message',' Salary Paid Successfully');
        }
        else{
            return redirect()->back()->with('error','Already  Paid the Salary in this Month');
        }
    }
    //view all paid salary
    public function allPaySalary()
    {
        $salary = DB::table('paysalaries')
                    ->join('employees','paysalaries.employees_id','employees.id')
                    ->select('paysalaries.*','employees.name','employees.photo','employees.salary')
                    ->latest()
                    ->get();
        return view('salary.salary_paid',compact('salary'));
    }


}

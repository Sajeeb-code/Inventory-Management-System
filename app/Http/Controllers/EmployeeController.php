<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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

    public function addEmployee()
    {
        return view('employee.addEmployee');
    }
    public function insert_employee(Request $request)
    {
     $request->validate([
                'name' => 'required|max:255',
                'email' => 'bail|required|unique:employees|max:255',
                'phone' => 'required|regex:/(01)[0-9]{9}/',
                'nid_no' => 'required|numeric',
                'address' => 'required',
                'experience' => 'required',
                'city' => 'required',
                'salary' => 'required', 'photo' => 'required|mimes:jpeg,png|max:2048'
     ]);
       
       $employee = new Employee();

       $employee->name = $request->name;
       $employee->email = $request->email;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->nid_no = $request->nid_no;
       $employee->experience = $request->experience;
       $employee->salary = $request->salary;
       $employee->city = $request->city;

       if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/employee',$fileName);
           $employee->photo = $fileName;

       }else{
           return $request;
           $employee->photo = '';
       }

       $employee->save();

       return redirect()->back()->with('message',' Added employee Successfully');

      
    // dd('ok');
    }


    //all employee
    public function allEmployee()
    {
        $employees = Employee::latest()->get();
        return view('employee.all_Employee',compact('employees'));
    }

    //single employee view
    public function viewEmployee($id)
    {
        $single = Employee::findOrFail($id);

        return view('employee.viewEmaployee',compact('single'));
    }

    //delete single employee
    public function deleteEmployee($id)
    {
       $delete = Employee::findOrFail($id);

        // $url = asset('images/employee/').$delete->photo;
        
    //    $photo = $delete->photo;
       unlink(public_path('images/employee/').$delete->photo);

       $deleteAll = Employee::findOrFail($id);

       $deleteAll->delete();

       return redirect()->back()->with('Employee Deleted Successfully');
    }

    //edit employee
    public function editEmployee($id)
    {
        $edit = Employee::findOrFail($id);

        return view('employee.editEmployee',compact('edit'));
    }

    //update employee
    public function updateEmployee(Request $request,$id)
    {
         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'bail|required|email|unique:employees,email,'.$request->id,
            // 'email' => 'required|max:255',
            'nid_no' => 'required|numeric',
            'address' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'photo' => 'mimes:jpg,png,jpeg|max:2048',
            'salary' => 'required',   
        ]);
        
        $employee = Employee::findOrFail($id);

       $employee->name = $request->name;
       $employee->email = $request->email;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->nid_no = $request->nid_no;
       $employee->experience = $request->experience;
       $employee->salary = $request->salary;
       $employee->city = $request->city;

        if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/employee',$fileName);
           $employee->photo = $fileName;

       }
        
        $employee->save();
         return redirect()->back()->with('message','Employee Updated Successfully');

    }



    //pdf

    public function get_all_employee()
    {
        $employeeData = DB::table('employees')->get();
        return $employeeData;
    }
    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_employee_data_to_html());
     return $pdf->stream();
    }

    function convert_employee_data_to_html()
    {
     $employee_data = $this->get_all_employee();
     $output = '
     <h3 align="center">Employee Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="6%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="8%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="7%">Phone</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="3%">Salary</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Experience</th>
    

   </tr>
     ';  
     foreach($employee_data as $employee)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$employee->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$employee->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$employee->phone.'</td>
       <td style="border: 1px solid; padding:12px;">'.$employee->address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$employee->salary.'</td>
       <td style="border: 1px solid; padding:12px;">'.$employee->experience.'</td>
      
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}

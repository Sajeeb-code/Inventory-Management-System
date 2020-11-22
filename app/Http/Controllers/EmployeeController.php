<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
                'phone' => 'required|min:11',
                'nid_no' => 'required|max:20',
                'address' => 'required',
                'experience' => 'required',
                'city' => 'required',
                'salary' => 'required',
                'vacation' => 'required',
                'photo' => 'required|mimes:jpeg,png|max:2048'
     ]);
       
       $employee = new Employee();

       $employee->name = $request->name;
       $employee->email = $request->email;
       $employee->phone = $request->phone;
       $employee->address = $request->address;
       $employee->nid_no = $request->nid_no;
       $employee->experience = $request->experience;
       $employee->salary = $request->salary;
       $employee->vacation = $request->vacation;
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
        $employees = Employee::all();
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
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|min:11',
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
       $employee->vacation = $request->vacation;
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
}

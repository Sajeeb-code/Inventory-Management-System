<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
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

    public function takeAttendence()
    {
        $employee_list = DB::table('employees')->get();
        return view('attendence.takeAttendence',compact('employee_list'));   
    }
    //insert attendnce 
    public function insert_Attendence(Request $request)
    {
        $date = $request->att_date;
        $attendence_date = DB::table('attendences')
                            ->where('att_date',$date)
                            ->first();
        if($attendence_date){
             return redirect()->back()->with('message','Opps!! Todays Attendence already taken !!');
        }
        else{
            foreach ($request->empl_id as $id) {
                $data[]=[
                    'empl_id'=>$id,
                    'att_date'=>$request->att_date,
                    'att_year'=>$request->att_year,
                    'att_month'=>$request->att_month,
                    'attendence'=>$request->attendence[$id],
                    'edit_date'=>date('d_m_Y')

                ];
            }
            $attendence = DB::table('attendences')->insert($data);

            return redirect()->back()->with('message','Attendence taken successfully!!');
        }

        
    }

    //all attendence
    public function allAttendence()
    {
        $allAttendence = DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        // $allAttendence = DB::table('attendences')->get();

        return view('attendence.allAttendence',compact('allAttendence'));
    }
    //edit attendence
    public function editAttendence($edit_date)
    {
        $data = DB::table('attendences')->where('edit_date',$edit_date)->first();
       
        $editAttendence = DB::table('attendences')
                            ->join('employees','attendences.empl_id','employees.id')
                            ->select('employees.name','employees.photo','attendences.*')
                            ->where('edit_date',$edit_date)
                            ->get();
        return view('attendence.editAttendence',compact('editAttendence','data'));
        // echo "<pre>";
        // print_r($editAttendence);

        // return 'hello';
    }
    //update attendence
    public function updateAttendence(Request $request)
    {
       
         foreach ($request->id as $id) {
                $data=[
                    'att_date'=>$request->att_date,
                    'att_year'=>$request->att_year,
                    'att_month'=>$request->att_month,
                    'attendence'=>$request->attendence[$id],
                ];

                $attendence = Attendence::where(['att_date'=>$request->att_date,'id'=>$id])->first();
                $attendence->update($data);
            }
           

            return redirect()->route('all.attendence')->with('message','Attendence update successfully!!');

    }

    //view attendence
    public function viewAttendence($edit_date)
    {
        $data = DB::table('attendences')->where('edit_date',$edit_date)->first();
       
        $viewAttendence = DB::table('attendences')
                            ->join('employees','attendences.empl_id','employees.id')
                            ->select('employees.name','employees.photo','attendences.*')
                            ->where('edit_date',$edit_date)
                            ->get();
        return view('attendence.viewAttendence',compact('viewAttendence','data'));
    }
}

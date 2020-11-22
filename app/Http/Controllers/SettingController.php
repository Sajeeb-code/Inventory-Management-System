<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        $settings = DB::table('settings')->first();

        return view('settings.settings',compact('settings'));
       
    }

    //update settings
    public function updateSetings(Request $request,$id)
    {
          $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_address' => 'required',
            'company_phone' => 'required|max:15',
            'company_city' => 'required|max:20',
            'company_zipcode' => 'required|max:11',
            'company_country' => 'required|max:20',
            'company_logo' => 'mimes:jpg,png,jpeg|max:2048',
             
        ]);
       $settings = Setting::findOrFail($id);

       $settings->company_name = $request->company_name;
       $settings->company_email = $request->company_email;
       $settings->company_phone = $request->company_phone;
       $settings->company_address = $request->company_address;
       $settings->company_zipcode = $request->company_zipcode;
       $settings->company_country = $request->company_country;
       $settings->company_city = $request->company_city;

        if($request->hasfile('company_logo')){
           $file = $request->file('company_logo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/company',$fileName);
           $settings->company_logo = $fileName;

       }
        
        $settings->save();
         return redirect()->back()->with('message','company info. updated Successfully');
    }
}

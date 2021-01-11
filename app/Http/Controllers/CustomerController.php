<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
    //add customer
    public function addCustomer()
    {
        return view('customer.addCustomer');
    }
    //insert customer
    public function insert_customer(Request $request)
    {
         $request->validate([
                'name' => 'required|max:255',
                'email' => 'bail|unique:customers|max:255',
                'phone' => 'required|min:11',
                'nid_no' => 'max:20',
                'address' => 'required',
                'account_no'=>'max:15',
                'city' => 'required',
                'shop_name' => 'max:50',
                
                'photo' => 'required|mimes:jpeg,png|max:2048'
     ]);
       
       $customer = new Customer();

       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->phone = $request->phone;
       $customer->address = $request->address;
       $customer->nid_no = $request->nid_no;
       $customer->shop_name = $request->shop_name;
       $customer->bank_name = $request->bank_name;
       $customer->account_holder = $request->account_holder;
       $customer->account_no = $request->account_no;
       $customer->bank_branch = $request->bank_branch;
       $customer->city = $request->city;

       if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/customer',$fileName);
           $customer->photo = $fileName;

       }else{
           return $request;
           $customer->photo = '';
       }

       $customer->save();

       return redirect()->back()->with('message','Customer Added Successfully');
    }

    //all view customer
    public function allCustomer()
    {
        $customers = Customer::latest()->get();
        return view('customer.all_Customer',compact('customers'));
    }
    //delete customer
    public function deleteCustomer($id)
    {
         $delete = Customer::findOrFail($id);

       unlink(public_path('images/customer/').$delete->photo);

       $deleteAll = Customer::findOrFail($id);

       $deleteAll->delete();

       return redirect()->back();
    }
    //single view customer
    public function viewCustomer($id)
    {
          $single = Customer::findOrFail($id);

        return view('customer.viewCustomer',compact('single'));
    }
    //edit customer
    public function editCustomer($id)
    {
         $edit = Customer::findOrFail($id);

        return view('customer.editCustomer',compact('edit'));
       
    }
    //update customer
    public function updateCustomer(Request $request,$id)
    {
        $validatedData = $request->validate([
           'name' => 'required|max:255',
            'email' => 'bail|email|unique:customers,email,'.$request->id,
            'phone' => 'required|min:11',
            'nid_no' => 'max:20',
            'address' => 'required',
            'account_no'=>'max:15',
            'city' => 'required',
            'shop_name' => 'max:50',
            
            'photo' => 'mimes:jpeg,png|max:2048'
        ]);
        
        $customer = Customer::findOrFail($id);

       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->phone = $request->phone;
       $customer->address = $request->address;
       $customer->nid_no = $request->nid_no;
       $customer->shop_name = $request->shop_name;
       $customer->bank_name = $request->bank_name;
       $customer->account_holder = $request->account_holder;
       $customer->account_no = $request->account_no;
       $customer->bank_branch = $request->bank_branch;
       $customer->city = $request->city;

        if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/customer',$fileName);
           $customer->photo = $fileName;

       }
        
        $customer->save();
         return redirect()->back()->with('message','Customer Updated Successfully');

    }
}

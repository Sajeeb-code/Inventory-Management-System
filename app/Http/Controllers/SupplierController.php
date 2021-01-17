<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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

    //add supplier
    public function addSupplier()
    {
        return view('supplier.addSupplier');
    }
    //insert supplier
    public function insert_supplier(Request $request)
    {
        $request->validate([
                'name' => 'required|max:255',
                'email' => 'bail|unique:suppliers',
                'phone' => 'required|regex:/(01)[0-9]{9}/',
                'type' => 'required|max:20',
                'address' => 'required',
                'city' => 'max:20',
                'shop_name' => 'max:50',
                'photo' => 'mimes:jpeg,png|max:2048'
     ]);
       
       $supplier = new Supplier();

       $supplier->name = $request->name;
       $supplier->email = $request->email;
       $supplier->phone = $request->phone;
       $supplier->address = $request->address;
       $supplier->type = $request->type;
       $supplier->shop_name = $request->shop_name;
       $supplier->city = $request->city;

       if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/supplier',$fileName);
           $supplier->photo = $fileName;

       }else{
           return $request;
           $supplier->photo = '';
       }

       $supplier->save();

       return redirect()->back()->with('message','Supplier Added Successfully');
    }
    //view all suppliers
    public function allSupplier()
    {
         $suppliers = Supplier::latest()->get();
        return view('supplier.all_Supplier',compact('suppliers'));
    }
    //view single supplier
    public function viewSupplier($id)   
    {
         $single = Supplier::findOrFail($id);

        return view('supplier.viewSupplier',compact('single'));
    }
    //delete suppliers
    public function deleteSupplier($id)
    {
         $delete = Supplier::findOrFail($id);

       unlink(public_path('images/supplier/').$delete->photo);

       $deleteAll = Supplier::findOrFail($id);

       $deleteAll->delete();

        return redirect()->back()->with('message','Supplier Deleted Successfully');
    }
    // supplier edit
    public function editSupplier($id)
    {
          $edit = Supplier::findOrFail($id);

        return view('supplier.editSupplier',compact('edit'));
    }
    //update suppliers
    public function updateSupplier(Request $request,$id)
    {
        $validatedData = $request->validate([
           'name' => 'required|max:255',
            'email' => 'bail|email|unique:customers,email,'.$request->id,
            'phone' => 'required|min:11',
            'type' => 'required',
            'address' => 'required',
            
            'city' => 'max:20',
            'shop_name' => 'max:50',
            
            'photo' => 'mimes:jpeg,png|max:2048'
        ]);
        
        $supplier = Supplier::findOrFail($id);

       $supplier->name = $request->name;
       $supplier->email = $request->email;
       $supplier->phone = $request->phone;
       $supplier->address = $request->address;
       $supplier->type = $request->type;
       $supplier->shop_name = $request->shop_name;
       $supplier->city = $request->city;

        if($request->hasfile('photo')){
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/supplier',$fileName);
           $supplier->photo = $fileName;

       }
        
        $supplier->save();
        return redirect()->back()->with('message','Supplier updated Successfully');
    }
}

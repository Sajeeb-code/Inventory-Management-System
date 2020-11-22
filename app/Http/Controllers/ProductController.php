<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
    //add product
    public function addProduct()
    {
        return view('product.addProduct');
    }
    //view all product
    public function allProduct()
    {
        $allProducts = Product::all();

        return view('product.all_product',compact('allProducts'));
    }
    //insert product
    public function insert_Product(Request $request)
    {
        $request->validate([
                'product_name' => 'required|max:255',
                'product_code' => 'bail|required|unique:products',
                'cat_id' => 'required',
                'supp_id' => 'required',
                'product_wareHouse' => 'required',
                'product_route' => 'required',
                'buy_date' => 'required',
                'expire_date' => 'required',
                'buying_price' => 'required',
                'selling_price' => 'required',
                'product_image' => 'required|mimes:jpeg,png|max:2048'
     ]);
       
       $product = new Product();

       $product->product_name = $request->product_name;
       $product->product_code = $request->product_code;
       $product->cat_id = $request->cat_id;
       $product->supp_id = $request->supp_id;
       $product->product_wareHouse = $request->product_wareHouse;
       $product->product_route = $request->product_route;
       $product->buy_date = $request->buy_date;
       $product->expire_date = $request->expire_date;
       $product->buying_price = $request->buying_price;
       $product->selling_price = $request->selling_price;

       if($request->hasfile('product_image')){
           $file = $request->file('product_image');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/product',$fileName);
           $product->product_image = $fileName;

       }else{
           return $request;
           $product->product_image = '';
       }

       $product->save();

       return redirect()->back()->with('message',' Added product Successfully');
        
    }
    //view single product
    public function viewProduct($id)
    {
        $viewProducts = DB::table('products')
                        ->join('categories','products.cat_id','categories.id')
                        ->join('suppliers','products.supp_id','suppliers.id')
                        ->select()
                        ->where('products.id',$id)
                        ->first();

        return view('product.viewProduct',compact('viewProducts'));
    }

    //delete product
    public function deleteProduct($id)
    {
         $delete = Product::findOrFail($id);

       unlink(public_path('images/product/').$delete->product_image);

       $deleteAll = Product::findOrFail($id);

       $deleteAll->delete();

       return redirect()->back()->with('message','product Deleted Successfully');
    }
    //edit product
    public function editProduct($id)
    {
          $editProduct = Product::findOrFail($id);

          return view('product.editProduct',compact('editProduct'));
    }

    //update product
    public function updateProduct(Request $request,$id)
    {
         $validatedData = $request->validate([
                'product_name' => 'required|max:255',
                'product_code' => 'bail|required|unique:products,product_code,'.$request->id,
                'cat_id' => 'required',
                'supp_id' => 'required',
                'product_wareHouse' => 'required',
                'product_route' => 'required',
                'buy_date' => 'required',
                'expire_date' => 'required',
                'buying_price' => 'required',
                'selling_price' => 'required',
                'product_image' => 'mimes:jpeg,png|max:2048'
     ]);
     $product = Product::findOrFail($id);

       $product->product_name = $request->product_name;
       $product->product_code = $request->product_code;
       $product->cat_id = $request->cat_id;
       $product->supp_id = $request->supp_id;
       $product->product_wareHouse = $request->product_wareHouse;
       $product->product_route = $request->product_route;
       $product->buy_date = $request->buy_date;
       $product->expire_date = $request->expire_date;
       $product->buying_price = $request->buying_price;
       $product->selling_price = $request->selling_price;

       if($request->hasfile('product_image')){
           $file = $request->file('product_image');
           $extension = $file->getClientOriginalExtension();
           $fileName = time().'.'.$extension;
           $file->move('images/product',$fileName);
           $product->product_image = $fileName;

       }

       $product->save();

       return redirect()->back()->with('message','Product updated Successfully');

    }
    //export and import products
    public function importProduct()
    {
        return view('product.importProduct');
    }
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {
         Excel::import(new ProductsImport, $request->file('import_product'));
        
        return redirect('/all-product')->with('message', 'All good!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    //add category
    public function addCategory()
    {
        return view('category.add_category');
    }
    //insert category
    public function insert_category(Request $request)
    {
         $validatedData = $request->validate([
            'category_name' => 'required|max:255|unique:categories',
        ]);

        $category = Category::create(
            $request->all()
        );
        return redirect()->back()->with('message','Category added successfully!!');
    }
    //view category
    public function allCategory()
    {
        $category = Category::latest()->get();

        return view('category.all_category',compact('category'));
    }
    //delete category
    public function deleteCategory($id)
    {
       $delete = Category::findOrFail($id);

       $delete->delete();

       return redirect()->back()->with('message','Category deleted successfully!!');
    }
    //edit category
    public function editCategory($id)
    {
       $editCategory = Category::findOrFail($id);

       return view('category.edit_category',compact('editCategory'));
    }

    //update category
    public function updateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
        ]);
        
         $editCategory = Category::findOrFail($id);

         $editCategory->category_name = $request->category_name;

         $editCategory->save();

         return redirect()->back()->with('message','Category updated successfully!!');

    }
}

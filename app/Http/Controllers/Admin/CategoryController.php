<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category_manage()
    {
        $categories = Category::with('items')->get();

        return view('admin.pages.category.category-manage',compact('categories'));
    }

    public function category_save(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'category_name'   => 'required|string|min:3|max:20|unique:categories',
            'store_direction' => 'required|string|unique:categories',
        ]);

        if($validator->fails())
        {
            session()->flash('type','danger'); //This is for testing purpose
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please Try Again');

            return redirect()->back()->withErrors($validator)->withInput();
        }


        $category                  = new Category();
        $category->category_name   = $request->category_name; 
        $category->store_direction = $request->store_direction; 
        $category->save();
        
        session()->flash('type','success');
        session()->flash('message','Category Added Successfully.');
        
        return redirect()->back();
    }

    public function category_update(Request $request, $id)
    {
        $category = Category::find($id); //Catch the Record According to Id

        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'category_name'   => 'required|string|min:3|max:20|unique:categories,category_name,'.$category->id,
            'store_direction' => 'required|string|unique:categories,store_direction,'.$category->id
        ]);

        if($validator->fails())
        {
            session()->flash('type','danger'); //This is for testing purpose
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please Try Again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category                  = Category::find($id);
        $category->category_name   = $request->category_name; 
        $category->store_direction = $request->store_direction; 
        $category->update();
        
        session()->flash('type','success');
        session()->flash('message','Category Updated Successfully.');
        
        return redirect()->back();
    }

    public function category_delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('type','success');
        session()->flash('message','Category Deleted Successfully.');
        
        return redirect()->back();
    }
}

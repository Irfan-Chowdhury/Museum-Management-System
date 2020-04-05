<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Auth;
use Image;
use File; //For Use Delete Image File
class ItemController extends Controller
{
    public function item_create()
    {
        $categories = Category::orderBy('category_name','ASC')->get();

        return view('admin.pages.item.item-create',compact('categories'));
    }

    public function item_save(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'category_id' => 'required',
            'item_name'   => 'required|string|min:3|max:50',
            'description' => 'required',
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item              = new Item();
        $item->user_id     = Auth::user()->id;
        $item->item_name   = $request->item_name;
        $item->category_id = $request->category_id;
        $item->description = $request->description;


        if ($request->hasFile('photo')) 
        {
           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/items/';
            $imageUrl       = $directory.$imageName;
            $upload_path     = public_path().$imageUrl;
            Image::make($file)->resize(300,300)->save($upload_path);
            
            // --- Image Intervention End ---

            $item->photo = $imageUrl;
        }
        
        $item->save();

        session()->flash('type','success');
        session()->flash('message','Item Added Successful.');
        
        return redirect()->back();
    }

    public function item_list()
    {
        $items = Item::with('user','category')->orderBy('id','DESC')->get(); //'category' come from Item Model

        return view('admin.pages.item.item-list',compact('items'));
    }

    public function item_edit($id)
    {
        $categories = Category::all(); //For items.category_id == categories.id

        $item = Item::find($id);

        return view('admin.pages.item.item-edit',compact('item','categories'));
    }

    public function item_update(Request $request, $id)
    {
        $validator= Validator::make($request->all(),[
            // 'category_id' => 'required',
            'item_name'   => 'required|string|min:3|max:50',
            'description' => 'required',
            // 'photo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', //This Time No Need
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $item              = Item::find($id);
        $item->user_id     = Auth::user()->id;
        $item->item_name   = $request->item_name;
        $item->category_id = $request->category_id;
        $item->description = $request->description;

        if ($request->hasFile('photo')) 
        {
            if (File::exists(public_path().$item->photo)) //delete previous image from storage
            {  
                File::delete(public_path().$item->photo);
            }

           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/items/';
            $imageUrl       = $directory.$imageName;
            $upload_path     = public_path().$imageUrl;
            Image::make($file)->resize(300,300)->save($upload_path);
            
            // --- Image Intervention End ---

            $item->photo = $imageUrl;
        }
        
        $item->update();

        session()->flash('type','success');
        session()->flash('message','Item Updated Successful.');
        
        return redirect()->back();
    }

    public function item_delete($id)
    {
        $item = Item::find($id);

        if (File::exists(public_path().$item->photo)) //delete previous image from storage
        {  
            File::delete(public_path().$item->photo);
        }

        $item->delete();

        session()->flash('type','success');
        session()->flash('message','Item Deleted Successfully.');
        
        return redirect()->back();
    }
      
}

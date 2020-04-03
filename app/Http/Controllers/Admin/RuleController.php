<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rule;
use Auth;
class RuleController extends Controller
{
    public function rule_create()
    {
        return view('admin.pages.rule.rule-create');
    }

    public function rule_save(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'title'       => 'required|unique:rules|min:3|max:50',
            'description' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rule              = new Rule();
        $rule->user_id     = Auth::user()->id;
        $rule->title       = $request->title;
        $rule->description = $request->description;
        $rule->save();

        session()->flash('type','success');
        session()->flash('message','Rule Added Successfully.');
        
        return redirect()->back();
    }

    public function rule_list()
    {
        $rules = Rule::all();
        return view('admin.pages.rule.rule-list',compact('rules'));
    }

    public function rule_edit($id)
    {
        $rule = Rule::find($id);
        return view('admin.pages.rule.rule-edit',compact('rule'));
    }

    public function rule_update(Request $request,$id)
    {
        $rule = Rule::find($id);
        $rule->user_id     = Auth::user()->id;
        $rule->title       = $request->title;
        $rule->description = $request->description;
        $rule->update();

        session()->flash('type','success');
        session()->flash('message','Rule Updated Successfully.');
        
        return redirect()->route('rule-list');

    }

    public function rule_delete($id)
    {
        $rule = Rule::find($id);
        $rule->delete();

        session()->flash('type','success');
        session()->flash('message','Rule Deleted Successfully.');
        
        return redirect()->route('rule-list');
    }

    public function rule_unpublished(Request $request, $id)
    {
        $rule = Rule::find($id);
        $rule->status   = 'unpublished';
        $rule->update();

        return redirect()->back();
    }

    public function rule_published(Request $request, $id)
    {
        $rule = Rule::find($id);
        $rule->status   = 'published';
        $rule->update();

        return redirect()->back();
    }
}

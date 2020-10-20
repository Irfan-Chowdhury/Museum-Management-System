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
        // $text =  str_word_count($request->description);

        // return $text;
        // if(str_word_count($request->description) > 6)
        // return 'more than 6 words';

        //--------------------------- validation -----------------------------
        $validator = Validator::make($request->all(),[
            'title'       => 'required|unique:rules|min:3|max:50',
            'description' => 'required|max:500',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rule              = new Rule();
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

        $validator = Validator::make($request->all(),[
            'title'       => 'required|min:3|max:50|unique:rules,title,'.$rule->id,
            'description' => 'required|max:500',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

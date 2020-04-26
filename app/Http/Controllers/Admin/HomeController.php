<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Donation;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $items            = Item::all();
        $donations        = Donation::where('status','pending')->get();
        $users            = User::where('role','user')->get();
        $visitors         = Visitor::all();
        $user_messages    = Message::where('type','user')->where('status','unread')->get();
        $visitor_messages = Message::where('type','visitor')->where('status','unread')->get();

        return view('admin.pages.home.index',compact('items','users','visitors','donations','user_messages','visitor_messages'));
    }
}

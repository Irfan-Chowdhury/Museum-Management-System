<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function user_messages()
    {
        $user_messages = Message::with('user')
                            ->where('type','=','user')
                            ->orderBy('id','DESC')
                            ->get();

        return view('admin.pages.messages.user-messages',compact('user_messages'));
    }
    
    public function visitor_messages()
    {
        $visitor_messages = Message::where('type','=','visitor')
                                    ->orderBy('id','DESC')
                                    ->get();

        return view('admin.pages.messages.visitor-messages',compact('visitor_messages'));
    }

    public function message_read($id)
    {
        $messageInfo = Message::find($id);
        $messageInfo->status = 'read';
        $messageInfo->update();

        return view('admin.pages.messages.message-read',compact('messageInfo'));
    }

    public function message_delete($id)
    {
        $messageInfo = Message::find($id);
        $messageInfo->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.message.index',compact('messages'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json(['success' => true, 'id' => $message->id]);
    }
}

<?php

namespace App\Http\Controllers\userPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPanelCommentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $comments = $user->comments()->where('is_active','1')->latest()->get();
        return view('user-panel.comment',compact('comments','user'));
    }
}

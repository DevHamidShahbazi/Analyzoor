<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('admin.comment.index',compact('comments'));
    }
    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'is_active'=>$request['is_active']
        ]);
        return redirect()->back()->with('success','تغییر اعمال شد');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['success' => true, 'id' => $comment->id]);
    }
}

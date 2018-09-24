<?php

namespace App\Http\Controllers;

use App\Following;
use App\Notifications\NotifyUser;
use App\Posts;
use App\User;
use App\Comments as Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GlobalController extends Controller
{
    public function Follow(User $user)
    {
        $follow = New Following();
        $follow->User_id = Auth::id();
        $follow->Target_id = $user->id;
        $follow->save();
        return Redirect::back();
    }
    public function showpostandcomment()
    {
        $post = Posts::all()->get(1);
        // dd($post);
        $comments = Comment::all()->where('Post_id', $post->Post_id);
        dd($comments);

        return view('commenttest',compact('post','comments'));
    }
    public function CreateComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:4'
        ]);
       $comment = new Comment();
       $comment->User_id = Auth::id();
       $comment->Post_id = $request->input('post_id');
       $comment->Comment = $request->input('comment');
       // dd($comment);
       $comment->save();
     $post = Posts::find($request->input('post_id'));

     $post->user->notify(new NotifyUser($post));
     // Session::flash('Status','Comment was successfully created');
     return redirect()->back();
    }
    public function ShowUpdateComment(Comment $comment)
    {

       return view('commenttest2',compact('comment'));

    }
    public function UpdateComment(Request $request, Comment $comment)
    {
        $comment->Comment = $request->input('comment');
        $comment->save();
        return redirect()->route('comment');
    }

    public function DeleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment');
    }
//    public function ShowPost(Posts $post)
//    {
////        dd($post);
////        return view('Post.showpost',compact('thepost'));
//    }
}

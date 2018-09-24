<?php

namespace App\Http\Controllers;

use App\Following;
use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Profile_settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Likes;
use App\Opg_videos;


class NewsfeedController extends Controller
{

    public function showFriends(){

        $user_id = Auth::user()->id;

        $vrienden = Following::all()->whereIn('User_id', $user_id)->pluck('Target_id');
        $likes = Likes::all()->whereIn('User_id',$vrienden)->pluck('Target_id')->unique();
        $posts = Posts::orderBy('created_at', 'desc')->whereIn('Post_id',$likes)->get();

        return view('Newsfeed.friendPost', compact('posts','users'));
    }
    public function index(){
        $user = Auth::id();

        $followings = Following::where('User_id', $user)->pluck('Target_id')->push($user);

        $post = Posts::whereIn('User_id', $followings)->orderBy('created_at', 'desc')->get();
        $users = User::all()->whereIn('id', $followings)->flatten();        

        return view('Newsfeed.index', compact('post', 'users', 'liked'));
    }

    public function posttext(Request $request)
    {
        $user = Auth::user();

        $post = new Posts;
        $post->User_id = $user->id;

        $validator = Validator::make($request->all(), [
            'Text_title' => 'required|min:2',
            'Text_body' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect('/Newsfeed')
            ->withErrors($validator)->withInput();
        }

        if ($validator = true) {

            $post->Text_title = $request->input("Text_title");
            $post->Text_body = $request->input("Text_body");
            $post->Post_type = "Tekst";
            $post->save();
            return redirect('/Newsfeed');
        } else {
            return '%';
        } 
    }

    public function postfoto(Request $request)
    {
        $user = Auth::user();

        $post = new Posts;
        $post->User_id = $user->id;

        $validator = Validator::make($request->all(), [
            'Foto' => 'required',
            'Text_body' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect('/Newsfeed')
            ->withErrors($validator)->withInput();
        }

        if ($validator = true) {

            $filePath = $request->file('Foto')->getRealPath();
            $file = file_get_contents($filePath);
            $blob = base64_encode($file);
            $post->Foto = $blob;
            $post->Text_body = $request->input("Text_body");
            $post->Post_type = 'Foto';
            $post->save();
            return redirect('/Newsfeed');
        } else {
            return '%';
        } 
    }

    public function postcitaat(Request $request)
    {
        $user = Auth::id();
        
        $post = new Posts;
        $post->User_id = $user;

        $validator = Validator::make($request->all(), [
            'citaat' => 'required',
            'Text_body' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect('/Newsfeed')
            ->withErrors($validator)->withInput();
        }

        if ($validator = true) 
        {   
            $post->Text_title = $request->input("citaat");
            $post->Text_body = $request->input("Text_body");
            $post->Post_type = 'Citaat';
            $post->save();
            return redirect('/Newsfeed');
        } else {
            return '%';
        } 
    }

    public function deletePost()
    {
        $post = Posts::all()->whereIn('Post_id', "Hier moet Post id komen"); 

        $post->delete();
    }
    public function addLikes(Request $request, Posts $posts)
    {
        $user = Auth::id();
        if (!empty($posts->likes[0]->User_id) == $user) {
            // dd($posts->likes[0]->isLiked);
            return redirect('/Newsfeed');
        } else { 
            $like = new Likes;
            $like->isLiked = '1';
            $like->User_id = $user;
            $like->Target_id = $posts->Post_id;
            $like->save();
        }
        return redirect('/Newsfeed');

    }
    public function showPost(Request $request)
    {
        $post_id = $request["Post_id"];
       // $user_id = $request["User_id"];

        $posts = Posts::all()->whereIn('Post_id', $post_id);
       // $users = User::all()->whereIn('User_id', $user_id);
        return view('Newsfeed.Post', compact('posts', 'users'));
    }
}
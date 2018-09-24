<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;

use App\Posts;
use Illuminate\Http\Request;
use App\User;
use App\Likes;
use App\Posts as Post;
use App\Profile_settings;
use App\Followers;
use App\Following;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProfielController extends Controller
{
    public function settings()
    {
        return view('ProfielInstellingen.index');
    }
    public function myprofiel()
    {
        $user = Auth::id();
        $profile_settings = Profile_settings::find($user);
        $post = Posts::where('User_id', $user)->orderBy('created_at', 'desc')->get();

        return view('Profiel.index',compact('profile_settings', 'post'));
    }
    public function userprofile($nickname)
    {
        $user = User::where('nickname', $nickname)->first();

        if (is_null($user)) {
            abort(404, 'Not found!');
        } else {
            $profile_settings = Profile_settings::find($user);
            $post = Posts::where('User_id', $user->id)->orderBy('created_at', 'desc')->get();
        }

        return view('Profiel.index', ['users' => User::findOrFail($user)], compact('profile_settings', 'post'));
    }
    public function Removepf()
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $defaultpf = file_get_contents('../public/img/default_profile.jpg');
        $profile_setting = $user->profile;
        $blob = base64_encode($defaultpf);
        $profile_setting->Profile_picture = $blob;
        $profile_setting->Picture_Extension = 'jpg';
        $profile_setting->save();
        return Redirect('/ProfielInstellingen');
    }
    public function Updatepf(Request $request)
    {
        // dd($request);
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $file = $request->file('image');
        $fileforblob =file_get_contents($file->getRealPath());
        $extention = $file->getClientOriginalExtension();

        $profile_setting = $user->profile;
        $blob = base64_encode($fileforblob);
        $profile_setting->Profile_picture = $blob;
        $profile_setting->Picture_Extension = $extention;
        $profile_setting->save();
        return Redirect('/Profiel');
    }
    public function UpdateBio(Request $request)
    {
        $userid = Auth::id();
        $user = User::find($userid);

        $profile_setting = $user->profile;
        $profile_setting->bio = $request->input('bio');
        $profile_setting->save();
        return Redirect('/Profiel');
    }
    public function EditPostIndex($post)
    {
        $apost = Posts::find($post);
        $valuetitle = $apost->Text_title;
        $valuebody = $apost->Text_body;
        return view('Profiel.EditPost', compact('apost','valuebody' , 'valuetitle'));
    }
    public function EditPost(Request $request, $apost)
    {
        $posts = Posts::find($apost);
        $posts->Text_title = $request->input('texttitle');
        $posts->Text_body = $request->input('textbody');
        $posts->save();
    }
    public function RemovePost( $post)
    {
        $thepost = Posts::find($post);
        $thepost->delete();
        return redirect('/Profiel');
    }
    public function EditHeader(Request $request)
    {
        // dd($request);
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $profile_setting = $user->profile;

        $file = $request->file('image');
        $fileforblob = file_get_contents($file->getRealPath());
        $extention = $file->getClientOriginalExtension();

        $blob = base64_encode($fileforblob);
        $profile_setting->Header = $blob;

        // $profile_setting->Header = $request->input('Header');
        $profile_setting->save();
        return Redirect('/Profiel');
    }
    public function editfont(Request $request)
    {
        // dd($request);
        $user = Auth::user();

        $profile_setting = $user->profile;

        $profile_setting->Font_Color = $request->input('Font_Color'); 

        $profile_setting->save();
        return Redirect('/Profiel');
    }
    public function editbody(Request $request)
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $profile_setting = $user->profile;

        $profile_setting->Body_Color = $request->input('Body_Color'); 

        $profile_setting->save();
        return Redirect('/Profiel');
    }
}

//        ADD NEW POST
//        $post = new Post;
//        $post->User_id = $user->id;
//        $post->Post_type = ;
//        $post->save();
//        return redirect('/Dashboard');

//    ADD NEW Profile_settings
//        $profile_settings = new Profile_settings;
//        $profile_settings->User_id = Auth::user()->id;
//       $temp = file_get_contents('images/background.jpg');
//        $blob = base64_encode($temp);
//        $profile_settings->Profile_picture = $blob;
//        $profile_settings->save();






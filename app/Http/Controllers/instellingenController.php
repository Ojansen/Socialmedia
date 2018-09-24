<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile_settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class instellingenController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::id());
        return view('Instellingen.index', compact('user'));
    }

    public function editFirstname(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'naam' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect('/Instellingen')
            ->withErrors($validator)->withInput();
        }

        if ($validator = true) {

            $user->first_name = ucfirst($request->input('naam'));
            $user->save();
            return redirect('/Instellingen');
        } else {
            return 'het is niet gelukt';
        } 
    }

    public function editLastname(Request $request)
    {
        $user = User::find(Auth::id());


        $validator = Validator::make($request->all(), [
            'achternaam' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return redirect('/Instellingen')
            ->withErrors($validator)->withInput();
        }

        if ($validator = true) {
            $user->last_name = ucfirst($request->input('achternaam'));
            $user->save();
            return redirect('/Instellingen');
        } else {
            return 'sdfgh';
        }
    }

    public function editPassword(Request $request)
    {
        $user = User::find(Auth::id());


        $validator = Validator::make($request->all(), [
            'old_pass_input' => 'required',
            'new_pass1' => 'required|min:6|regex:/^(?=.[a-z])(?=.[A-Z])(?=.*\d).+$/',
            'new_pass2' => 'required|min:6|regex:/^(?=.[a-z])(?=.[A-Z])(?=.*\d).+$/',
        ]);

        if ($validator->fails()) {
            return redirect('/Instellingen')
                ->withErrors($validator)
                ->withInput();
        }

        if($validator = true){

            $old_pass_database = Auth::user()->getAuthPassword();
            $old_pass_input = $request->input('old_password');
            $new_pass1 = $request->input('new_password1');
            $new_pass2 = $request->input('new_password2');


            $checkpass = Hash::Check($old_pass_input, $old_pass_database);
            if ($checkpass = true){
                if($new_pass1 == $new_pass2){
                    $encrypt = bcrypt($new_pass1);
                    $user->password = $encrypt;

                    $user->save();
                    
                }
            }
            return redirect('/instellingen');
        } 
    }

    public function editEmail(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'email1' => 'required|email',
            'email2' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('/Instellingen')
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator = true) {

            $email1 = $request->input('email1');
            $email2 = $request->input('email2');
            if ($email1 == $email2) {

                $user->email = $request->input('email1');
                $user->save();
            }
            return redirect('/Instellingen');
        }
    }

    public function editBirthday(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'geb_datum' => 'required|date|before:2004-01-01',
        ]);
        if ($validator->fails()) {
            return redirect('/Instellingen')
                ->withErrors($validator)
                ->withInput();
        }
        if ($validator = true) {
            $user->birthday = $request->input('geb_datum');
            $user->save();
        }   
        return redirect('/Instellingen');
    }

    public function editNickname(Request $request)
    {
        $user = User::find(Auth::id());
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $profile_settings = $user->profile_settings;
        $nickname = $request->input('nickname');

        $validator = Validator::make($request->all(), [
            'nickname' => 'required|min:2|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect('/Instellingen')
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator = true) {
           $user->nickname = $nickname;
            $profile_settings->Title = $nickname;
            $profile_settings->save();
            $user->save();
        return redirect('/Instellingen');      

        }
    }
    
    public function delete(Request $request)
    {
        $user = User::find(Auth::id());

        $passdb = Auth::user()->getAuthPassword();
        $password_check = $request->input('password_check');

        $validator = Validator::make($request->all(), [
            'password_check' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/Instellingen')
                ->withErrors($validator)
                ->withInput();
        }

        if($validator = true){
            $checkpass = Hash::Check($password_check, $passdb);
            if ($checkpass = true){
                $user->delete();
                if (!$user->delete()) { return redirect('/Home');}
                else { return 'het is niet gelukt';}
            }
        }   
    }
}
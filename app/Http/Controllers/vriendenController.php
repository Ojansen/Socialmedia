<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class vriendenController extends Controller
{
    public function show()
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $array = array();
        $followings = $user->Following;
        //dd($followings);
        foreach ($followings as $following)
        {
            $id = $following->Target_id;
            array_push($array, $id);
        }
        $userfriend = User::find($array);
        return view('vrienden.vrienden', compact('userfriend'));
    }
}
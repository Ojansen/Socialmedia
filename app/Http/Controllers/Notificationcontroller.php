<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notificationcontroller extends Controller
{
    public function get()
    {
        $notification = Auth::user()->unreadNotifications;
        return $notification;
    }
    public function read(Request $request)
    {
        Auth::user()->unreadNotifications()->find($request->id)->MarkAsRead();
        return 'success';
    }
}

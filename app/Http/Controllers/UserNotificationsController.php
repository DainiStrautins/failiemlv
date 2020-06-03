<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {
        return view('notifications.show',[
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead() // notifies user, user gets new notification
        ]);
    }
    public function index()
    {
        $count = count(auth()->user()->unreadNotifications); // returns a number of unread notifications
        return view('main',$count);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       $count = count(auth()->user()->unreadNotifications);
        return view('main',compact('count'));
    }
}

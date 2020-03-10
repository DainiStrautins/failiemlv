<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function usersDemo()
    {
        return view('users');
    }
    public function adminDemo()
    {
        return view('admin');
    }

    public function permisionDenied()
    {
        return view('nopermission');
    }
}

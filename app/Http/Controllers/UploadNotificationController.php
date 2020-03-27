<?php

namespace App\Http\Controllers;
use App\Notifications\UploadCreated;
use Illuminate\Http\Request;

class UploadNotificationController extends Controller
{
    public function create()
    {
        return view('payments.subscription');
    }
    public function store()
    {
        request()->user()->notify(new UploadCreated(9));
        return redirect('/subscription');
    }
}

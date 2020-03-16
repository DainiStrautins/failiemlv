<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('payments.subscription');
    }
    public function store()
    {
    request()->user()->notify(new PaymentReceived(9));
    return view('payments.subscription');
    }
}

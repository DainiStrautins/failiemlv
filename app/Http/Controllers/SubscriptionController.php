<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use App\Notifications\SubscriptionAnnuallyBusiness;
use App\Notifications\SubscriptionAnnuallyPro;
use App\Notifications\SubscriptionBasic;
use App\Notifications\SubscriptionMonthlyBusiness;
use App\Notifications\SubscriptionMonthlyPro;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('payments.subscription');
    }
    public function store(Request $request)
    {
        $value = request()->get('Subscription');
        if($value=="Basic"){
            request()->user()->notify(new SubscriptionBasic($value));
        }
        if($value=="Business"){
            request()->user()->notify(new SubscriptionMonthlyBusiness($value));
        }
        if($value=="Pro"){
            request()->user()->notify(new SubscriptionMonthlyPro($value));
        }
        if($value=="Enterprise"){
            request()->user()->notify(new SubscriptionAnnuallyBusiness($value));
        }
        if($value=="Premium"){
            request()->user()->notify(new SubscriptionAnnuallyPro($value));
        }
        return redirect('/subscription');
    }
}

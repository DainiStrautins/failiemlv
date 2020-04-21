<?php

namespace App\Http\Controllers;

use App\Notifications\SubscriptionAnnuallyBusiness;
use App\Notifications\SubscriptionAnnuallyPro;
use App\Notifications\SubscriptionBasic;
use App\Notifications\SubscriptionMade;
use App\Notifications\SubscriptionMonthlyBusiness;
use App\Notifications\SubscriptionMonthlyPro;
use App\Subscription_user;
use Illuminate\Http\Request;
use App\Subscription;
use Illuminate\Notifications\Notification;

class SubscriptionController extends Controller
{
    public function create()
    {
        $users = current_user();
        $users->subscriptions;

        return view('subscription', compact(['users']));
    }
    public function store(Request $request)
    {
        $value = request()->get('Subscription');
        $Subscription = new Subscription_user;
        $Subscription->subscription_id = $value;
        $Subscription->user_id = current_user()->id;
        $Subscription->save();

        request()->user()->notify(new SubscriptionMade($value));

        return redirect('/subscription');
    }
}

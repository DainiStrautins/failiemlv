<?php

namespace App\Http\Controllers;

use App\Notifications\SubscriptionAnnuallyBusiness;
use App\Notifications\SubscriptionAnnuallyPro;
use App\Notifications\SubscriptionBasic;
use App\Notifications\SubscriptionMade;
use App\Notifications\SubscriptionMonthlyBusiness;
use App\Notifications\SubscriptionMonthlyPro;
use App\Subscription_user;
use App\User;
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
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        if ($user->id === current_user()->id)
        {
            $SubscriptionType = Subscription_user::where('user_id', current_user()->id)->pluck('subscription_id');
            $user->subscriptions()->detach($SubscriptionType);
            return redirect('subscription');
            return redirect('subscription');
        }
        return view('_nopermission');
    }
}

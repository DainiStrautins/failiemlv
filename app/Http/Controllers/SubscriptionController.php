<?php

namespace App\Http\Controllers;

use App\Notifications\SubscriptionMade;
use App\Subscription_user;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Subscription;
use Illuminate\Notifications\Notification;

class SubscriptionController extends Controller
{
    public function create()
    {
        $subscriptions = Subscription::get();
        $users = current_user(); // Gets current authenticated user
        $currentUserSubscription = Subscription_user::where('user_id', current_user()->id)->get();
        return view('subscription', compact(['users']),compact(['subscriptions']))->with(['currentUserSubscription'=>$currentUserSubscription]);
    }
    public function store(Request $request, User $user)
    {
        $request->validate([
            'user' =>  'unique:subscription_user,user_id'
        ]);
            $value = request()->get('user'); // Gets submitted subscription

            $Subscription = new Subscription_user; // Assigns new subscription for user
            $Subscription->subscription_id = $value; // Assigns subscription_id field value of selected subscription
            $Subscription->user_id = current_user()->id; // Assigns user_id field authenticated user id
            $Subscription->save(); // Stores this record into database

        request()->user()->notify(new SubscriptionMade($value)); // Creates a notification

            return redirect('/subscription');
    }
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->firstOrFail(); // Gets user
        if ($user->id === current_user()->id) // Checks if user is not trying to submit page with different button with different user_id
        {
            $SubscriptionType = Subscription_user::where('user_id', current_user()->id)->pluck('subscription_id'); // Shows current user subscription id
            $user->subscriptions()->detach($SubscriptionType); // Detach the subscription
            return redirect('subscription');
        }
        return view('_nopermission');
    }
}

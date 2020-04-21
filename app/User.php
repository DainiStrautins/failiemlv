<?php

namespace App;

use App\Events\UserCreatedEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Admin, Users, Uploads, Subscriptions;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    protected $dispatchesEvents = [
        'created' => UserCreatedEvent::class,
    ];
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
    public function subscriptions()
    {
        return $this->belongsToMany('App\Subscription');
    }
    public function subscription_user()
    {
        return $this->belongsToMany('App\Subscription_user');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription_user extends Model
{
    protected $guarded = [];
    protected $table = 'subscription_user';
    public function users()
    {
        return $this->belongsTo('App\User','user_id')->withTimestamps();
    }
}

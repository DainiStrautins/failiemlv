<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
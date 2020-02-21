<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{


    public function users()
    {
        return $this->hasMany('App\users');
    }
    protected $guarded = [];


}

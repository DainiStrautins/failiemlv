<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $guarded = [];


    public function uploader()
    {
        return $this->belongsTo('App\User','user_id');
    }



}

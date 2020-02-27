<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $guarded = [];


    public function uploader()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}

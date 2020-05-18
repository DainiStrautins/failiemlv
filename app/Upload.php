<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use Uploads;

    protected $guarded = [];


    public function uploader()
    {
        return $this->belongsTo('App\User','user_id');
    }



}

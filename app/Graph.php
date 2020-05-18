<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function uploads()
    {
        return $this->belongsTo(Upload::class);
    }
}

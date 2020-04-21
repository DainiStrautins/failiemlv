<?php


namespace App;


trait Users
{
    public function userlatestRecords()
    {
        return Upload::latest('created_at')->where('user_id', $this->id)->first();
    }
}

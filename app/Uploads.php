<?php


namespace App;


trait Uploads
{
    public function accessibleProjects()
    {
        return Upload::where('user_id', $this->id)->paginate(24);
    }
}

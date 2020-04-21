<?php


namespace App;


trait Admin
{
    public function getallusers()
    {
        return User::with('roles')->get();
    }
    public function getAdmin()
    {
        return Role::where('name', 'admin')->firstOrFail();
    }
    public function Role()
    {
        return Role::where('name', 'user')->firstOrFail();
    }
    public function getUsersRole()
    {
        return auth()->user()->roles->pluck('name');
    }
    public function hasRole($role)
    {
        $roles = $this->roles()->where('name', $role)->count();
        
        if ($roles == 1){
            return true;
        }
        return false;
    }
}

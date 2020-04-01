<?php

namespace App;

use App\Events\UserCreatedEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function hasRole($role)
    {
        $roles = $this->roles()->where('name', $role)->count();
        if ($roles == 1){
            return true;
        }
        return false;
    }
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreatedEvent::class,

    ];
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
    public function accessibleProjects()
    {

        return Upload::where('user_id', $this->id)
            ->get();
    }
    public function userlatestRecords()
    {
        return Upload::latest('created_at')->where('user_id', $this->id)->first();
    }
    public function getallusers()
    {
        return User::with('roles')->get();
    }
    public function getAdmin()
    {
        return Role::where('name', 'admin')->firstOrFail();
    }
    public function currentUsersRole()
    {
        return Role::where('name', 'user')->firstOrFail();
    }
    public function currentAuthenticatedUser()
    {
        return auth()->user()->id;
    }
    public function selecteduser()
    {
        return User::where('id', $this->id)->firstOrFail();
    }
    public function getUsersRole()
    {
        return auth()->user()->roles->pluck('name');
    }



}

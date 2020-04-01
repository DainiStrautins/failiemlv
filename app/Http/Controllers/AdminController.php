<?php

namespace App\Http\Controllers;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = auth()->user()->getallusers();
        return view('admin', compact('users'));
    }
    public function update($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $adminRole =  auth()->user()->getAdmin();

        $user->roles()->attach($adminRole->id);

        $userRole = auth()->user()->currentUsersRole();
        $user->roles()->detach($userRole->id);

        return redirect('/admin');

    }
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $adminRole =  auth()->user()->getAdmin();

        $user->roles()->detach($adminRole->id);


        $userRole = auth()->user()->currentUsersRole();
        $user->roles()->attach($userRole->id);

        return redirect('/admin');
    }
    public function show($id)
    {
        if(auth()->user()->currentAuthenticatedUser() == $id )
        {
            return view('nopermission');
        }else{
            return view('DeleteAdmin' , [
                'users' => auth()->user()->selecteduser()
            ]);
        }
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/admin');
    }

    public function permisionDenied()
    {
        return view('nopermission');
    }
}

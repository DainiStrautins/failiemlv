<?php

namespace App\Http\Controllers;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = current_user()->getallusers();
        return view('admin', compact('users'));
    }
    public function show($id)
    {
        if(current_user()->id == $id )
        {
            return view('_nopermission');
        }else{
            return view('DeleteAdmin' , [
                'users' => User::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function update($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        if (current_user()->id !== $user->id)
        {
            $adminRole =  current_user()->getAdmin();
            $user->roles()->attach($adminRole->id);
            $userRole = current_user()->Role();
            $user->roles()->detach($userRole->id);
            return redirect('/admin');
        }
        return view('_nopermission');
    }
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        if (current_user()->id !== $user->id)
        {
            $adminRole = current_user()->getAdmin();
            $user->roles()->detach($adminRole->id);
            $userRole = current_user()->Role();
            $user->roles()->attach($userRole->id);
            return redirect('/admin');
        }
        return view('_nopermission');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/admin');
    }

    public function permisionDenied()
    {
        return view('_nopermission');
    }
}

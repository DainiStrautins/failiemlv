<?php

namespace App\Http\Controllers;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = current_user()->getallusers(); // Gets all users
        return view('admin', compact('users'));
    }
    public function show($id)
    {
        if(current_user()->id == $id ) // If current authenticated user is equal to selected user
        {
            return view('_nopermission');
        }else{
            return view('DeleteAdmin' , [ // Redirects to page with decision of deleting record or not
                'users' => User::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function update($userId)
    {
        $user = User::where('id', $userId)->firstOrFail(); // Gets submitted user
        if (current_user()->id !== $user->id) // Checks if current authenticated users id is not equal with Submitted user id
        {
            $adminRole =  current_user()->getAdmin(); // Gets admin Role
            $user->roles()->attach($adminRole->id); // Attaches admin role
            $userRole = current_user()->Role(); // Gets current role
            $user->roles()->detach($userRole->id); // Detaches current role
            return redirect('/admin');
        }
        return view('_nopermission');
    }
    public function destroy($userId)
    {
        $user = User::where('id', $userId)->firstOrFail(); // Gets submitted user
        if (current_user()->id !== $user->id) // Checks if current authenticated users id is not equal with Submitted user id
        {
            $userRoles = current_user()->roles->pluck('name'); // Gets user role
            if(!$userRoles->contains('admin')) // If user doesnt have admin role
            {
                return view('_nopermission');
            }else{
                $adminRole = current_user()->getAdmin(); // Gets admin role
                $user->roles()->detach($adminRole->id); // Detaches admin role
                $userRole = current_user()->Role(); // Gets "user" role
                $user->roles()->attach($userRole->id); // Attaches "user" role to user
                return redirect('/admin');
            }
        }
        return view('_nopermission');
    }
    public function delete($id)
    {
        User::find($id)->delete(); // Finds and deletes record
        return redirect('/admin');
    }

    public function permisionDenied()
    {
        return view('_nopermission');
    }
}

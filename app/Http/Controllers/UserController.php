<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function get(){
        $uploads = auth()->user()->accessibleProjects();
        $date = auth()->user()->userlatestRecords();
        $count = $uploads->count();
        $full_size = 0;
        foreach($uploads as $upload)
        {
            $full_size += $upload->size;
        }
        return view('/user', compact('uploads'))
            ->with(['date' =>$date])
            ->with(['count' =>$count])
            ->with(['full_size' =>$full_size]
            );
    }
    public function store(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file){
                $filename = $file->getClientOriginalName();

                $filesize = $file->getClientSize();

                $file->storeAs('/files/'.auth()->user()->name.'/'.auth()->user()->id.'/',$filename);
                $Upload = new Upload;
                $Upload->user_id = auth()->user()->id;
                $Upload->file = $filename;
                $Upload->size = $filesize;
                $Upload->save();

            }
            return redirect('/user');
        }
        return redirect('/');
    }

    public function deleteuser($id){
        $userRoles = auth()->user()->getUsersRole();
        $currentUser = auth()->user()->currentAuthenticatedUser();
        $uploadUser = Upload::where('id',$id)->value('user_id');
        if (($currentUser != $uploadUser) and (!$userRoles->contains('admin'))){
            return redirect('/permission-denied');
        } else{
            return view('DeleteSelectedUser' , [
                'upload' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function commituser($id){
        $path= Upload::find($id);
        $file = $path->file;
        $user_id = $path->user_id;
        $uploader = $path->uploader->name;
        Storage::delete('/files/'.$uploader.'/'.$user_id.'/'.$file);
        $path->delete();
        return redirect('/user');
    }
}

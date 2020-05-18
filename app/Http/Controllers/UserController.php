<?php

namespace App\Http\Controllers;

use App\User;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

        $uploads = current_user()->accessibleProjects();
        $date = current_user()->userlatestRecords();
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
            foreach ($request->file as $file) {
                $upload = Upload::where('user_id',auth()->user()->id)->where('file',$file->getClientOriginalName())->count('file');

                if ($upload >= 1)
                {
                    return view('_dashboard');
                }
                else{
                    foreach ($request->file as $file)
                    {
                        $filename = $file->getClientOriginalName();

                        $filesize = $file->getClientSize();

                        $file->storeAs('/files/'.current_user()->name.'/'.current_user()->id.'/',$filename);
                        $Upload = new Upload;
                        $Upload->user_id = current_user()->id;
                        $Upload->file = $filename;
                        $Upload->size = $filesize;
                        $Upload->save();

                    }
                    return redirect('/user');
                }
            }

        }
        return redirect('/');
    }
    public function deleteuser($id)
    {
        $userRoles = current_user()->getUsersRole();
        $currentUser = current_user()->id;
        $uploadUser = Upload::where('id',$id)->value('user_id');
        if (($currentUser != $uploadUser) and (!$userRoles->contains('admin')))
        {
            return view('_nopermission');
        } else{
            return view('DeleteSelectedUser' , [
                'upload' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function commituser($id)
    {
        $path= Upload::find($id);
        $file = $path->file;
        $user_id = $path->user_id;
        $uploader = $path->uploader;
        $path_to_file = '/files/'.$uploader->name.'/'.$user_id.'/'.$file;
        Storage::delete($path_to_file);
        $path->delete();
        return redirect('/user');
    }
    public function download($file)
    {
        $path= Upload::find($file);
        if (current_user()->id == $path->user_id)
        {
            $user = $path->file;

            return Storage::download('/files/'.auth()->user()->name.'/'.auth()->user()->id.'/'.$user);
        }
        return view('_nopermission');
    }
}

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

        $uploads = current_user()->accessibleProjects(); // Filters down what records belong for current user
        $date = current_user()->userlatestRecords(); // Gets latest record date
        $count = $uploads->count(); // Gets count of uploads
        $full_size = 0;
        foreach($uploads as $upload)
        {
            $full_size += $upload->size; // Combines size and displays it as storage capacity
        }
        return view('/user', compact('uploads'))
            ->with(['date' =>$date])
            ->with(['count' =>$count])
            ->with(['full_size' =>$full_size]
            );
    }
    public function store(request $request)
    {
        if ($request->hasFile('file')) // checks if request has file
        {
            foreach ($request->file as $file) { //  for each requested file do{...}
                $filename = $file->getClientOriginalName(); // Get file name with extension ("Image.png")
                $extension = $file->getClientOriginalExtension();
                $finalfilename =  str_replace(' ','_',str_replace($extension, '',preg_replace('/[^\p{L}\p{N}\s]/u', '',$filename)));
                $finalfilename .= ".".$extension;
                $upload = Upload::take(1)->where('user_id',auth()->user()->id)->where('file',$finalfilename)->count('file'); // get count of file duplicates
                if ($upload >= 1) // check if its more or equal than 1
                {
                    return view('_dashboard');
                }else{
                    foreach ($request->file as $file) // for each requested file do{...}
                    {
                        $filename = $file->getClientOriginalName(); // Get file name with extension ("Image.png")
                        $extension = $file->getClientOriginalExtension();
                        $finalfilename =  str_replace(' ','_',str_replace($extension, '',preg_replace('/[^\p{L}\p{N}\s]/u', '',$filename))); // image%@#1234 5png -> image1234 5png -> image1234 5 -> image1234_5
                        $finalfilename .= ".".$extension; // image1234_5 -> image1234_5.png
                        $filesize = $file->getClientSize(); // Get file size

                        $file->storeAs('/files/'.current_user()->name.'/'.current_user()->id.'/',$finalfilename); // Store image
                        $Upload = new Upload; // Creates new upload in database
                        $Upload->user_id = current_user()->id; // Assigns value to field
                        $Upload->file = $finalfilename; // Assigns value to field
                        $Upload->size = $filesize; // Assigns value to field
                        $Upload->save(); // Stores into database assigned values as array
                    }
                    return redirect('/user');
                }
            }

        }
        return redirect('/');
    }
    public function deleteuser($id)
    {
        $currentUser = current_user()->id; // Gets authenticated user
        $uploadUser = Upload::where('id',$id)->value('user_id'); // Gets Upload user id
        if (($currentUser == $uploadUser))
        {
            return view('DeleteSelectedUser' , [  // if false returns a view of page of deleting current record and by passing variables
                'upload' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }else{
            return view('_nopermission'); // If true returns to no permission page
        }
    }
    public function commituser($id)
    {
        $path = Upload::findOrFail($id); // finds record
        $currentUser = current_user()->id; // Gets authenticated user
        $uploadUser = Upload::where('id',$id)->value('user_id'); // Gets Upload user id
        if (($currentUser == $uploadUser)) {
            $file = $path->file; // gets file
            $user_id = $path->user_id; // gets user_id
            $uploader = $path->uploader; // gets uploader
            $path_to_file = '/files/' . $uploader->name . '/' . $user_id . '/' . $file;  // creates a variable with a path to file ('files/Dainis/1/Fanta.png')
            Storage::delete($path_to_file); // deletes the file
            $path->delete();  // Deletes everything that got assigned to path
            return redirect('/user'); // Redirects to page  user
        }else{
            return view('_nopermission'); // If true returns to no permission page
        }
    }
    public function download($file)
    {
        $path = Upload::findOrFail($file); // finds requested file if it doesnt file it throws 404
        if (current_user()->id == $path->user_id) // Checks if authenticated user
        {
            $user = $path->file; // $user variable assigned file

            return Storage::download('/files/'.auth()->user()->name.'/'.auth()->user()->id.'/'.$user);
        }
        return view('_nopermission');
    }
}

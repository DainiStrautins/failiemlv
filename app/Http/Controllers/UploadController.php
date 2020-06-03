<?php

namespace App\Http\Controllers;
use App\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    // show main page
    public function index()
    {
        return view('welcome'); // Returns a view of starting page
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
                        $finalfilename =  str_replace(' ','_',str_replace($extension, '',preg_replace('/[^\p{L}\p{N}\s]/u', '',$filename)));
                        $finalfilename .= ".".$extension;
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
    // ---------------------------------------------------------//
    public function GetAllRecords()
    {
        $uploads = Upload::get(); // Gets all records (all records, no filtering for users)
        $full_size = 0; // full size
        foreach($uploads as $upload) // for each upload do{...}
        {
            $full_size += $upload->size; // sums all size
        }
        $count = $uploads->count(); // Gets count of uploads
        return view('allrecords') // Returns view of admin view with variables
            ->with(['uploads'=>$uploads])
            ->with(['count' =>$count])
            ->with(['full_size' =>$full_size]
            );
    }
    public function delete($id)
    {
        $userRoles = current_user()->roles->pluck('name'); // Gets current user role
        if (!$userRoles->contains('admin')){ // If user inst admin
            return view('_nopermission');
        }else{
            return view('deleteselected' , [ // If he is admin, he gets redirected to page where he can commit to deleting/destroying this record
                'upload' => Upload::where('id', $id)->firstOrFail(), // Gets selected user
            ]);
        }
    }
    public function commit($id)
    {
        $uploads = Upload::find($id); // Selects from database selected record
        Storage::delete('/files/'.$uploads->uploader->name.'/'.$uploads->user_id.'/'.$uploads->file); // Deletes this user file
        Upload::find($id)->delete(); // Deletes record from database
        return redirect('/allrecords');
    }
}

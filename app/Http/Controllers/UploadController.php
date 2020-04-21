<?php

namespace App\Http\Controllers;
use App\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // add authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show main page
    public function index()
    {
        return view('welcome');
    }
    public function store(request $request)
    {
        if ($request->hasFile('file'))
        {
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
            return redirect('/');
        }
        return redirect('/');
    }
    // ---------------------------------------------------------//
    public function GetAllRecords()
    {
        $uploads = Upload::get();
        $full_size = 0;
        foreach($uploads as $upload)
        {
            $full_size += $upload->size;
        }
        $count = $uploads->count();
        return view('allrecords')
            ->with(['uploads'=>$uploads])
            ->with(['count' =>$count])
            ->with(['full_size' =>$full_size]
            );
    }
    public function storeadmin(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file)
            {
                $filename = $file->getClientOriginalName();
                $filesize = $file->getClientSize();
                $Upload = new Upload;
                $file->storeAs('/files/'.current_user()->name.'/'.current_user()->id.'/',$filename);
                $Upload->user_id= current_user()->id;
                $Upload->file = $filename;
                $Upload->size = $filesize;
                $Upload->save();
            }
            return redirect('/allrecords');
        }
        return redirect('/');
    }
    public function delete($id)
    {
        $userRoles = current_user()->roles->pluck('name');
        if (!$userRoles->contains('admin')){
            return view('_nopermission');
        }else{
            return view('deleteselected' , [
                'offer' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function commit($id)
    {
        $uploads = Upload::find($id);
        Storage::delete('/files/'.$uploads->uploader->name.'/'.$uploads->user_id.'/'.$uploads->file);
        Upload::find($id)->delete();
        return redirect('/allrecords');
    }
}

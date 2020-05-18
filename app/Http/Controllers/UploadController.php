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
        return view('welcome');
    }
    public function store(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file) {
                $upload = Upload::take(1)->where('user_id',auth()->user()->id)->where('file',$file->getClientOriginalName())->count('file');

                if ($upload >= 1)
                    {
                        return view('_dashboard');
                    }else{
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
    public function delete($id)
    {
        $userRoles = current_user()->roles->pluck('name');
        if (!$userRoles->contains('admin')){
            return view('_nopermission');
        }else{
            return view('deleteselected' , [
                'upload' => Upload::where('id', $id)->firstOrFail(),
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

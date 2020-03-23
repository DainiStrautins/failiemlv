<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       $count = count(auth()->user()->unreadNotifications);
        return view('main',compact('count'));
    }
    public function show()
    {
        $count = count(auth()->user()->unreadNotifications);
        return $count;
    }
    public function store(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file){
                $filename = $file->getClientOriginalName();

                $filesize = $file->getClientSize();
                //dd($filename);  123.jpg

                $file->storeAs('/files',$filename);
                $Upload = new Upload;
                $Upload->user_id = auth()->user()->id;
                $Upload->file = $filename;
                $Upload->size = $filesize;
                $Upload->save();


            }
            return redirect('/user');
        }
    }

}

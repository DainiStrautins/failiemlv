<?php

namespace App\Http\Controllers;
use App\Upload;
use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

    public function store(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file){
                $filename = $file->getClientOriginalName();

                $filesize = $file->getClientSize();

                $fileextension = $file->getClientOriginalExtension();

                $file->storeAs('public/files',$filename);
                $Upload = new Upload;
                $Upload->user_id= auth()->user()->id;
                $Upload->file = $filename;
                $Upload->size = $filesize;
                $Upload->save();

            }
            return redirect('/user');
        }
    }
    public function storeadmin(request $request)
    {
        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file){
                $filename = $file->getClientOriginalName();

                $filesize = $file->getClientSize();

                $fileextension = $file->getClientOriginalExtension();

                $file->storeAs('public/files',$filename);
                $Upload = new Upload;
                $Upload->user_id= auth()->user()->id;
                $Upload->file = $filename;
                $Upload->size = $filesize;
                $Upload->save();

            }
            return redirect('/allrecords');
        }
    }
    public function get(){
        $user_id = auth()->id();
        $uploads=Upload::where('user_id','=', $user_id)->get();
            return view('user')->with(['uploads'=>$uploads]);
    }
    public function GetAllRecords(){
        $uploads=  Upload::get();
            return view('allrecords')->with(['uploads'=>$uploads]);

    }
    public function GetDetails(){
        $uploads=  Upload::get();
        return view('sidebar')->with(['uploads'=>$uploads]);

    }

    public function delete($id){
        $userRoles = Auth::user()->roles->pluck('name');
        if (!$userRoles->contains('admin')){
            return redirect('/permission-denied');
        }else{
            return view('deleteselected' , [
                'offer' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }

    }
    public function commit($id){
        Upload::find($id)->delete();
        return redirect('/allrecords');
    }
    public function deleteuser($id){
    return view('DeleteSelectedUser' , [
        'offer' => Upload::where('id', $id)->firstOrFail(),
    ]);
    }
    public function commituser($id){
        Upload::find($id)->delete();
        return redirect('/user');
    }

    public function getDate(){
        return Upload::latest('created_at')->first();
    }
}

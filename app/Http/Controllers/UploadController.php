<?php

namespace App\Http\Controllers;
use App\Upload;
use Auth;
use App\User;
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
            foreach ($request->file as $file){
                $filename = $file->getClientOriginalName();

                $filesize = $file->getClientSize();
                //dd($filename);  123.jpg

                $file->storeAs('/files',$filename);
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
                $Upload = new Upload;
                $file->storeAs('/files',$filename);
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
        $full_size = 0;
        foreach($uploads as $upload)
        {
            $full_size += $upload->size;
        }
        $date = Upload::where('user_id','=', $user_id)->latest('created_at')->first();
        $date = Upload::latest('created_at')->first();

        $count = $uploads->count();
        return view('/user')
            ->with(['uploads'=>$uploads])
            ->with(['date' =>$date])
            ->with(['count' =>$count])
            ->with(['full_size' =>$full_size]
            );
    }
    public function GetAllRecords(){
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
        $userRoles = Auth::user()->roles->pluck('name');
        $currentuser = Auth::user()->id;
        $uploaduser = Upload::where('id',$id)->value('user_id');
        if (($currentuser != $uploaduser) and (!$userRoles->contains('admin'))){
                return redirect('/permission-denied');
        } else{
            return view('DeleteSelectedUser' , [
                'offer' => Upload::where('id', $id)->firstOrFail(),
            ]);
        }
    }
    public function commituser($id){
        Upload::find($id)->delete();
        return redirect('/user');
    }
    public function AdminDelete($id){
        User::find($id)->delete();
        return redirect('/admin');
    }
    public function indexAdminDelete($id){
        if(Auth::user()->id == $id)
        {
            return view('nopermission');
        }else{
            return view('DeleteAdmin' , [
                'users' => User::where('id', $id)->firstOrFail(),
            ]);
        }
    }
}

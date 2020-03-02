@extends('layouts.body')
@section('inside')
    <h3>Admins page!</h3>
    <div class="row">
        @foreach($users as $user)
            <div class="col-lg-4 col-xs-12">
                <div class="card my-2 mx-2" >
                    <div class="card-body">
                        @if ($user->id != Auth::user()->id)
                            <div class="top-right">
                                <a class="text-danger top-right" href="admin/delete/{{ $user->id }}"><i class="fa fa-minus-square" aria-hidden="true"></i> </a>
                            </div>
                            <h5 class="card-title text-muted">  {{$user->name}}
                                @else
                                    <h5 class="card-title">   <b>You</b>
                                        @endif
                                        @foreach($user->roles as $role)
                                            <small class="text-muted">({{$role->name}})</small>
                                        <p><small class="text-muted">{{$user->email}}</small></p>
                                        @endforeach
                                    </h5>
                            </h5>
                    </div>
                    <div class="py-2 px-4">
                        @if ($user->id != Auth::user()->id)
                            @if ($user->hasRole('admin'))
                                <a  class="btn btn-danger btn-sm col-lg" href="/admin/remove-admin/{{$user->id}}">
                                    Remove Admin
                                </a>
                            @else
                                <a  class="btn btn-success btn-sm col-lg" href="/admin/give-admin/{{$user->id}}">
                                    Give Admin
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

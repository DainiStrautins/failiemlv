@extends('layouts.form')

@section('body')
    <div class="card-body">
        <h3 class="title text-primary">RESET PASSWORD</h3>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group row mt-md-4 mt-xs-3 px-3">
                <div class="col-md-12">
                    <label>E-Mail Address</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row my-4">
                <div class="col-md-10 mx-auto">
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.form')

@section('body')
    <div class="card-body">
        <h3 class="title text-primary">REGISTER ACCOUNT</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row mt-md-4 mt-xs-3 px-3">
                <div class="col-md-12">
                    <label>NAME</label>
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row px-3">
                <div class="col-md-12">
                    <label>EMAIL</label>
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row px-3">
                <div class="col-md-12">
                    <label>PASSWORD</label>
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>


                </div>
            </div>
            <div class="form-group row px-3">
                <div class="col-md-12">
                    <label>CONFIRM PASSWORD</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>
            <div class="form-group row my-4">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
            <div class="form-group row mb-4">
                <div class="col-lg-12 mt-3">
                    <div class="form-check text-center">
                        <span>Already have an account? </span><a class="btn-link" href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

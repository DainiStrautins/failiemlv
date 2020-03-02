@extends('layouts.form')
@section('body')
    <div class="card-body">
        <h3 class="title text-primary">ACCOUNT LOGIN</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row mt-lg-4 px-3">
                <div class="col-md-12 mt-3">
                    <label>EMAIL</label>
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        </div>
                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="form-group row  px-3">
                <div class="col-md-12">
                    <label>PASSWORD</label>
                    <div class="input-group  mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                        </div>
                        <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12 mt-3">
                    <div class="form-check float-left">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="form-check float-right">
                        @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-md-10 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
            <div class="form-group row mb-4">
                <div class="col-lg-12 mt-3">
                    <div class="form-check text-center">
                        <span>Are you new? </span><a class="btn-link" href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

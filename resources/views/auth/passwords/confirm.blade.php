@extends('layouts.form')
@section('body')
    <div class="card-body">
        <h3 class="title text-primary">{{ __('CONFIRM PASSWORD') }}</h3>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-group row mt-lg-4 px-3">
                <div class="col-md-12 mt-3">
                    <label>PASSWORD</label>
                    <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                        </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row mt-5 mb-4">
                <div class="col-md-10 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Confirm Password') }}
                    </button>
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-md-12 text-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection

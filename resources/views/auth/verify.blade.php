@extends('layouts.form')
@section('body')
    <div class="card-body">
        <h3 class="title text-primary">{{ __('Verify Your Email Address') }}</h3>
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        @if (session('resent'))
            <div class="text-success text-small my-2" role="alert">
                {{ __('Verification link sent!') }}
            </div>
        @endif

    </div>
@endsection

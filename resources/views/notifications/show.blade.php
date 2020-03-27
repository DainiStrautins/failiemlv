@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @forelse($notifications as $notification)
                <div class="col-lg-3 col-md-4 col-sm-6 my-3 mx-lg-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                @if ($notification->type === "App\Notifications\PaymentReceived")
                                    We have received a payment of ${{$notification->data['amount']}} from you. 😎
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">    {{$notification->created_at }}</small>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="card border-dark m-3" style="max-width: 18rem;">
                        <div class="card-header">Notification</div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">Sorry!</h5>
                            <p class="card-text">You do not have any records. 😔</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
@endsection

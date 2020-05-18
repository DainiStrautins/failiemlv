@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @forelse($notifications as $notification)
                <div class="col-lg-3 border-dark col-md-4 col-sm-6 my-3 mx-lg-auto">
                    <div class="card border-dark">
                        <div class="card-body">
                            <h5 class="card-title">Notification</h5>
                            <p class="card-text">
                                    @if ($notification->type === "App\Notifications\SubscriptionMade")
                                        @if($notification->data == "1")
                                            Your subscription is Basic. 😎
                                        @endif
                                        @if($notification->data == "2")
                                            Your subscription is Business. 😎
                                        @endif
                                        @if($notification->data == "3")
                                            Your subscription is Pro. 😎
                                        @endif
                                        @if($notification->data == "4")
                                            Your subscription is Premium. 😎
                                        @endif
                                        @if($notification->data == "5")
                                            Your subscription is Enterprise. 😎
                                        @endif
                                    @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">    {{$notification->created_at }}</small>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="card border-dark m-3 mx-lg-auto" style="max-width: 18rem;">
                        <div class="card-header">Notification</div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">Sorry!</h5>
                            <p class="card-text">You don't have any notifications</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
@endsection

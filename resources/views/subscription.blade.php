@extends('layouts.app')
@section('content')
        @forelse($users->subscriptions as $subscription)
            <div class="container">
                <div style="margin-top:25%">
                    <div class="d-flex justify-content-center text-center">
                        <h1>Your subscription type: {{$subscription->name}}</h1>
                    </div>
                    <div class="d-flex justify-content-center text-center">
                        @forelse($currentUserSubscription as $currentUser)
                            <h1>Purchased {{$currentUser->created_at->diffForHumans()}}</h1>
                        @empty

                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center text-center">
                        <a  class="btn btn-primary btn-lg" href="/subscription/remove-subscription/{{current_user()->id}}">
                            Remove Subscription
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="pt-2">
                <div class="col text-center mb-3">
                    <div class="btn-group mt-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item mr-2">
                                <a type="button" data-toggle="pill" class="btn btn-lg btn-outline-success" onclick="Subscription" href="#Subscription">
                                    Subscriptions
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="Subscription" class="container tab-pane">
                        <div class="flex-wrap d-flex justify-content-around">
                            @forelse($subscriptions as $subscription)
                                <div class="col-lg-6 col-md-6 my-4">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" style="min-height: 15rem" data-toggle="modal" data-target="#modalConfirmPayment{{$subscription->name}}">
                                        <h3 class="card-header">{{$subscription->name}}</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="text-primary">{{$subscription->price}}</span></h5>
                                            <h5 class="card-title"><span class="text-dark">{{$subscription->body}}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                No records
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        <form method="POST" action="/subscription">
            @csrf
            @forelse($subscriptions as $subscription)
                <div class="modal fade" id="modalConfirmPayment{{$subscription->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                        <div class="modal-content text-center">
                            <div class="modal-header">{{$subscription->name}}</div>
                            <div class="modal-footer flex-center">
                                <button  class="btn btn-primary btn-block" name="user" value="{{$subscription->id}}">
                                    Make payment
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            No subscriptions!
            @endforelse
        </form>
        @error('user')
        <span class="text-danger d-flex justify-content-center text-center mt-4" role="alert">
                    <strong>Can't duplicate subscription!👮‍♂️</strong>
                </span>
        @enderror
        <script>
            function Subscription() {
                var element = document.getElementById("Subscription");
                element.classList.add("active");
            }
        </script>
@endsection

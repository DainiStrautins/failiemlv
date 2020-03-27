@extends('layouts.app')
@section('content')
    <script src="https://kit.fontawesome.com/0482598c95.js" crossorigin="anonymous"></script>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="col text-center mb-5 pt-2">
                <h1 class="text-dark">Pricing</h1>
                <p class="text-dark pt-1">Sign up in less than 30 seconds, try out a 7-day free trial, upgrade at any time, no questions, no hassle.</p>
                <div class="btn-group mt-3">
                    <ul class="nav nav-pills">
                        <li class="nav-item mr-2">
                            <a type="button" data-toggle="pill" class="btn btn-lg btn-outline-success" href="#Monthly">Monthly</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a type="button" data-toggle="pill" class="btn btn-lg btn-outline-primary"  href="#Annually">Annually</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="Monthly" class="container tab-pane active">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 ml-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Basic</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">Free</h5>
                                        <p class="card-text">10 users included</p>
                                        <p class="card-text">2 GB of storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mx-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Business</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">$10 / mo</h5>
                                        <p class="card-text">Unlimited users</p>
                                        <p class="card-text">1 TB of storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mr-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Pro</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">$20 / mo</h5>
                                        <p class="card-text">Unlimited users</p>
                                        <p class="card-text">Unlimited storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Annually" class="container tab-pane">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 ml-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Basic</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">Free</h5>
                                        <p class="card-text">10 users included</p>
                                        <p class="card-text">2 GB of storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mx-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Business</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">$99 / yearly</h5>
                                        <p class="card-text">Unlimited users</p>
                                        <p class="card-text">1 TB of storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mr-auto">
                                <div class="card shadow-lg rounded text-center">
                                    <h4 class="card-header">Pro</h4>
                                    <div class="card-body">
                                        <h5 class="card-title">$200 / yearly</h5>
                                        <p class="card-text">Unlimited users</p>
                                        <p class="card-text">Unlimited storage</p>
                                        <p class="card-text">Email support</p>
                                        <button class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#modalConfirmPayment">Make payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalConfirmPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <div class="modal-content text-center">
                <div class="modal-header d-flex justify-content-center">
                    <p class="text-white">Are you ready to make your payment?</p>
                </div>
                <form method="POST" action="/subscription">
                    @csrf
                <div class="modal-footer flex-center">

                        <button  class="btn btn-outline-success btn-block">
                            Make payment
                        </button>

                    <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">No</button>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
        <div class="jumbotron jumbotron-fluid my-0 pt-2">
            <div class="container">
                <div class="col text-center mb-5">
                    <div class="btn-group mt-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item mr-2">
                                <a type="button" data-toggle="pill" class="btn btn-lg btn-outline-success" onclick="Monthly" href="#Monthly">Monthly</a>
                            </li>
                            <li class="nav-item ml-2">
                                <a type="button" data-toggle="pill" class="btn btn-lg btn-outline-primary" onclick="Annually"  href="#Annually">Annually</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="Monthly" class="container tab-pane">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 mb-3 ml-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentBasic">
                                        <h3 class="card-header">Basic</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">Free</span></h5>
                                            <p class="card-text">10 users included</p>
                                            <p class="card-text">2 GB of storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3 mx-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentMonthlyBusiness">
                                        <h3 class="card-header">Business</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">$10</span> / mo</h5>
                                            <p class="card-text">Unlimited users</p>
                                            <p class="card-text">1 TB of storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3 mr-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentMonthlyPro">
                                        <h3 class="card-header">Pro</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">$20</span> / mo</h5>
                                            <p class="card-text">Unlimited users</p>
                                            <p class="card-text">Unlimited storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Annually" class="container tab-pane">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 mb-3 ml-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentBasic">
                                        <h3 class="card-header">Basic</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">Free</span></h5>
                                            <p class="card-text">10 users included</p>
                                            <p class="card-text">2 GB of storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3 mx-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentAnnuallyBusiness">
                                        <h3 class="card-header">Enterprise</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">$99</span> / yearly</h5>
                                            <p class="card-text">Unlimited users</p>
                                            <p class="card-text">1 TB of storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3 mr-auto">
                                    <div class="card shadow-lg rounded text-center border-dark pointer" data-toggle="modal" data-target="#modalConfirmPaymentAnnuallyPro">
                                        <h3 class="card-header">Premium</h3>
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="h1">$200</span> / yearly</h5>
                                            <p class="card-text">Unlimited users</p>
                                            <p class="card-text">Unlimited storage</p>
                                            <p class="card-text">Email support</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <form method="POST" action="/subscription">
        @csrf
        @include('modals.index')
    </form>
        <script>
            function Monthly() {
                var element = document.getElementById("Monthly");
                element.classList.add("active");
            }
            function Annually() {
                var element = document.getElementById("Annually");
                element.classList.add("active");
            }
        </script>
@endsection

@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/setteing-membership.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/account-preferences.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/address-book.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/additional-names.css')}}">
@endsection
@section('content')
    <div class="setteing-top-nav">
        <ul class="nav">
            <li class="active" onclick="window.location='{{url('account/membership')}}'">Account Membership</li>
            <li onclick="window.location='{{url('account/preferences')}}'">Account Preferences</li>
            <li onclick="window.location='{{url('account/address')}}'">Address Book</li>
            <li onclick="window.location='{{url('account/names')}}'">Additional Names</li>
            <li onclick="window.location='{{url('account/wallet')}}'">Your Virtual Wallet</li>
        </ul>
    </div>

    <div class="set-content">
        <h2>Account Membership</h2>
        <div class="rows">
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Current Membership Type</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <p>{{Auth::guard('user')->user()->membership->name}} MemberShip <a href="">Change</a></p>
                </div>
            </div>
            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Your current billing cycle</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    @if(Auth::guard('user')->user()->membership->price ==0)
                        <p>Free Membership (No Billing)</p>
                    @else
                        <p>{{Auth::guard('user')->user()->membership->price}}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Membership Fee</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    @if(Auth::guard('user')->user()->membership->price ==0)
                        <p>Free</p>
                    @else
                        <p>{{Auth::guard('user')->user()->membership->price}}</p>
                    @endif
                </div>
            </div>
            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Storage Space</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                            <span><strong>40%</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="set-content">
        <h2>Account Deposit</h2>
        <div class="rows">
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Remaining Balance	   </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <p>{{Auth::guard('user')->user()->balance}}</p>
                </div>
            </div>
            <div class="row non">
                <div class="col-md-4 col-sm left-col">
                </div>
                <div class="col-md-8 col-sm-10 right-col">
                    <div class="inner-uls">
                        <ul class="inner-ul">
                            <li style="width: 25%"> Add Deposit</li>
                            <li style="width: 25%">Request a Refund</li>
                            <li style="width: 39%" class="width">View Transaction History</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="set-content">
        <h2>Contact Information</h2>
        <div class="rows">
            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Name</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <p>{{Auth::guard('user')->user()->first_name .' '. Auth::guard('user')->user()->second_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Email</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <p>{{Auth::guard('user')->user()->email}}</p>
                </div>
            </div>
            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Country</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <p>{{Auth::guard('user')->user()->country}}</p>
                </div>
            </div>
            <div class="row non">
                <div class="col-md-4 col-sm left-col">
                </div>
                <div class="col-md-8 col-sm-10 right-col">
                    <div class="inner-uls">
                        <ul class="inner-ul inner-ul2">
                            <li style="width: 39%" class="width">Change Contact Information</li>
                            <li style="width: 25%">Change Email</li>
                            <li style="width: 25%">Change Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
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
            <li onclick="window.location='{{url('account/membership')}}'">Account Membership</li>
            <li onclick="window.location='{{url('account/preferences')}}'">Account Preferences</li>
            <li class="active" onclick="window.location='{{url('account/address')}}'">Address Book</li>
            <li onclick="window.location='{{url('account/names')}}'">Additional Names</li>
            <li onclick="window.location='{{url('account/wallet')}}'">Your Virtual Wallet</li>
        </ul>
    </div>

    <div class="set-content">
        <h2>Your Erthship Addresses</h2>

        <div class="row cards">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">California</div>
                    <div class="card-body">
                        <h5 class="card-title"><strong>Mai I. Abu Muaileq</strong></h5>
                        <p class="card-text">
                            3501 Jack Northrop Ave<br>
                            Suite #AFW696<br>
                            Hawthorne, CA 90250 <br>
                            USA
                        </p>
                        <div class="mrT">
                            <form>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="opacity: 0; margin-left: -47px" value="option1">
                                <label class="form-check-label active" for="inlineCheckbox1">Set As Default Erthship Address</label>
                            </form>
                        </div>
                        <p class="card-text2">
                            Lowest shipping rates and fastest shipping time.<br> Short term storage.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Europe</div>
                    <div class="card-body">
                        <h5 class="card-title"><strong>Mai I. Abu Muaileq</strong></h5>
                        <p class="card-text">
                            3501 Jack Northrop Ave<br>
                            Suite #AFW696<br>
                            Hawthorne, CA 90250 <br>
                            USA
                        </p>
                        <div class="mrT">
                            <form>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="opacity: 0; margin-left: -47px" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Set As Default Erthship Address</label>
                            </form>
                        </div>
                        <p class="card-text2">
                            European warehouse offering consolidations and special requests.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Upgrade Now</div>
                    <div class="card-body">
                        <p class="card-text text">
                            Premium Members can consolidate packages to save money on shipping.
                        </p>
                        <div class="card-btn">
                            <button type="button" class="btn btn-primary">Upgrade Now</button>
                        </div>
                        <img src="img/prices-img2.png" class="card-img img-responsive">
                        <p class="card-text2">
                            Consolidation is a service reserved exclusively for Premium Members.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-address">
            <p>
                If you are still not sure which warehouse to choose, checkout the location guide.
            </p>
            <h4>
                <strong>Your Shipping and Billing Addresses</strong>
            </h4>
            <div class="card-btn">
                <button type="button" class="btn btn-primary"> Add New Address</button>
            </div>
        </div>
    </div>


@endsection
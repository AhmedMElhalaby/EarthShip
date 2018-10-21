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
            <li class="active" onclick="window.location='{{url('account/preferences')}}'">Account Preferences</li>
            <li onclick="window.location='{{url('account/address')}}'">Address Book</li>
            <li onclick="window.location='{{url('account/names')}}'">Additional Names</li>
            <li onclick="window.location='{{url('account/wallet')}}'">Your Virtual Wallet</li>
        </ul>
    </div>

    <div class="set-content">
        <h2>NOTIFICATION PREFERENCES</h2>
        <div class="rows">
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Receive Shipito Marketing Emails/Newsletter</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox" onchange="Email_news()" @if(Auth::guard('user')->user()->email_news) checked @endif>
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col" >
                    <p style="margin-top: 10px;">Preferred Language for Notifications</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col selection">
                    <select name="" id="" class="select form-control warehouses ">
                        <option value="" selected> English</option>
                        <option value="">Arabic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="set-content">
        <h2>INCOMING PACKAGE PREFERENCES</h2>
        <div class="rows">
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Three Exterior Package Photos (Free) </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox" onchange="package_photo()" @if(Auth::guard('user')->user()->package_photo) checked @endif>
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Package content photo request($1.00) </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox" onchange="content_photo()" @if(Auth::guard('user')->user()->content_photo) checked @endif>
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Package detailed content photo request($2.50)</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox" onchange="detailed_photo()" @if(Auth::guard('user')->user()->detailed_photo) checked @endif>
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Open package and fill customs declaration($5.00)</p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox"  onchange="open_package()" @if(Auth::guard('user')->user()->open_package) checked @endif>
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 left-col">
                    <p>Other Instructions($5.00) </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col">
                    <div class="onoffswitch">
                        <label class="switch">
                            <input type="checkbox">
                            <div class="slider round">
                                <span class="on">YES</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="set-content">
        <h2>MAGAZINES/LETTERS</h2>
        <div class="rows">
            <div class="row">
                <div class="col-md-4 col-sm-4 left-col" >
                    <p style="margin-top: 10px;">What would you like us to do with magazines that come in your name? </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col selection">
                    <select name="" id="" class="select form-control warehouses ">
                        <option value="" selected> Discard</option>
                        <option value="">option</option>
                    </select>
                </div>
            </div>

            <div class="row bg">
                <div class="col-md-4 col-sm-4 left-col" >
                    <p style="margin-top: 10px;">What would you like us to do with letters that come in your name? </p>
                </div>
                <div class="col-md-8 col-sm-8 right-col selection">
                    <select name="" id="" class="select form-control warehouses ">
                        <option value="" selected> Discard</option>
                        <option value="">option</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
       function Email_news(){
           $.ajax({
               url: "{{ url('account/email_news') }}",
               type: 'get',
               dataType: 'json',
               async: true,
               cache: true,
               contentType: false,
               processData: false

           });
       }
       function package_photo(){
           $.ajax({
               url: "{{ url('account/package_photo') }}",
               type: 'get',
               dataType: 'json',
               async: true,
               cache: true,
               contentType: false,
               processData: false

           });
       }
       function content_photo(){
           $.ajax({
               url: "{{ url('account/content_photo') }}",
               type: 'get',
               dataType: 'json',
               async: true,
               cache: true,
               contentType: false,
               processData: false

           });
       }
       function detailed_photo(){
           $.ajax({
               url: "{{ url('account/detailed_photo') }}",
               type: 'get',
               dataType: 'json',
               async: true,
               cache: true,
               contentType: false,
               processData: false

           });
       }
       function open_package(){
           $.ajax({
               url: "{{ url('account/open_package') }}",
               type: 'get',
               dataType: 'json',
               async: true,
               cache: true,
               contentType: false,
               processData: false

           });
       }
    </script>
@endsection
@extends('layout.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}">
@endsection
@section('content')
    <!-- start of first section -->
    <section >
        <div class="container-flauid ">
            <div class="login-form vm-form2">
                <div class="login-form-title v-form">
                    <h3>Your Email has been verified!</h3>
                    <div class="v-icon2">
                        <i class="fa fa-check-circle-o"></i>
                    </div>
                </div>
                <div class="login-form-content v-form-content2">
                    <h4>
                        You can log now into your new Earthship account.
                    </h4>
                    <div class="v-address">
                        <h4> Your new Earthship address is : </h4>
                        <p>
                            {{$user->first_name .' '. $user->second_name}} ,<br>
                            {{$user->defaultAddress->suite}} ,<br>
                            {{$user->defaultAddress->address}} ,<br>
                            {{$user->defaultAddress->city}} , {{$user->defaultAddress->country_id}}  {{$user->defaultAddress->post_code}}  ,<br>
                            {{$user->defaultAddress->state}}
                        </p>
                    </div>
                    <button type="button" onclick="window.location='{{url('login')}}'" class="btn btn-primary">login</button>
                </div>
            </div>
            <div class="Copyright">
                <p>Copyright © Erthship 2018. All rights reserved</p>
            </div>
        </div>

    </section>
    <!-- end of first section -->

@endsection

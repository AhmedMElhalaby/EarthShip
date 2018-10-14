@extends('layout.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}">
@endsection
@section('content')
    <!-- start of first section -->
    <section id="">
        <div class="container-flauid ">
            <div class="login-form vm-form">
                <div class="login-form-title v-form">
                    <h3>Thank you for signing up!</h3>
                    <div class="v-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                </div>
                <div class="login-form-content v-form-content">
                    <p>
                        An email has been sent to <span>
                       {{ $email }}


                        </span> <br>with a link to verify yout account.
                    </p>
                </div>
            </div>
            <div class="Copyright">
                <p>Copyright © Erthship 2018. All rights reserved</p>
            </div>
        </div>

    </section>
    <!-- end of first section -->

@endsection
@section('script')

@endsection
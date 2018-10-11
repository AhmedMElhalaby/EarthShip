
@extends('layout.app')
@section('content')
<section id="login-pg">
    <div class="container-flauid ">
        <div class="login-form">
            <div class="login-form-title">
                <h3>Login</h3>
            </div>
            <div class="login-form-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label><br>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label><br>
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" id="login" class="btn btn-primary">login</button>

                    <div class="links">
                        <a class="forget" href="{{ url('/password/reset') }}">Forgot Password? </a>
                        <p>Don't have an account? <a class="forget" href="{{url('/register')}}">Sign-Up now</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="Copyright">
            <p>Copyright © Erthship 2018. All rights reserved</p>
        </div>
    </div>
</section>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}">
@endsection

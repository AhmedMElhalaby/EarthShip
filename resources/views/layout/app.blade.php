<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EARTHSHIP</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/slick.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"  >
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.eng.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
    
    <!-- custome style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/price-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/pricre-responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/prohibited-and-limited.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/prohibited-and-limited-responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/style.css')}} ">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/calculator.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/home/css/how-it-work.css')}}">

    @yield('style')

</head>
<body>
<!--==================== Header section =============================-->
<header>
    <div class="top">
        <div class="container">
            <div class="left">
                <p class="cal">
                    <span><i class="fa fa-calculator"></i></span>
                    Shipping Calculator
                </p>
            </div>
            <div class="right">
                <ul>
                    <li class="dropdown">
                        <!-- <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true"><img src="img/united-states.png" alt=""> Ship to <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/">English</a></li>
                            <li><a href="/">العربية</a></li>
                        </ul> -->
                        <form action="">
                            <img src="{{asset('public/home/img/united-states.png')}}" alt="">
                            <select name="" id="">
                                <option value="" selected hidden>Ship to</option>
                                <option value="">America</option>
                                <option value="">Palestine</option>
                                <option value="">Egypt</option>
                                <option value="">Egypt</option>
                                <option value="">Egypt</option>
                                <option value="">Jordan</option>
                            </select>
                            <!-- <i class="fa fa-caret-down"></i> -->
                        </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" ><img src="{{asset('public/home/img/worldwide.png')}}" alt=""> English  <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="">English</a></li>
                            <li><a href="">العربية</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="logo left">
                <a href="{{url('/')}}">
                    <img src="{{asset('public/home/img/logo.png')}}" alt="">
                </a>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="{{url('services-prices')}}">Services & Prices</a>
                    </li>
                    <li>
                    <a href="{{url('how-it-work')}}">How it works</a>
                    </li>
                    @if(!Auth::guard('user')->check())
                    <li class="login">
                        <button onclick="window.location='{{url('login')}}'" class="btn">Login</button>
                    </li>
                    <li class="sign">
                        <button onclick="window.location='{{url('register')}}'" class="btn">sign up</button>
                    </li>
                    @else
                    <li class="login">
                        <button onclick="window.location='{{url('dashboard')}}'" class="btn">Dashboard</button>
                    </li>
                    <li class="sign">
                        <button  class="btn" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                            Logout
                        </button>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
@yield('content')
<!--======================== Java Script File =======================-->
<script type="text/javascript" src="{{asset('public/home/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/wow.min.js')}}"></script>
<!-- slick slider -->
<!-- Custom js-->
<script src="{{asset('public/home/js/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/home/js/scrolling-nav.js')}}"></script>
<script src="{{asset('public/home/js/slick.min.js')}}"></script>
<script src="{{asset('public/home/js/custom.js')}}"></script>
@yield('script')
</body>
</html>
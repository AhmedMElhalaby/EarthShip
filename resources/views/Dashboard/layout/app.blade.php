<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>EarthShip - Admin Panel</title>
    <style>
        .closebtn {
            margin-left: 15px;
            color: black;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: white;
        }
        
        #loader{
            transition:all .3s ease-in-out;
            opacity:1;visibility:visible;
            position:fixed;
            height:100vh;
            width:100%;
            background:#fff;
            z-index:90000
        }
        #loader.fadeOut{
            opacity:0;
            visibility:hidden;
        }
        .spinner{
            width:40px;
            height:40px;
            position:absolute;
            top:calc(50% - 20px);
            left:calc(50% - 20px);
            background-color:#333;
            border-radius:100%;
            -webkit-animation:sk-scaleout 1s infinite ease-in-out;
            animation:sk-scaleout 1s infinite ease-in-out;
        }
        @-webkit-keyframes sk-scaleout{
            0%{-webkit-transform:scale(0)}
            100%{-webkit-transform:scale(1);opacity:0}
        }
        @keyframes sk-scaleout{
            0%{
                -webkit-transform:scale(0);
                transform:scale(0)
            }
            100%{
                -webkit-transform:scale(1);
                transform:scale(1);
                opacity:0;
            }
        }
        #myBtn {
            position: fixed; /* Fixed/sticky position */
            bottom: 80px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color:#0C9;
            color:#FFF;
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 20px; /* Some padding */
            width:60px;
            height:60px;
            border-radius: 50%; /* Rounded corners */
            font-size: 18px; /* Increase font size */
        }

        #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
        }
    </style>
    <link href="{{asset('public/dashboard/main/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/styles/vendor/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/main/supportReplies.css')}}" rel="stylesheet">
</head>
<body class="app">
<div id="loader">
    <div class="spinner">

    </div>
</div>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>
<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="{{url('/')}}">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="{{asset('public/dashboard/static/images/logo.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">EarthShip</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 active">
                    <a class="sidebar-link" href="{{url('admin')}}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/settings-categories')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-settings"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/admins')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Admins</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/users/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/addresses/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-world"></i>
                        </span>
                        <span class="title">Addresses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/countries/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-world"></i>
                        </span>
                        <span class="title">Countries</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/features/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-star"></i>
                        </span>
                        <span class="title">Features</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/services/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-view-list"></i>
                        </span>
                        <span class="title">Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/support/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-support"></i>
                        </span>
                        <span class="title">Support</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/memberships/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-user"></i>
                        </span>
                        <span class="title">Memberships</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/payment-methods/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-credit-card"></i>
                        </span>
                        <span class="title">Payment Methods</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/shipping-methods/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-money"></i>
                        </span>
                        <span class="title">Shipping Methods</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{{url('admin/faq-category/')}}">
                        <span class="icon-holder">
                            <i class="c-brown-500 ti-help"></i>
                        </span>
                        <span class="title">FAQ</span>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="compose.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-blue-500 ti-share"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Compose</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="calendar.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-deep-orange-500 ti-calendar"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Calendar</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="chat.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-deep-purple-500 ti-comment-alt"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Chat</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="charts.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-indigo-500 ti-bar-chart"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Charts</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="sidebar-link" href="forms.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-light-blue-500 ti-pencil"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Forms</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="sidebar-link" href="ui.html">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-pink-500 ti-palette"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">UI Elements</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="c-orange-500 ti-layout-list-thumb"></i>
                        </span>
                        <span class="title">Tables</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="basic-table.html">Basic Table</a>
                        </li>
                        <li>
                            <a class="sidebar-link" href="datatable.html">Data Table</a>
                        </li>
                    </ul>
                </li>
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="dropdown-toggle" href="javascript:void(0);">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-red-500 ti-files"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Pages</span>--}}
                        {{--<span class="arrow">--}}
                            {{--<i class="ti-angle-right"></i>--}}
                        {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li>--}}
                            {{--<a class="sidebar-link" href="blank.html">Blank</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="sidebar-link" href="404.html">404</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="sidebar-link" href="500.html">500</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="sidebar-link" href="signin.html">Sign In</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="sidebar-link" href="signup.html">Sign Up</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="dropdown-toggle" href="javascript:void(0);">--}}
                        {{--<span class="icon-holder">--}}
                            {{--<i class="c-teal-500 ti-view-list-alt"></i>--}}
                        {{--</span>--}}
                        {{--<span class="title">Multiple Levels</span>--}}
                        {{--<span class="arrow">--}}
                            {{--<i class="ti-angle-right"></i>--}}
                        {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="javascript:void(0);">--}}
                                {{--<span>Menu Item</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="javascript:void(0);">--}}
                                {{--<span>Menu Item</span>--}}
                                {{--<span class="arrow">--}}
                                    {{--<i class="ti-angle-right"></i>--}}
                                {{--</span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">Menu Item</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">Menu Item</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li>
                        <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="search-box">
                        <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                            <i class="search-icon ti-search pdd-right-10"></i>
                            <i class="search-icon-close ti-close pdd-right-10"></i>
                        </a>
                    </li>
                    <li class="search-input">
                        <input class="form-control" type="text" placeholder="Search...">
                    </li>
                </ul>
                <ul class="nav-right">

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                            <div class="peer mR-10">
                                <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
                            </div>
                            <div class="peer">
                                <span class="fsz-sm c-grey-900">{{Auth::guard('admin')->user()->name}}</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">
                            {{--<li>--}}
                                {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                                    {{--<i class="ti-settings mR-10"></i>--}}
                                    {{--<span>Setting</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                                    {{--<i class="ti-user mR-10"></i>--}}
                                    {{--<span>Profile</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                                    {{--<i class="ti-email mR-10"></i>--}}
                                    {{--<span>Messages</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">

                                    <i class="ti-power-off mR-10"></i>
                                    <span>Logout</span>
                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>





        @yield('content')
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>
                Copyright © 2017 Designed by
                <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a>
                . All rights reserved.
            </span>
        </footer>
    </div>
</div>

<script type="text/javascript" src="{{asset('public/dashboard/main/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('public/dashboard/main/bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.alert').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
    });
</script>

</body>
</html>
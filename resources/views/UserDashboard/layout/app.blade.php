<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EARTHSHIP</title>

    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/home/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/Dashbord.css')}}">


    @yield('style')


</head>
<body>
<!-- start of header section  -->
<div class="header">
    <div class="logo">
        <div class=" inline main-UL col-md-6">
            <ul>
                <li><i class="fa fa-cog"></i></li>
                <li class="active"><i class="fa fa-bell"></i></li>
                <li><i class="fa fa-sign-out"></i></li>
            </ul>
        </div>
    </div>
    <a href="#" class="nav-trigger"><span></span></a>

    <div class="header-content">
        <div class="acc-balance col-md-5 col-sm-12">
            <div class="text inline">
                <p>
                    <strong>ACCOUNT BALANCE</strong><br>
                    Remaining Deposit:&emsp;<span>$0.00</span><br>
                    <span class="span">Total Amount Due:</span>&emsp;<span>$0.00</span>
                </p>
            </div>
            <div class="btn inline">
                <button type="button" class="btn btn-primary">Add Deposit</button>
            </div>
        </div>
        <div class="toRight col-md-7">
            <div class="search search-top  inline col-md-6">
                <a href="" title=""><i class="fa fa-search"></i></a>
                <input type="text" class="ii" name="" placeholder="Search">
            </div>
            <div class=" inline main-UL col-md-6 none">
                <a href="{{url('account/membership')}}"><i class="fa fa-cog @if(URL::current() == url('account/membership') || URL::current() == url('account/preferences') || URL::current() ==url('account/address')|| URL::current() == url('account/names')|| URL::current() == url('account/wallet')) active @endif"></i></a>
                {{--<ul id="simple-account-dropdown-freebie">--}}
                    {{--<li>--}}
                        {{--<div id="simple-account-dropdown">--}}
                            {{--<div class="account">--}}
                                {{--<i class="fa fa-bell"></i>--}}
                            {{--</div>--}}
                            {{--<div class="dropdown" style="display: none">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#">You have a request to draft</a></li>--}}
                                    {{--<li><a href="#">You have a contract review request</a></li>--}}
                                    {{--<li><a href="#">You have a payment due</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of header section  -->

<!-- start of side-nav section  -->
<div class="side-nav">
    <div class="logo">
        <img src="{{asset('public/home/img/logo.png')}}">
    </div>
    <nav>
        <ul>
            {{--<li class="active">--}}
            <li @if(URL::current() == url('dashboard')) class="active" @endif>
                <a href="{{url('dashboard')}}">
                    <span><img src="{{asset('public/home/img/daskbord-img-1.png')}}"></span>
                    <span>Packages in Warehouse</span>
                </a>
            </li>
            <li @if(URL::current() == url('sent-packages')) class="active" @endif>
                <a href="{{url('sent-packages')}}">

                    <span><img src="{{asset('public/home/img/daskbord-img-2.png')}}"></span>
                    <span>Sent Packages</span>
                </a>
            </li>
            <li @if(URL::current() == url('expected-packages')) class="active" @endif>
                <a href="{{url('expected-packages')}}">
                    <span><img src="{{asset('public/home/img/daskbord-img-3.png')}}"></span>
                    <span>Expected Packages</span>
                </a>
            </li>
            <li @if(URL::current() == url('assisted-purchase')) class="active" @endif>
                <a href="{{url('assisted-purchase')}}">
                    <span><img src="{{asset('public/home/img/daskbord-img-4.png')}}"></span>
                    <span>Assisted Purchase</span>
                </a>
            </li>
            <li @if(URL::current() == url('support-ticket')) class="active" @endif>
                <a href="{{url('support-ticket')}}" >
                    <span><img src="{{asset('public/home/img/daskbord-img-5.png')}}"></span>
                    <span>support-tickets</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span><img src="{{asset('public/home/img/daskbord-img-6.png')}}"></span>
                    <span>Invoices</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span><img src="{{asset('public/home/img/daskbord-img-4.png')}}"></span>
                    <span>Prohibited Categories</span>
                </a>
            </li>
        </ul>
        <div class="address">
            <p>
                <strong>YOUR US ADDRESS</strong><br>
                <br>ahmed alasqlany
                <br>3501 Jack Northrop Ave
                <br>Suite #AFW696
                <br>Hawthorne, CA 90250
                <br>USA
            </p>
            <div class="btn1">
                <button type="button" class="btn btn-primary">View All</button>
            </div>
        </div>
    </nav>
</div>
<!-- end of side-nav section  -->

<!-- start of main-content section  -->
<div class="main-content">
    @yield('content')
</div>

<!-- end of main-content section  -->

<!-- start of footer section  -->
<footer>
    <div class="container">
        <div class="footer-lists ">
            <div class="col-md-3 col-sm-3 footer-logo">
                <img src="{{asset('public/home/img/logo.png')}}" alt="">
                <div class="social">
                    <ul>
                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>ERTHSHIP NEWSLETTER</h3>
                <p>
                    Subscribe to our newsletter and receive important updates and news about Erthship.
                </p>
                <div class="btn1 footer-btn">
                    <button type="button" class="btn btn-primary">Subscribe to Newsletter</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 help">
                <h3>HELP</h3>
                <ul>
                    <li><a href="">Services & Prices</a></li>
                    <li><a href="">How Shipito Works</a></li>
                    <li><a href="">Questions and Answers</a></li>
                    <li><a href="">Tutorials</a></li>
                    <li><a href="">Erthship Calculator</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>CONTACT US</h3>
                <ul>
                    <li>United States Customer Service</li>
                    <li>T: + 1 (310) 349-1172</li>
                    <li>T: + 1 (310) 349-1182</li>
                    <li>7am to 5pm Monday to Friday</li>
                    <li>text@text.com</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer section  -->

<!-- ******** JS ********  -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="{{asset('public/home/js/bootstrap.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="{{asset('public/home/js/main.js')}}"></script>
<script src="{{asset('public/home/js/custom.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#simple-account-dropdown > .account").click(function(){
            // $('#simple-account-dropdown  > .dropdown').removeClass("active");
            // $('#simple-account-dropdown  > .dropdown').css("display",'none');
            $(this).siblings('.dropdown').fadeToggle("fast", function(){
                if($(this).css('display') == "none")
                    $(this).removeClass("active");
                else
                    $(this).addClass("active");
            });
        });
    })
</script>
@yield('script')

</body>
</html>
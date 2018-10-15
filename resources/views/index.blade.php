@extends('layout.app')
@section('content')
    <!--==================== Slider Section =============================-->
    <div id="slider"> <!-- wrap @img width -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner vertical" role="listbox">
                <div class="item active">
                    <div class="overlay"></div>
                    <img src="{{asset('public/home/img/slider.png')}}" alt="">
                    <div class="carousel-caption">
                        <h2>
                            <p>Buy what you want</p>
                            <p>We'll ship it to you</p>
                        </h2>
                    </div>
                </div>
                <div class="item ">
                    <img src="{{asset('public/home/img/slider.png')}}" alt="">
                    <div class="carousel-caption">
                        <h2>
                            <p>Buy what you want</p>
                            <p>We'll ship it to you</p>
                        </h2>
                    </div>
                </div>
                <div class="item ">
                    <img src="{{asset('public/home/img/slider.png')}}" alt="">
                    <div class="carousel-caption">
                        <h2>
                            <p>Buy what you want</p>
                            <p>We'll ship it to you</p>
                        </h2>
                    </div>
                </div>
                <div class="item ">
                    <img src="{{asset('public/home/img/slider.png')}}" alt="">
                    <div class="carousel-caption">
                        <h2>
                            <p>Buy what you want</p>
                            <p>We'll ship it to you</p>
                        </h2>
                    </div>
                </div>
                <div class="item ">
                    <img src="{{asset('public/home/img/slider.png')}}" alt="">
                    <div class="carousel-caption">
                        <h2>
                            <p>Buy what you want</p>
                            <p>We'll ship it to you</p>
                        </h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 350.86,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div> -->

    <!--==================== How-to-work Section =============================-->

    <section id="How-to-work">
        <h1>How we work</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-cont">
                        <img src="{{asset('public/home/img/IMG1.png')}}" alt="">
                        <h3>1. Sign up and get your EARTHSHIP U.S. Address</h3>
                        <p>This will be your own personal address in the USA. No signup or setup fees.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-cont">
                        <img src="{{asset('public/home/img/IMG2.png')}}" alt="">
                        <h3>2. Shop in any U.S. Store and ship it to your new U.S. address</h3>
                        <p>TUse your Shipito U.S. address as your delivery address at checkout.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-cont">
                        <img src="{{asset('public/home/img/IMG3.png')}}" alt="">
                        <h3>3. Combine your packages and save money</h3>
                        <p>Shop on multiple websites, combine the packages into one box and save up to 80% on shipping.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================== feature Section =============================-->

    <section id="feature">
        <div class="container">
            <hr>
            <h2>Our Feature</h2>
        </div>
        <div class="">
            <img class="left" src="{{asset('public/home/img/vector.png')}}" style="margin:30px 0 0 30px;width:17%" alt="">

            <div class="right" style="width:80%">
                <div class="blog_content">

                    <!-- BEGAIN BLOG SLIDER -->
                    <div class="blog_slider">
                        <!-- BEGAIN SINGLE BLOG -->
                        <div class="col-lg-4 col-md-4 col-sm-4 single">
                            <div class="single_post wow fadeInUp">
                                <div class="grid" >
                                    <img src="{{asset('public/home/img/icon-1.png')}}" alt="">
                                    <h3>Earthship Competitive Pricing</h3>
                                    <p>We offer the best competitive prices to save you on shipping rates.</p>
                                </div>
                            </div>
                        </div>
                        <!-- BEGAIN SINGLE BLOG -->
                        <div class="col-lg-4 col-md-4 col-sm-4 single">
                            <div class="single_post wow fadeInUp">
                                <div class="grid" >
                                    <img src="{{asset('public/home/img/icon-2.png')}}" alt="">
                                    <h3>International Delivery</h3>
                                    <p>We offer one of the best shipping solutions for international shipping</p>
                                </div>
                            </div>
                        </div>
                        <!-- BEGAIN SINGLE BLOG -->

                        <!-- BEGAIN SINGLE BLOG -->
                        <div class="col-lg-4 col-md-4 col-sm-4 single">
                            <div class="single_post wow fadeInUp">
                                <div class="grid" >
                                    <img src="{{asset('public/home/img/icon.png')}}" alt="">
                                    <h3>Secure Payment Methods</h3>
                                    <p>Pay with peace of mind with our Safe Pay systems</p>
                                </div>
                            </div>
                        </div>
                        <!-- BEGAIN SINGLE BLOG -->
                        <div class="col-lg-4 col-md-4 col-sm-4 single">
                            <div class="single_post wow fadeInUp">
                                <div class="grid" >
                                    <img src="{{asset('public/home/img/icon.png')}}" alt="">
                                    <h3>Secure Payment Methods</h3>
                                    <p>Pay with peace of mind with our Safe Pay systems</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="brands">
        <div class="container">
            <hr>
            <h2>Shipping brands</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius blanditiis ullam facilis maxime delectus, officia eveniet omnis tenetur quisquam quidem</p>
        </div>
        <div class="brands">
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand18.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand17.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand16.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand15.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand14.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand13.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand12.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand11.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand10.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand9.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand8.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand7.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand6.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand5.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand4.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand3.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand2.PNG')}}" alt="">
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="helper"></div>
                <img src="{{asset('public/home/img/brands/brand.PNG')}}" alt="">
            </div>
        </div>
    </section>
@include('layout.footer')
@endsection
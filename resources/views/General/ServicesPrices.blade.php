@extends('layout.app')
@section('content')
	<!-- start of first section -->
	<section id="Erthship-Prices">
            <div class="container-flauid">
                <div class="box1">
                    <h2> Earthship Prices </h2>
                </div>
            </div>
        </section>
        <!-- end of first section -->
    
        <!-- start of second section -->
        <section id="cards">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="general-card card1">
                            <div class="top">
                                <h3>Standard</h3>
                                <h1>FREE</h1>
                            </div>
                            <div class="description">
                                <p>
                                    for people who want to try<br> Shipito for as long as they like 
                                </p>
                                <h3>Standard includes:</h3>
                                <ul>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Your own U.S. Address</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Your own E.U. Address</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;3 free photos of each package</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Save up to 80% on shipping</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Free storage up to 180 days</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Multiple shipping options for each country</li>
                                    <li class="false"><i class="fa fa-times-circle"></i>&ensp;Tax-free shipping in the U.S.*</li>
                                    <li class="false"><i class="fa fa-times-circle"></i>&ensp;Combine your packages for more savings*</li>
                                    <li class="false"><i class="fa fa-times-circle"></i>&ensp;Multi-package shipments</li>
                                </ul>
                                <div class="sign">
                                    <button href="" class="btn">sign up free</button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="general-card card2">
                            <div class="top">
                                <h3>Premium</h3>
                                <h1><sup>$</sup>10<span>/ month</span></h1>
                            </div>
                            <div class="description padding">
                                <h3>Premium includes:</h3>
                                <ul>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Your own U.S. Address</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Your own E.U. Address</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;3 free photos of each package</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Save up to 80% on shipping</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Free storage up to 180 days</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Multiple shipping options for each country</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Tax-free shipping in the U.S.*</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Combine your packages for more savings*</li>
                                    <li class="true"><i class="fa fa-check-circle"></i>&ensp;Multi-package shipments</li>
                                </ul>
                                <div class="sign">
                                    <button href="" class="btn">Become Premium</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of second section -->
    
        <!-- start of third section -->
        <section id="options">
            <div class="container">
                <div class="row">
                    @foreach ($Services as $item)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="" style="margin-bottom:50px">
                            <div class="option-img">
                                <img src="{{asset($item->image)}}" height="100" width="auto">
                            </div>
                            <div class="option-title">
                                <h3>{{$item->name}} <span class="text-danger">{{$item->price}} </span></h3>
                            </div>
                            <div class="option-desc" style="padding-right:45px;">
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>                   
            </div>
        </section>
        <!-- end of third section -->
@include('layout.footer')
@endsection
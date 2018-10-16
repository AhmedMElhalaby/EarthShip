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
                    @foreach ($memberships as $membership)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="general-card card1">
                                <div class="top">
                                    <h3>{{$membership->name}}</h3>
                                    <h1>{{$membership->price}}</h1>
                                </div>
                                <div class="description">
                                    <p>
                                        for people who want to try<br> Shipito for as long as they like 
                                    </p>
                                    <h3>{{$membership->name}} includes:</h3>
                                    <ul>
                                        @foreach ($membership->features as $item)
                                        <li class="true"><i class="fa fa-check-circle"></i>&ensp;{{$item->feature->name}}</li>
                                        @endforeach
                                    </ul>
                                    <div class="sign">
                                        <button href="{{url('how-it-work')}} " class="btn">sign up free</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
@extends('UserDashboard.layout.app')
@section('content')
    <div class="title">
        <h3>Handpicked for You</h3>
        <p>Check out these great shopping deals selected for you. Use your Shipito mailbox as your mailing address when you shop at your favorite online retailers in the US.</p>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="cards">
                    @foreach($Product as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img class="card-img-top" src="{{asset($item->image)}}" alt="Card image cap">
                            <div class="card-body">
                                <div class="left" style="font-size: 11px; width: 50%">
                                    <p class="card-text">{{$item->name}}</p>
                                </div>
                                <div class="right"  style="font-size: 14px; width: 50%">
                                    <p class="card-text"><strong> US  ${{$item->price}}</strong><br>
                                    </p>

                                </div>
                                <div class="row left">
                                    <div class="col-lg-12">
                                        <div class="star-rating">
                                            <span class="fa fa-star-o" data-rating="1"></span>
                                            <span class="fa fa-star-o" data-rating="2"></span>
                                            <span class="fa fa-star-o" data-rating="3"></span>
                                            <span class="fa fa-star-o" data-rating="4"></span>
                                            <span class="fa fa-star-o" data-rating="5"></span>
                                            <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <a href="{{url($item->url)}}" class="btn bttn btn-primary">Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
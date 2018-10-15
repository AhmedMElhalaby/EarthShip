@extends('layout.app')
@section('content')
	<!-- start of first section -->
	<section id="limited-guidelines">
            <div class="box1">
                <h2> Prohibited And Limited Shipping Guidelines </h2>
            </div>
            <div class="circles">
                <img src="{{asset('public/home/img/limited-circle.png')}}" alt="">
            </div>
        </section>
        <!-- end of first section -->
    
        <!-- start of second section -->
        <section id="detalis">
            <div class="container">
                <div class="Paragraphs">
                    <p>
                        Below is a guide to many of the items that have shipping restrictions. Please review this list carefully before shopping to verify that you'll be able to receive the items you are purchasing.
                    </p>
                    <p>
                        Please note that this list is not comprehensive and that restrictions are constantly changing. We'll do our best to update this page as we receive notices from our carriers but ultimately you are responsible for ensuring that the items you purchase comply with all government and carrier restrictions.
                    </p>
                </div>
                <div class="limited-items-title">
                        <h4>Prohibited and Limited Items</h4>
                    </div>
                    <div class="limited-items-sub-title">
                        <h4>Prohibited Categories</h4>
                    </div>
                    <div class="limited-items-desc">
                        <p>Shipito does not ship the following items to any location</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of second section -->
        
        <!-- start of third section -->
        <section id="limited-items">
            <div class="container">
                <div class="limited-items-box-content">
                    <div class="limited-items-icons">
                        @foreach ($ProhibitedCategories as $item)
                            <div class="col-md-2">
                                <img src="{{$item->image}}"><br>
                                <p> {{$item->name}}</p>
                            </div> 
                        @endforeach
                    </div>
                </div>
            </div>
        </section>	
        <!-- end of third section -->
    
        <!-- start of fourth section -->
        <section id="Country-specific">
            <div class="container">
                <div class="Country-specific-box">
                    <p>
                        Country-specific restrictions
                        <br><br>
                        Laws vary by country. Select the country to which you wish to ship items to learn what is not allowed. Each LIMITED icon has examples of the products that can fall under that category. Tap the icon to see product examples. If you have any concerns about your product please contact Support@shipito.com before you make your purchase.
                    </p>
                    <div class="selection">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/prohibition-search-result')}}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                        <input type="hidden" name="action" value="search"/>
                                        <select name="country_id" class="form-control" id="country_id" name="country_id" value="{{ old('country_id') }}" onchange="this.form.submit()">
                                            @foreach($Countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country_id') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of fourth section -->
    
        <!-- start of Fifth section -->
        <section id="limited">
            <div class="container">
                <div class="row">
                    <div class="limited-items-box">
                        <a href="#collapes-details{{$item->id}}">
                            @foreach ($limitedItems as $item)
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="itme-info" id="item1">
                                        <a href="#collapes-details{{$item->id}}" data-toggle="collapse" aria-expanded="true" aria-controls="collapes-details{{$item->id}}"><img src="{{$item->prohibitedItem->category->image}}" width="75" height="75"></a>
                                        <h3>{{$item->prohibitedItem->category->name}}<br><br><span>{{$item->prohibitedItem->name}}</span></h3>
                                    </div>
                                </div> 
                            @endforeach 
                        </a>
                    </div>
                </div>
                
                @foreach ($limitedItems as $item)
                <div id="collapes-details{{$item->id}}" class="collapse coll" aria-labelledby="item" data-parent="#limited">
                    <div class="collapes-content-box">
                        <h3>{{$item->prohibitedItem->category->name}}</h3>
                        <a href="#collapes-details{{$item->id}}" data-toggle="collapse">X</a>
                        <div class="sub-details">
                            <p> {{$item->prohibitedItem->category->details}} </p>
                            <h4> Examples </h4>
                            <p>
                                &emsp; &emsp; &emsp; {{$item->prohibitedItem->name}} - {{$item->prohibitedItem->details}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </section>
        <!-- end of Fifth section -->
    
    @include('layout.footer')
@endsection
<footer>
    <div class="container">
        <div class="footer-lists ">
            <div class="col-md-3 col-sm-3 footer-logo">
                <img src="{{asset('public/home/img/logo.png')}}" alt="">
            </div>
            <div class="col-md-9 col-sm-9">
                @foreach ($settings as $item)
                    @if ($item->id==2)
                    <div class="col-md-3 col-sm-3">
                        <h3>{{$item->name}}</h3>
                        <ul>
                          @foreach($item->settings as $data)
                            <li>{{$data->value}}</li>
                          @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($item->id==3)
                    <div class="col-md-3 col-sm-3">
                        <h3>{{$item->name}}</h3>
                        <ul>
                          @foreach($item->settings as $data)
                            <li><a href="{{$data->value}}">{{$data->name}}</a></li>
                          @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($item->id==4)
                    <div class="col-md-3 col-sm-3">
                        <h3>{{$item->name}}</h3>
                        <ul>
                          @foreach($item->settings as $data)
                            <li><a href="{{$data->value}}">{{$data->name}}</a></li>
                          @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($item->id==5)
                    <div class="col-md-3 col-sm-3">
                        <h3>{{$item->name}}</h3>
                        <ul>
                          @foreach($item->settings as $data)
                            <li><a href="{{$data->value}}">{{$data->name}}</a></li>
                          @endforeach
                        </ul>
                    </div>
                    @endif
                 @endforeach
            </div>
        </div>
        <div class="delivery">
            <h4>Delivery Services</h4>
            <div class="col-md-9 col-sm-8 col-xs-8">
                @foreach ($settings as $item)
                    @if ($item->name=='Delivery Services')
                        @foreach($item->settings as $data)
                        <img src="{{$data->value}}" alt="{{$data->name}}">
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4">
                <div class="social">
                    <ul>
                        @foreach ($settings as $item)
                               @if ($item->name=='Socail Media')
                                   @foreach($item->settings as $data)
                                   <li><a href="{{$data->value}}"><i class="fa fa-{{$data->name}}"></i></a></li>
                                   @endforeach
                               @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy">
            <div class="col-md-9 col-sm-8 col-xs-8">
                <p>Copyright © 2018 Earthship. All rights reserved.</p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4">
                <div class="privacy">
                    <a href="">Privacy Policy </a>|<a href=""> Terms and Conditions </a>
                </div>
            </div>
        </div>
    </div>
</footer>
@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">
                                Reply For / [ <span class="text-primary">{{$Support->subject}}  </span> ] 
                                <a href="{{url('admin/support')}}" role="button" class="btn btn-info pull-right"> <span class="ti ti-control-backward"> </span> </a>
                            </h4>
                            <center>
                                <div class="col-md-10">
                                    <div class="chat-menu">
                                        <div class="back"><i class="fa fa-chevron-left"></i> <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                                        <div class="name">{{$Support->user->first_name}} {{$Support->user->second_name}}</div>
                                    </div>
                                    <ol class="chat">
                                        <li class="other">
                                            <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                                            <div class="msg">
                                                <img src=" {{asset($Support->attachment)}} " width="250" height="300" />
                                                <p class="text-success">{{$Support->supportType->type}}</p>
                                                <p class="text-muted">{{$Support->detail}}</p>
                                                <time>{{$Support->created_at}}</time>
                                            </div>
                                        </li>
                                        @foreach($Support->replies as $item)
                                            @if($item->sender_type ==1)
                                                <li class="self">
                                                    <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
                                                    <div class="msg">
                                                        <p>{{$item->details}}</p>
                                                        <time>{{$item->created_at}}</time>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="other">
                                                    <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                                                    <div class="msg">
                                                        <p>{{$item->details}}</p>
                                                        <time>{{$item->created_at}}</time>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/support-reply/postAdd') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="support_id" value="{{$Support->id}}">
                                        <input type="hidden" name="sender_id" value="{{Auth::guard('admin')->user()->id}}">
                                        <input type="hidden" name="sender_type" value="1">
                                        <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }} has-feedback">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            <input class="textarea" type="text" id="details" name="details" value="{{ old('details') }}"placeholder="Type Reply here!"/>
                                            @if ($errors->has('details'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('details') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right"> Reply </button>
                                    </form>
                                        
                                </div>
                            </center>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </main>
   

@endsection
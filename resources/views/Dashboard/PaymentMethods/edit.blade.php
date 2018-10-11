@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit PaymentMethod </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/payment-method/postEdit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$PaymentMethod->id}}">
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" id="type" name="type"  value="{{ $PaymentMethod->type  }}">
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                    <label for="client_id">Client ID</label>
                                    <input type="text" class="form-control" id="client_id" name="client_id"  value="{{ $PaymentMethod->client_id  }}">
                                    @if ($errors->has('client_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"  value="">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/payment-methods')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
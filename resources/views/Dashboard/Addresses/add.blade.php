@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Add Address</h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/address/postAdd') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"  value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('suite') ? ' has-error' : '' }}">
                                    <label for="suite">Suite</label>
                                    <input type="text" class="form-control" id="suite" name="suite"  value="{{ old('suite') }}">
                                    @if ($errors->has('suite'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('suite') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city">city</label>
                                    <input type="text" class="form-control" id="city" name="city"  value="{{ old('city') }}">
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state">state</label>
                                    <input type="text" class="form-control" id="state" name="state"  value="{{ old('state') }}">
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                                    <label for="post_code">post code</label>
                                    <input type="text" class="form-control" id="post_code" name="post_code"  value="{{ old('post_code') }}">
                                    @if ($errors->has('post_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" class="form-control" id="country_id" name="country_id" value="{{ old('country_id') }}">
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                                    <label for="permission">permission</label>
                                    <select name="permission" class="form-control" id="permission" name="permission" value="{{ old('permission') }}">
                                        <option value="1">Yes </option>
                                        <option value="2">No </option>
                                    </select>
                                    @if ($errors->has('permission'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('permission') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/addresses')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
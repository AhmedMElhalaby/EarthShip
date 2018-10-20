@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Add User</h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/postAdd') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"  value="{{ old('first_name') }}">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                                    <label for="second_name">Last Name</label>
                                    <input type="text" class="form-control" id="second_name" name="second_name"  value="{{ old('second_name') }}">
                                    @if ($errors->has('second_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('second_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required  value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
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
                                <div class="form-group{{ $errors->has('membership_id') ? ' has-error' : '' }}">
                                    <label for="membership_id">MemberShip</label>
                                    <select name="membership_id" class="form-control" id="membership_id" name="membership_id" value="{{ old('membership_id') }}">
                                        @foreach($memberships as $membership)
                                            <option value="{{$membership->id}}">{{$membership->name}} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('membership_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('membership_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"  value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2"  value="{{ old('address2') }}">
                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city"  value="{{ old('city') }}">
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state"  value="{{ old('state') }}">
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"  value="{{ old('postal_code') }}">
                                    @if ($errors->has('postal_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
                                    <label for="country_code">Country Code</label>
                                    <input type="text" class="form-control" id="country_code" name="country_code"  value="{{ old('postal_code') }}">
                                    @if ($errors->has('country_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"  value="{{ old('postal_code') }}">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('package_photo') ? ' has-error' : '' }}">
                                    <label for="package_photo">Package Photo</label>
                                    <select name="package_photo" class="form-control" id="package_photo" name="package_photo" value="{{ old('package_photo') }}">
                                        <option value="1">Yes </option>
                                        <option value="2">No </option>
                                    </select>
                                    @if ($errors->has('package_photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('package_photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('content_photo') ? ' has-error' : '' }}">
                                    <label for="content_photo">Content Photo</label>
                                    <select name="content_photo" class="form-control" id="content_photo" name="content_photo" value="{{ old('content_photo') }}">
                                        <option value="1">Yes </option>
                                        <option value="2">No </option>
                                    </select>
                                    @if ($errors->has('content_photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('detailed_photo') ? ' has-error' : '' }}">
                                    <label for="detailed_photo">Detailed Photo</label>
                                    <select name="detailed_photo" class="form-control" id="detailed_photo" name="detailed_photo" value="{{ old('detailed_photo') }}">
                                        <option value="1">Yes </option>
                                        <option value="2">No </option>
                                    </select>
                                    @if ($errors->has('detailed_photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('detailed_photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('open_package') ? ' has-error' : '' }}">
                                    <label for="open_package">Open Package </label>
                                    <select name="open_package" class="form-control" id="open_package" name="open_package" value="{{ old('open_package') }}">
                                        <option value="1">Yes </option>
                                        <option value="2">No </option>
                                    </select>
                                    @if ($errors->has('open_package'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('open_package') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('other_instruction') ? ' has-error' : '' }}">
                                    <label for="other_instruction">Other Instruction</label>
                                    <input type="text" class="form-control" id="other_instruction" name="other_instruction"  value="{{ old('second_name') }}">
                                    @if ($errors->has('other_instruction'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('other_instruction') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('default_address_id') ? ' has-error' : '' }}">
                                    <label for="default_address_id">Address</label>
                                    <select name="default_address_id" class="form-control" id="default_address_id" name="default_address_id" value="{{ old('default_address_id') }}">
                                        @foreach($defaultAddresses as $defaultAddresse)
                                            <option value="{{$defaultAddresse->id}}">{{$defaultAddresse->address}} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('default_address_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('default_address_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                                    <label for="balance">Balance</label>
                                    <input type="number" class="form-control" id="balance" name="balance"  value="{{ old('balance') }}">
                                    @if ($errors->has('balance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/users')}}" role="button" class="btn btn-danger"> Cancel </a> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
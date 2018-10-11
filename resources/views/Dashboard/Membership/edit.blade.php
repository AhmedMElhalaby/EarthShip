@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Membership </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/membership/postEdit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$Membership->id}}"> 
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  value="{{ $Membership->name }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"  value="{{ $Membership->price }}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('billed') ? ' has-error' : '' }}">
                                    <label for="price">Billed</label>
                                    <select name="billed" class="form-control" id="billed" name="billed" value="{{ $Membership->billed  }}">
                                        <option value="Monthly" {{ ($Membership->billed == 1) ? 'selected' : '' }} >Monthly </option>
                                        <option value="Yearly" {{ ($Membership->billed == 0) ? 'selected' : '' }}>Yearly </option>
                                    </select>
                                    @if ($errors->has('billed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('billed') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/memberships')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
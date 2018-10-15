@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Add Setting</h6>
                        <div class="info-note">
                            <p class="info-note-p"><strong>Be Careful!</strong> If Your setting Value is an image  : <br/>
                                1. Save Image in [ <span class="text-danger"> public\app-images\settings  </span>] , if settings folder not found create it. <br/>
                                2. Save Setting Value as [ public\app-images\settings\<span class="text-danger">Your image</span> ] .
                            </p>
                        </div>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/setting/postAdd') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                    <label for="value">value</label>
                                    <input type="text" class="form-control" id="value" name="value"  value="{{ old('value') }}">
                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('value') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="category_id" value="{{$id}}"/>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href='{{url("admin/settings-category/$id")}}' role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Sub Step - How It Work </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/howItWork-subStep/postEdit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="parent_step" value="{{$mainStep}}">
                                <input type="hidden" name="id" value="{{$HowItWorkSubStep->id}}">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"  value="{{ $HowItWorkSubStep->title  }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"  value="{{ $HowItWorkSubStep->description  }}">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <!-- <img src="/Earthship/{{$HowItWorkSubStep->image}}"  width="70" height="70"/> -->
                                    <input type="file" class="form-control" id="image" name="image"  value="{{ $HowItWorkSubStep->image  }}">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href='{{url("admin/howItWork-subSteps/$mainStep")}}' role="button" class="btn btn-danger"> Cancel </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
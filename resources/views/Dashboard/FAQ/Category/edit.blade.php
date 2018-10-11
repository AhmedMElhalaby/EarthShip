@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit FAQ Category </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/faq-category/postEdit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$FAQCategory->id}}">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  value="{{ $FAQCategory->name  }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"  value="{{ $FAQCategory->description  }}">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <!-- <img src="/Earthship/{{$FAQCategory->image}}"  width="70" height="70"/> -->
                                    <input type="file" class="form-control" id="image" name="image"  value="{{ $FAQCategory->image  }}">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                    <label for="icon">Icon</label>
                                    <!-- <img src="/Earthship/{{$FAQCategory->icon}}"  width="70" height="70"/> -->
                                    <input type="file" class="form-control" id="icon" name="icon"  value="{{ $FAQCategory->icon  }}">
                                    @if ($errors->has('icon'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/faq-category')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
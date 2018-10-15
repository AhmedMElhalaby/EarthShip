@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Product </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/product/postEdit') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$Product->id}}">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  value="{{ $Product->name  }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                    <label for="url">url</label>
                                    <input type="text" class="form-control" id="url" name="url"  value="{{ $Product->url  }}">
                                    @if ($errors->has('url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="text">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"  value="{{ $Product->price  }}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control" id="image" name="image"  value="{{ $Product->image  }}">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                        <label for="text">Notes</label>
                                        <input type="text" class="form-control" id="notes" name="notes"  value="{{ $Product->notes  }}">
                                        @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/products')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
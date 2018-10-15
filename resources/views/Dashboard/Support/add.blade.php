@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Add Support </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/support/postAdd') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{Auth::guard('admin')->user()->id}}">
                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject"  value="{{ old('subject') }}">
                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                    <label for="detail">Detail</label>
                                    <input type="text" class="form-control" id="detail" name="detail"  value="{{ old('detail') }}">
                                    @if ($errors->has('detail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('detail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
                                    <label for="attachment">Attachment</label>
                                    <input type="file" class="form-control" id="attachment" name="attachment">
                                    @if ($errors->has('attachment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('attachment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type">Type</label> <br/>
                                    @foreach($SupportTypes as $SupportType)
                                        <input type="radio" name="type" value="{{$SupportType->id}}"> {{$SupportType->type}} <br/>
                                    @endforeach
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" name="status" value="{{ old('status') }}">
                                        <option value="1">Active </option>
                                        <option value="0">Closed </option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('close_date') ? ' has-error' : '' }}">
                                    <label for="close_date">Close Date</label>
                                    <input type="date" class="form-control" id="close_date" name="close_date"  value="{{ old('close_date') }}">
                                    @if ($errors->has('close_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('close_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/support')}}" role="button" class="btn btn-danger"> Cancel </a>                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
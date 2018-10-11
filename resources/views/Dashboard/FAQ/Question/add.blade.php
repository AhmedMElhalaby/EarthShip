@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Add FAQ Question</h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/faq-question/postAdd') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="question" name="question"  value="{{ old('question') }}">
                                    @if ($errors->has('question'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('question') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                    <label for="answer">Answer</label>
                                    <input type="text" class="form-control" id="answer" name="answer"  value="{{ old('answer') }}">
                                    @if ($errors->has('answer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('answer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="faq_category_id" value="{{$id}}"/>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href='{{url("admin/faq-category-question/$id")}}' role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit FAQ Question </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/faq-question/postEdit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$FAQQuestion->id}}">
                                <input type="hidden" name="faq_category_id" value="{{$category}}">
                                <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="name" name="question"  value="{{ $FAQQuestion->question  }}">
                                    @if ($errors->has('question'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('question') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                    <label for="answer">Answer</label>
                                    <input type="text" class="form-control" id="answer" name="answer"  value="{{ $FAQQuestion->answer  }}">
                                    @if ($errors->has('answer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('answer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href='{{url("admin/faq-category-question/$category")}}' role="button" class="btn btn-danger"> Cancel </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
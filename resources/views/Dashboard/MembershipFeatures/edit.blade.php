@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Membership Feature </h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/membership-feature/postEdit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$MembershipFeature->id}}">
                                <input type="hidden" name="membership_id" value="{{$membership}}">
                                <div class="form-group{{ $errors->has('feature_id') ? ' has-error' : '' }}">
                                    <label for="feature_id">Feature</label>
                                    <select name="feature_id" class="form-control" id="feature_id" name="feature_id" value="{{ $MembershipFeature->feature_id  }}">
                                        @foreach($Features as $Feature)
                                            <option value="{{ $Feature->id }}" {{ ($MembershipFeature->feature_id == $Feature->id) ? 'selected' : '' }}>
                                                {{ $Feature->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('feature_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('feature_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href='{{url("admin/membership-features/$id")}}' role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
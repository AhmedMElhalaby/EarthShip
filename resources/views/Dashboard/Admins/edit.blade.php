@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Admin's Information</h6>
                        <div class="mT-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/admins/postEdit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$Admin->id}}">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" name="name" aria-describedby="emailHelp" value="{{ $Admin->name }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $Admin->email }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">                                   
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="{{url('admin/admins')}}" role="button" class="btn btn-danger"> Cancel </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
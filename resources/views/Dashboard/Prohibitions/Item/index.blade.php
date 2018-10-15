@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Prohibited Category Items / [ <span class="text-danger">{{$ProhibitedCategory->name}} </span> ]  
                                <a href="{{url('admin/prohibited-category')}}" role="button" class="btn btn-info pull-right"> <span class="ti ti-control-backward"> </span> </a>
                            </h4>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    {{session('success')}}
                                </div>
                            @elseif(session('info'))
                                <div class="alert alert-info" role="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    {{session('info')}}
                                </div>
                            @elseif(session('danger'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    {{session('danger')}}
                                </div>
                            @endif
                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Preventive States</th>
                                        <th>Select Country To Prevent</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ProhibitedCategory->items as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->details}}</td>
                                        <td> 
                                            @foreach($item->limitedItems as $data)
                                                <label class="btn-warning" style="padding:3px 5px;"> 
                                                    {{$data->country['name']}}
                                                    <a class="closebtn" href="{{url('admin/prohibited-item-country/delete/'.$data->id)}}">&times;</a> 
                                                </label>  
                                            @endforeach
                                        </td>
                                        <td>
                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/prohibited-item-country/postAdd')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="prohibited_item_id" value="{{$item->id}}">
                                                    <input type="hidden" name="category_id" value="{{$ProhibitedCategory->id}}">
                                                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                                        <select name="country_id" class="form-control" id="country_id" name="country_id" value="{{ old('country_id') }}" onchange="this.form.submit()">
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->id}}">{{$country->name}} </option>
                                                            @endforeach
                                                        </select>
                                                            @if ($errors->has('country_id'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </form>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{url('admin/prohibited-item/'.$ProhibitedCategory->id.'/edit/'.$item->id)}}" class="text-primary" ><i class="ti-pencil-alt"></i></a>
                                            <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteProhibitedItem{{$item->id}}"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="DeleteProhibitedItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="text-center ">Are you sure ?!</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{url('admin/prohibited-item/delete/'.$item->id)}}" class="btn btn-danger">Yes, Delete it</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <a href="{{url('admin/prohibited-item/'.$ProhibitedCategory->id.'/add')}}" id="myBtn">
        <i class="ti-plus mt-5"></i>
    </a>

@endsection
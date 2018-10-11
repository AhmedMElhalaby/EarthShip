@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Users</h4>
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
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Default Address</th>
                                        <th>Membership</th>
                                        <th>Address</th>
                                        <!-- <th>Address - 2</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Postel Code</th>
                                        <th>Country Code</th>
                                        <th>Phone Number</th>
                                        <th>Package Photo</th>
                                        <th>Content Photo</th>
                                        <th>Detailed Photo</th>
                                        <th>Open Package</th> -->
                                        <th>Other Instruction</th>
                                        <th>Balance</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Users as $item)
                                    <tr>
                                        <td>{{$item->first_name}} {{$item->first_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->country['name']}}</td>
                                        <td>{{$item->defaultAddress['address']}}</td>
                                        <td>{{$item->membership['name']}}</td>
                                        <td>{{$item->address}}</td>
                                        <!-- <td>{{$item->address2}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->state}}</td>
                                        <td>{{$item->postal_code}}</td>
                                        <td>{{$item->country_code}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td>
                                            @if($item->package_photo == 1)
                                            <span class="text-success">Yes </span>
                                            @else
                                            <span class="text-danger">No </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->content_photo == 1)
                                            <span class="text-success">Yes </span>
                                            @else
                                            <span class="text-danger">No </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->detailed_photo == 1)
                                            <span class="text-success">Yes </span>
                                            @else
                                            <span class="text-danger">No </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->open_package == 1)
                                            <span class="text-success">Yes </span>
                                            @else
                                            <span class="text-danger">No </span>
                                            @endif
                                        </td> -->
                                        <td>{{$item->other_instruction}}</td>
                                        <td>{{$item->balance}}
                                        <td class="text-center">
                                        <a href="{{url('admin/user/show/'.$item->id)}}" class="text-success" title="Show User Info" ><i class="ti-eye"></i></a>
                                            <a href="{{url('admin/user/edit/'.$item->id)}}" class="text-primary" ><i class="ti-pencil-alt"></i></a>
                                            <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteUser{{$item->id}}"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="DeleteUser{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a href="{{url('admin/user/delete/'.$item->id)}}" class="btn btn-danger">Yes, Delete it</a>
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
    <a href="{{url('admin/user/add')}}" id="myBtn">
        <i class="ti-plus mt-5"></i>
    </a>

@endsection
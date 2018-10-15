@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Support</h4>
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
                                        <th>User </th>
                                        <th>Subject</th>
                                        <th>Detail</th>
                                        <th>Attachment</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Close Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Support as $item)
                                    <tr>
                                        <td>{{$item->user->first_name}} {{$item->user->second_name}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->detail}}</td>
                                        <td>
                                            <a title="Download "
                                               class="btn btn-xs text-primary ti ti-download"
                                               target="_self" 
                                               href="{{asset($item->attachment)}}" 
                                               download="{{asset($item->attachment)}}">
                                            </a>
                                            <a title="Show "
                                               class="btn btn-xs text-primary ti ti-eye"
                                               target="_self" 
                                               href="{{asset($item->attachment)}}" 
                                               on-click="window.open({{$item->attachment}},'_blank');">
                                            </a>
                                        </td>
                                        <td>{{$item->supportType->type}}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="text-success">Active </span>
                                            @else
                                                <span class="text-danger">Closed </span>
                                            @endif
                                        </td>
                                        <td>{{$item->close_date}}</td>
                                        <td class="text-center">
                                            @if($item->status == 1)
                                                <a href="{{url('admin/support-replies/'.$item->id)}}" class="text-primary" title="Replay" ><i class="ti-back-right"></i></a>
                                                <a href="{{url('admin/support/close/'.$item->id)}}" class="text-danger" title="Close It !" ><i class="ti-lock"></i></a>
                                            @endif              
                                            <!-- <a href="{{url('admin/support/edit/'.$item->id)}}" class="text-primary" ><i class="ti-pencil-alt"></i></a>
                                            <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteSupport{{$item->id}}"><i class="ti-trash"></i></a> -->
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="DeleteSupport{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a href="{{url('admin/support/delete/'.$item->id)}}" class="btn btn-danger">Yes, Delete it</a>
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
    <a href="{{url('admin/support/add')}}" id="myBtn">
        <i class="ti-plus mt-5"></i>
    </a> 

@endsection
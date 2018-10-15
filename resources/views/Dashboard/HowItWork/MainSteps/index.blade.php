@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">How To Work Main Steps</h4>
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($MainSteps as $item)
                                    <tr>
                                        <td>
                                            <img src="{{asset($item->image)}}"  width="75" height="75"/>
                                        </td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="text-center">
                                            <a href="{{url('admin/howItWork-subSteps/'.$item->id)}}" class="text-success" title="Show Sub Steps" ><i class="ti-eye"></i></a>
                                            <a href="{{url('admin/howItWork-mainStep/edit/'.$item->id)}}" class="text-primary" ><i class="ti-pencil-alt"></i></a>
                                            <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteMainStep{{$item->id}}"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="DeleteMainStep{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a href="{{url('admin/howItWork-mainStep/delete/'.$item->id)}}" class="btn btn-danger">Yes, Delete it</a>
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
    <a href="{{url('admin/howItWork-mainStep/add')}}" id="myBtn">
        <i class="ti-plus mt-5"></i>
    </a>

@endsection
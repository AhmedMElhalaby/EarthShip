@extends('Dashboard.layout.app')
@section('content')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row masonry pos-r">
                {{--<div class="masonry-sizer col-md-6"></div>--}}
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Show User Info/ <span class="text-danger"> {{$User->first_name}} {{$User->second_name}}</span>
                            <a href="{{url('admin/users')}}" role="button" class="btn btn-info pull-right"> <span class="ti ti-control-backward"> </span> </a>
                        </h6>
                        <div class="mT-30">
                            <table class="table table-striped table-bordered col-md-4" cellspacing="0" width="100%">
                                <tr>
                                    <th>Name </th>
                                    <td>{{$User->first_name}} {{$User->second_name}} </td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td>{{$User->email}} </td>
                                </tr>
                                <tr>
                                    <th>Country </th>
                                    <td>{{$User->country['name']}} </td>
                                </tr>
                                <tr>
                                    <th>Default Address </th>
                                    <td>{{$User->defaultAddress['address']}} </td>
                                </tr>
                                <tr>
                                    <th>Membership </th>
                                    <td>{{$User->membership['name']}} </td>
                                </tr>
                                <tr>
                                    <th>Address </th>
                                    <td>{{$User->address}} </td>
                                </tr>
                                <tr>
                                    <th>Address - 2 </th>
                                    <td>{{$User->address2}} </td>
                                </tr>

                                <tr>
                                    <th>City </th>
                                    <td>{{$User->city}} </td>
                                </tr>
                                <tr>
                                    <th>State </th>
                                    <td>{{$User->state}} </td>
                                </tr>
                                <tr>
                                    <th>Postal Code </th>
                                    <td>{{$User->postal_code}} </td>
                                </tr>
                                <tr>
                                    <th>Country Code </th>
                                    <td>{{$User->country_code}} </td>
                                </tr>
                                <tr>
                                    <th>Phone Number </th>
                                    <td>{{$User->phone_number}} </td>
                                </tr>
                                <tr>
                                    <th>Package Photo </th>
                                    <td> 
                                        @if($User->package_photo == 1)
                                            <span class="text-success">Yes </span>
                                        @else
                                            <span class="text-danger">No </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Content Photo </th>
                                    <td>
                                        @if($User->content_photo == 1)
                                            <span class="text-success">Yes </span>
                                        @else
                                            <span class="text-danger">No </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Detailed Photo </th>
                                    <td>
                                        @if($User->detailed_photo == 1)
                                            <span class="text-success">Yes </span>
                                        @else
                                            <span class="text-danger">No </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Open Package </th>
                                    <td> 
                                        @if($User->open_package == 1)
                                            <span class="text-success">Yes </span>
                                        @else
                                            <span class="text-danger">No </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Other Instruction </th>
                                    <td>{{$User->other_instruction}}</td>
                                </tr>
                                <tr>
                                    <th>Balance </th>
                                    <td>{{$User->balance}} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/Expected-Packages.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row top">
            <div class="col-md-6 col-sm-6 title">
                <h3>Expected Packages</h3>
            </div>
            <div class="col-md-6 col-sm-6 right-btns">
                <div class="col-md-6 col-sm-6">
                    <a href="#exampleModal" class="btn bttn btn-primary" data-toggle="modal">Add Package</a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="#" class="btn bttn1 btn-primary">Report a Missing Package</a>
                </div>
            </div>
        </div>
    </div>

    <div class="tables">
    @foreach(Auth::guard('user')->user()->ExpectedPackage() as $item)
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr style="height: 0">
                    <th colspan="5"><h3>Package: {{$item->vendor}}</h3></th>
                    <th rowspan="3" class="va">
                        <div class="btn">
                            <button type="button" class="btn btn-primary" href="#Edit{{$item->id}}" data-toggle="modal">Edit Package</button><br>
                            <button type="button" class="btn btn-primary">Edit Customs Declaration</button><br>
                            <button type="button" onclick="window.location='{{url('delete/expected-packages?id='.$item->id)}}'" class="btn btn-primary red">Remove Package</button>
                        </div>
                    </th>
                </tr>
                <tr class="gray" style="height: 0">
                    <td>Tracking Number</td>
                    <td>Date Created</td>
                    <td>Shipped From</td>
                    <td>From</td>
                    <td >Recipient</td>
                </tr>
                <tr >
                    <td>{{$item->tracking_number}}</td>
                    <td>{{$item->created_at->format('Y-M-d')}}</td>
                    <td>Gaza</td>
                    <td>Gaza</td>
                    <td>{{$item->recipient_name}}</td>
                </tr>
                </tbody>
            </table>
        </div>
            <div class="modal fade" id="Edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{url('edit/expected-packages')}}" class="modal-content">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle"><strong>New Expected Packages</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="form-group">
                                    <label for="vendor" class="col-form-label"><strong>Vendor</strong></label>
                                    <input type="text" class="form-control" name="vendor" id="vendor" value="{{$item->vendor}}">
                                </div>
                                <div class="form-group">
                                    <p>
                                        <strong>Recipient Name</strong>
                                    </p>
                                    <p>
                                        <input type="hidden" name="recipient_name" value="{{$item->recipient_name}}">
                                        <span><i class="fa fa-check-circle"></i>{{$item->recipient_name}}</span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="address_id" class="col-form-label"><strong>Warehouse</strong></label>
                                    <select name="address_id" class="select form-control warehouses " id="address_id">
                                        <option value="{{Auth::guard('user')->user()->defaultAddress->id}}" selected>{{Auth::guard('user')->user()->defaultAddress->city}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tracking_number" class="col-form-label"><strong>Tracking Number</strong></label>
                                    <input type="text" class="form-control" name="tracking_number" id="tracking_number" value="{{$item->tracking_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="note" class="col-form-label">Your Notes</label>
                                    <textarea class="form-control" name="note" id="note">{{$item->note}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btn m-btn">
                                <button type="submit" id="SavePackage" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{url('add/expected-packages')}}" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><strong>New Expected Packages</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="vendor" class="col-form-label"><strong>Vendor</strong></label>
                            <input type="text" class="form-control" name="vendor" id="vendor">
                        </div>
                        <div class="form-group">
                            <p>
                                <strong>Recipient Name</strong>
                            </p>
                            <p>
                                <input type="hidden" name="recipient_name" value="{{Auth::guard('user')->user()->AdditionalNameFirst()->name}}">
                                <span><i class="fa fa-check-circle"></i>{{Auth::guard('user')->user()->AdditionalNameFirst()->name}}</span>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="address_id" class="col-form-label"><strong>Warehouse</strong></label>
                            <select name="address_id" class="select form-control warehouses " id="address_id">
                                <option value="{{Auth::guard('user')->user()->defaultAddress->id}}" selected>{{Auth::guard('user')->user()->defaultAddress->city}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tracking_number" class="col-form-label"><strong>Tracking Number</strong></label>
                            <input type="text" class="form-control" name="tracking_number" id="tracking_number">
                        </div>
                        <div class="form-group">
                            <label for="note" class="col-form-label">Your Notes</label>
                            <textarea class="form-control" name="note" id="note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn m-btn">
                        <button type="submit" id="SavePackage" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
           $('#SavePackage').on('click',function () {
               let dataString = new FormData();
               dataString.append('vendor', $('#vendor').val());
               dataString.append('recipient_name', {{Auth::guard('user')->user()->AdditionalNameFirst()->name}});
               dataString.append('address_id', $('#address_id').val());
               dataString.append('tracking_number', $('#tracking_number').val());
               dataString.append('note', $('#note').val());

               $.ajax({
                   url: "{{ url('add/expected-packages') }}",
                   type: 'POST',
                   dataType: 'json',
                   data: dataString,
                   async: true,
                   cache: true,
                   success: function(response) {
                       if(response.status){

                           window.location = '{{url('verify-email')}}';
                       }
                       else {
                       }
                   },
                   contentType: false,
                   processData: false

               });
           });
        });


    </script>
@endsection
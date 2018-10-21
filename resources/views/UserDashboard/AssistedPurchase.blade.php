@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/Assisted-Purchase.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row top">
            <div class="col-md-6 col-sm-6 title">
                <h3>Assisted Purchases</h3>
            </div>
            <div class="col-md-6 col-sm-6 right-btns">
                <a href="#exampleModal" class="btn bttn btn-primary right" data-toggle="modal">New Assisted Purchase</a>
            </div>
        </div>
    </div>
    <div class="tables">
        @foreach(Auth::guard('user')->user()->AssistedPurchase() as $item)
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Purchase #</th>
                    <th scope="col">Store Name</th>
                    <th scope="col">Date Requested</th>
                    <th scope="col">Date Purchased</th>
                    <th scope="col">Total Purchases</th>
                    <th scope="col">Total Charges</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><strong style="font-size: 25px; font-weight: 900;">{{$item->id}}</strong></td>
                    <td><strong>{{$item->site_name}}</strong></td>
                    <td><strong>{{$item->created_at->format('Y-m-d')}}</strong></td>
                    <td><strong>@if($item->updated_at != null) {{$item->updated_at->format('Y-m-d')}} @endif</strong></td>
                    <td><strong>$ {{$item->TotalItemsPrice()}}</strong></td>
                    <td><strong>$ {{$item->TotalItemsPrice() + $item->handling_charges +$item->domestic_tax}}</strong></td>
                    <td><strong>Payment Pending</strong></td>
                    <td>
                        <ul id="simple-account-dropdown-freebie2">
                            <li>
                                <div id="simple-account-dropdown2">
                                    <div class="account">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </div>
                                    <div class="dropdown" style="display: none">
                                        <ul>
                                            <li><a href="#exampleModal" data-toggle="modal"><i class="fa fa-pencil"></i>&ensp;Edit</a></li>
                                            <li><a href="#"><i class="fa fa-times"></i>Cancel</a></li>
                                            <li><a href="#exampleModal" data-toggle="modal"><i class="fa fa-eye"></i>View</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        @endforeach





    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="{{url('add/assisted-purchase')}}" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><strong>Where would you like us to purchase from?</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <div class="form-group PaT">
                            <label for="" class="col-form-label"><strong>Site Name</strong></label>
                            <input type="text" class="form-control" name="site_name" id="">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label"><strong>Site URL</strong></label>
                            <input type="text" class="form-control" name="site_url" id="">
                        </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>
                            <strong>Please let us know what item(s) you'd like us to purchase</strong>
                        </p>
                    </div>
                    <div class="lines">
                        <div class="form-group add-line">
                            <label for="" class="form-label"><strong>Item Name</strong></label>
                            <input type="text" class="form-control" name="item_name" id="">
                        </div>
                        <div class="form-group add-line">
                            <label for="" class="col-form-label"><strong>Options</strong></label>
                            <input type="text" class="form-control" name="option" id="">
                        </div>
                        <div class="form-group add-line">
                            <label for="" class="col-form-label"><strong>Item URL</strong></label>
                            <input type="text" class="form-control" name="item_url" id="">
                        </div>
                        <div class="form-group add-line">
                            <label for="" class="col-form-label"><strong>Price (per piece)</strong></label>
                            <input type="text" class="form-control" name="price" id="">
                        </div>
                        <div class="form-group add-line1">
                            <label for="" class="col-form-label"><strong>Quantity</strong></label>
                            <input type="text" class="form-control" name="quantity" id="">
                        </div>
                        <a href=""><span class="inline"><i class="fa fa-trash"></i></span></a>
                    </div>
                    <div class="btn m-btn">
                        <button type="button" class="btn btn-primary"><strong>Add Line</strong></button>
                    </div>
                    <div class="row ">
                        <div class="form-group col-md-9 right">
                            <div class="col-md-8">
                                <label for="" class="col-form-label"><strong>Domestic Shipping/Handling Charges</strong></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="handling_charges" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-md-9 right">
                            <div class="col-md-8">
                                <label for="" class="col-form-label"><strong>Domestic Tax</strong></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="domestic_tax" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-md-9 right">
                            <div class="col-md-8">
                                <label for="" class="col-form-label"><strong>Total</strong></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label"><strong>Where would you like the items sent?</strong></label>
                        <select name="address_id" id="" class="select form-control warehouses ">
                            <option value="{{Auth::guard('user')->user()->defaultAddress->id}}" selected>{{Auth::guard('user')->user()->defaultAddress->address}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Any other instructions for us?</label>
                        <textarea class="form-control" id="" name="other_instruction"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn m-btn">
                        <button type="submit" class="btn btn-primary"><strong>Next</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
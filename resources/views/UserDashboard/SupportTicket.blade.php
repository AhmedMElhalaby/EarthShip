@extends('UserDashboard.layout.app')
<?php
use App\Support;
use App\SupportType;
?>
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/Assisted-Purchase.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/support-tickets.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row top">
            <div class="col-md-6 col-sm-6 title">
                <h3>Support Tickets</h3>
            </div>
            <div class="col-md-6 col-sm-6 right-btns">
                <a href="#exampleModal" class="btn bttn btn-primary right" data-toggle="modal">Open a New Support Ticket</a>
            </div>
        </div>
    </div>
    <div class="tables">
        @foreach(Auth::guard('user')->user()->Support() as $item)
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr class="H">
                    <th scope="col">Ticket #</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Activity</th>
                    <th scope="col">Date Closed</th>
                    <th scope="col" rowspan="2" class="view-details"><a href="">View Details</a></th>
                </tr>
                <tr style="font-size: 13px;">
                    <td><strong>{{$item->id}}</strong></td>
                    <td><strong>{{$item->created_at->format('Y-M-d')}}</strong></td>
                    <td><strong>{{$item->subject}}</strong></td>
                    <td><strong>{{$item->supportType->type}}</strong></td>
                    <td><strong>Submitted</strong></td>
                    <td><strong>{{$item->updated_at->format('Y-M-d')}}</strong></td>
                    <td><strong>{{$item->close_date}}</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{url('add/support-ticket')}}" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><strong>Open New Support Ticket</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>
                            <strong>What would you like to do? </strong>
                        </p>
                        @foreach(SupportType::all() as $item)
                            <div class="mrT">
                                <input class="form-check-input" type="checkbox" name="type" id="inlineCheckbox{{$item->id}}" style="opacity: 0" value="{{$item->id}}">
                                <label class="form-check-label " for="inlineCheckbox{{$item->id}}">{{$item->type}}</label>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="" class="col-form-label mT"><strong>Subject</strong></label>
                            <input type="text" class="form-control" name="subject" id="">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Details</label>
                            <textarea class="form-control" name="detail" id=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn m-btn">
                            <button type="submit" class="btn btn-primary"><strong>Submit Ticket</strong></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $(".form-check-label").click(function() {
                $(".form-check-label").removeClass("active");
                $(this).toggleClass("active");
            });
        });
    </script>
@endsection
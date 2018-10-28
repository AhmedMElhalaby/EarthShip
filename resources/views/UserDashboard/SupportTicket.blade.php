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
                    <th scope="col" rowspan="2" class="view-details"><a href="#Details{{$item->id}}" data-toggle="modal">View Details</a></th>
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
            <div class="modal fade exampleModal1" id="Details{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle"><strong>{{$item->subject}}</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="send-message">
                                <div class="send-message-title">
                                    <h4>Send a New Message to Earthship Support</h4>
                                </div>
                                <div class="send-message-content">
                                    <form method="post" action="{{url('add/support-ticket/replay')}}">
                                        <input type="hidden" name="support_id" value="{{$item->id}}">
                                        <input type="hidden" name="sender_id" value="{{Auth::guard('user')->user()->id}}">
                                        <input type="hidden" name="sender_type" value="1">
                                        <div class="form-group">
                                            <label for="subject" class="col-form-label mT"><strong>Subject</strong></label>
                                            <input type="text" class="form-control" name="subject" id="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="details" class="col-form-label">Details</label>
                                            <textarea class="form-control" id="details" name="details"></textarea>
                                        </div>
                                        <div class="input-files mt">

                                            <div class="input-group input-file mb" >
                                                <input type="file" id="Upload{{$item->id}}" name="attachment" style="display: none" onchange="UploadText('{{$item->id}}')" hidden="hidden" multiple>
												<span class="input-group-btn">
									        		<button class="btn btn-default btn-choose" type="button" onclick="UploadTrigger('Upload{{$item->id}}')">Choose</button>
									    		</span>
                                                <input type="text" class="form-control input-upload" id="UploadText{{$item->id}}" placeholder='Choose a file...' onclick="UploadTrigger('Upload{{$item->id}}')"/>
                                                <span class="input-group-btn">
									       			 <button class="btn btn-danger btn-reset" onclick="ResetFile('{{$item->id}}')" type="button">Reset</button>
									    		</span>
                                            </div>
                                        </div>

                                        <div class="m-btn">
                                            <button type="submit" class="btn btn-primary"><strong>Send</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="messages">
                                <div class="messages-title">
                                    <h4>Messages</h4>
                                </div>
                                <div class="messages-content">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card cstm-card">
                                            <button class="btn btn-link card-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="card1">
                                                <div class="row messages-info">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 ">
                                                        <div class="col-md-4">
                                                            <h4>{{$item->user->first_name .' '. $item->user->second_name}}</h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>{{$item->subject}}</h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>{{$item->created_at->format('Y-M-d')}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 cstm-col">
                                                        @if($item->attachment != null)
                                                            <?php $attachment = explode(',',$item->attachment); ?>
                                                            <img src="{{asset('uploads/'.$attachment[0])}}" class="mess-img">
                                                        @endif
                                                    </div>
                                                </div>
                                            </button>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">{{$item->detail}}</div>
                                            </div>
                                        </div>
                                        @foreach($item->replies as $reply)
                                        <div class="card cstm-card">
                                            <button class="btn btn-link card-header" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2" id="card2">
                                                <div class="row messages-info">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 ">
                                                        <div class="col-md-4">
                                                            <h4>{{$reply->user->first_name .' '.$reply->user->second_name}}</h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>{{$reply->subject}}</h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>{{$reply->created_at->format('Y-M-d')}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 cstm-col">
                                                        @if($reply->attachment != null)
                                                            <?php $attachment = explode(',',$reply->attachment); ?>
                                                            <img src="{{asset('uploads/'.$attachment[0])}}" class="mess-img">
                                                        @endif
                                                    </div>
                                                </div>
                                            </button>

                                            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    {{$reply->details}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="close-ticket">
                                <div class="close-ticket-title">
                                    <h4>Close This Ticket</h4>
                                </div>
                                <div class="close-ticket-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ipsam quos accusamus eos ducimus corporis, autem eius dolor delectus vel quidem, nobis quo omnis quae reprehenderit culpa qui, blanditiis quasi.</p>
                                </div>
                                <div class="m-btn">
                                    <button type="button" class="btn btn-primary"><strong>Close This Ticket</strong></button>
                                </div>
                            </div>
                            <div class="m-btn">
                                <button type="button" class="btn btn-primaryclose" data-dismiss="modal" aria-label="Close"><strong>Close</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
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
       function UploadTrigger(name) {
           $('#'+name).click();
       }
       function UploadText(name) {
           $('#UploadText'+name).val('Choosed !');
       }
       function ResetFile(name){
        $('#UploadText'+name).val('');

        $('#Upload'+name).val('');

       }
    </script>
@endsection
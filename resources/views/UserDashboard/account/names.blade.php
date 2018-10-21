@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/setteing-membership.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/account-preferences.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/address-book.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/additional-names.css')}}">
@endsection
@section('content')
    <div class="setteing-top-nav">
        <ul class="nav">
            <li onclick="window.location='{{url('account/membership')}}'">Account Membership</li>
            <li onclick="window.location='{{url('account/preferences')}}'">Account Preferences</li>
            <li onclick="window.location='{{url('account/address')}}'">Address Book</li>
            <li class="active" onclick="window.location='{{url('account/names')}}'">Additional Names</li>
            <li onclick="window.location='{{url('account/wallet')}}'">Your Virtual Wallet</li>
        </ul>
    </div>

    <div class="set-content">
        <h2>Additional Names</h2>

        <div class="name-text">
            <p>
                The names listed below are associated with your Shipito account. Packages shipped to these names using your US Address will be placed into your mailbox.
            </p>
            <form>
                <div id="Names">
                    @foreach(Auth::guard('user')->user()->AdditionalName() as $item)
                        <div class="input-group">
                            <input type="text" class="form-control" disabled placeholder="Master" value="{{$item->name}}">
                            <span class="input-group-btn">
                                <button class="btn btn-default delete_name" type="button" data-id="{{$item->id}}"><i class="fa fa-trash"></i></button>
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="input-group mt">
                    <input type="text" id="AdditionalNameInput" class="form-control" placeholder="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="AdditionalNameButton" type="button"><i class="fa fa-plus"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
<div id="New" style="display: none;">
    <div class="input-group">
        <input type="text" class="form-control" id="NewInput" disabled placeholder="Master" >
        <span class="input-group-btn">
            <button class="btn btn-default delete_name" type="button" id="NewButton" data-id=""><i class="fa fa-trash"></i></button>
        </span>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#AdditionalNameButton').on('click',function () {
                let input =$('#AdditionalNameInput');
                let name = input.val();
                if(name !== ''){
                    let dataString = new FormData();
                    dataString.append('name', name);
                    $.ajax({
                        url: "{{ url('account/add_name') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: dataString,
                        async: true,
                        cache: true,
                        success: function(response) {
                            if(response.status){
                                $('#New #NewInput').attr('value',response.name);
                                $('#New #NewButton').attr('data-id',response.id);
                                $('#Names').append($('#New').html())
                                input.val('');
                            }
                        },
                        contentType: false,
                        processData: false

                    });
                }else{
                    alert("Cannot be empty")
                }

            });
            $('.delete_name').on('click',function () {
                let button =$(this);
                let id =button.attr('data-id');
                let dataString = new FormData();
                dataString.append('id', id);
                $.ajax({
                    url: "{{ url('account/delete_name') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: dataString,
                    async: true,
                    cache: true,
                    success: function(response) {
                        if(response.status){
                            button.parent().parent().remove();
                        }
                    },
                    contentType: false,
                    processData: false

                });
            });
        });
    </script>
@endsection
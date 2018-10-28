@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/setteing-membership.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/virtual-wallet.css')}}">
@endsection
@section('content')
    <div class="setteing-top-nav">
        <ul class="nav">
            <li onclick="window.location='{{url('account/membership')}}'">Account Membership</li>
            <li onclick="window.location='{{url('account/preferences')}}'">Account Preferences</li>
            <li onclick="window.location='{{url('account/address')}}'">Address Book</li>
            <li onclick="window.location='{{url('account/names')}}'">Additional Names</li>
            <li class="active" onclick="window.location='{{url('account/wallet')}}'">Your Virtual Wallet</li>
        </ul>
    </div>

    <div class="set-content">
        <h2>Your Virtual Wallet</h2>

        <div class="remaining-dep">
            <table>
                <tr>
                    <td>Remaining Deposit</td>
                    <td>500</td>
                    <td style="width: 10%;" class="gray">$</td>
                </tr>
            </table>
        </div>

        <div class="date-picker">
            <div class="row">
                <div class="col-md-6 col-sm-6 N-Pr">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 ">
                                <label for="">From</label>
                            </div>
                            <div class="col-md-10 col-sm-10 ">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
						                        <span class="fa fa-calendar"></span>
						                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 N-Pr">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 ">
                                <label for="">To</label>
                            </div>
                            <div class="col-md-10 col-sm-10 ">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
						                        <span class="fa fa-calendar"></span>
						                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cstm-table">
            <div class="table-responsive" style="overflow: auto;">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" >Date</th>
                        <th scope="col">Deposit</th>
                        <th scope="col">Remaining Deposit</th>
                        <th scope="col">Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>4-4-2018</td>
                        <td>1000$</td>
                        <td>500$</td>
                        <td>Visa</td>
                    </tr>
                    <tr>
                        <td>4-4-2018</td>
                        <td>1000$</td>
                        <td>500$</td>
                        <td>Visa</td>
                    </tr>
                    <tr>
                        <td>4-4-2018</td>
                        <td>1000$</td>
                        <td>500$</td>
                        <td>Visa</td>
                    </tr>
                    <tr>
                        <td>4-4-2018</td>
                        <td>1000$</td>
                        <td>500$</td>
                        <td>Visa</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="remaining-dep all">
            <table>
                <tr>
                    <td>All Deposit</td>
                    <td>2000</td>
                    <td style="width: 10%;" class="gray">$</td>
                </tr>
            </table>
        </div>

    </div>


@endsection
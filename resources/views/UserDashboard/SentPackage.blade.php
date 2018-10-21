@extends('UserDashboard.layout.app')
@section('style')
    <link rel="stylesheet" href="{{asset('public/home/css/sent-Packages.css')}}">

@endsection
@section('content')
    <div class="contract-notification">
        <div class="col-md-4">
            <a href="">
                <div class="info">
                    <p>On The Way</p>
                    <span><strong>10</strong></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="">
                <div class="info">
                    <p>Delivered</p>
                    <span><strong>8</strong></span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="">
                <div class="info">
                    <p>Consolidations</p>
                    <span><strong>17</strong></span>
                </div>
            </a>
        </div>
    </div>

    <div class="divs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-section">
                        <div class="p-names inline">
                            <h1 class="inline">G</h1>
                            <span class="inline">Packages</span>
                            <p class="inline">
                                <strong>A</strong>+<strong>B</strong>+<strong>C</strong>+<strong>D</strong>+<strong>M</strong>
                            </p>
                        </div>
                        <div class="p-value inline right">
                            <h4 class="inline">Customs value :</h4>
                            <span class="inline">$400.00</span>
                        </div>
                    </div>
                    <div class="mid-section">
                        <div class="package-imgs inline">
                            <div class="lg-img">
                                <img src="img/packages.jpg" alt="">
                            </div>
                            <div class="sm-img">
                                <img src="img/packages.jpg" alt="">
                                <img src="img/packages1.jpg" alt="">
                            </div>
                        </div>
                        <div class="package-info inline">
                            <table class="information">
                                <tr>
                                    <td>sending date:</td>
                                    <td>Oct-15-2018</td>
                                    <td></td>
                                    <td>Insurance</td>
                                    <td><strong>+</strong></td>
                                    <td></td>
                                    <td rowspan="3">
                                        Gaza <br>
                                        Gaza <br>
                                        Gaza <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Address:</td>
                                </tr>
                                <tr>
                                    <td>shipping method:</td>
                                    <td>FedEx</td>
                                    <td></td>
                                    <td>tracking No.:</td>
                                    <td>123456789</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
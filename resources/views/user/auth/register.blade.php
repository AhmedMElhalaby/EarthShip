@extends('layout.app')
@section('content')
    <?php
    $MemberShip = \App\Membership::all();
    $Features = \App\Feature::all();
    ?>
    <section id="tabs">
        <div class="container">
            <h6 class="section-title h1">Sign Up</h6>
            <form method="post" action="{{url('register')}}" class="row">
                <input type="hidden" name="MemberShip" id="MemberShip" value="">
                <input type="hidden" name="MemberShipPrice" id="MemberShipPrice" value="">
                <input type="hidden" name="MemberShipName" id="MemberShipName" value="">
                <input type="hidden" name="BillingType" id="BillingType" value="">
                {{ csrf_field() }}
                <div class="col-xs-12 ">
                    <nav>
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <ul class="nav-ul">
                                <li class="nav-item border-right active" id="nav-tab1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">MEMBERSHIP SELECTION</li>
                                <li class="nav-item border-right" id="nav-tab2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">REVIEW YOUR ORDER</li>
                                <li class="nav-item border-right" id="nav-tab3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">MEMBER INFORMATION</li>
                                <li class="nav-item" id="nav-tab4"  data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">BILLING INFORMATION</li>
                            </ul>
                        </div>
                        <p>
                            All Earthship  members receive our world-class customer service and express door-to-door delivery options. Cancel or change at any time! Cancel or change at any time! Cancel or change at any time!
                        </p>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="nav-tab1">
                            <div class="container">
                                <div class="row">
                                    @foreach($MemberShip as $item)
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="general-card card{{$item->id}}">
                                                <div class="top">
                                                    <h3>{{$item->name}}</h3>
                                                    <h1>@if($item->price > 0) <sup>$</sup>{{$item->price}}<span>/ month</span> @else FREE @endif</h1>
                                                </div>
                                                <div class="description">
                                                    {{--<p>--}}
                                                    {{--for people who want to try<br> Shipito for as long as they like--}}
                                                    {{--</p>--}}
                                                    <h3>{{$item->name}} includes:</h3>
                                                    <ul>
                                                        @foreach($Features as $feature)
                                                            <li class="@if($item->featureExist($feature->id)) true @else false @endif"><i class="fa @if($item->featureExist($feature->id))fa-check-circle @else fa-times-circle @endif"></i>&ensp;{{$feature->name}}</li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                                <input id="input{{$item->id}}" type="button" data-id="nav-tab1" name="next" data-id="{{$item->id}}" data-name="{{$item->name}} MemberShip" data-price="{{$item->price}}" class="@if($item->price > 0)  prem payment-button @else sign-free @endif  next action-button MemberShip" value="Sign Up as {{$item->name}}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-tab2">
                            <div class="container tab2">
                                <div class="container">
                                    <div class="form1">
                                        <div class="row">
                                            <div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label for="first_name">First Name:</label>
                                                <input type="text" id="first_name" name="first_name" class="form-control" value="{{old('first_name')}}">
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                                                <label for="second_name">Last Name:</label>
                                                <input type="text" id="second_name" name="second_name" value="{{old('second_name')}}" class="form-control">
                                                @if ($errors->has('second_name'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('second_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">Email Address:</label>
                                                <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label for="country">Country:</label>
                                                <div class="selection">
                                                    <select id="country" class="selectpicker countrypicker"  data-default="United States" name="country" data-flag="true"></select>
                                                </div>
                                                @if ($errors->has('country'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Account Password:</label>
                                                <input id="password" name="password" type="password" class="form-control">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="password_confirmation">Confirm Password:</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address">Address:</label>
                                                <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                                <label for="address2">Address2:</label>
                                                <input type="text" id="address2" name="address2" value="{{old('address2')}}" class="form-control">
                                                @if ($errors->has('address2'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('address2') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label for="city">City:</label>
                                                <input type="text" id="city" name="city" value="{{old('city')}}" class="form-control">
                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('state_province') ? ' has-error' : '' }}">
                                                <label for="state_province">State or Province:</label>
                                                <input type="text" id="state_province" name="state_province" value="{{old('state_province')}}" class="form-control">
                                                @if ($errors->has('state_province'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('state_province') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                                <label for="postal_code">Postal Code:</label>
                                                <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}" class="form-control">
                                                @if ($errors->has('postal_code'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                                <label for="phone_number">Phone Number:</label>
                                                <input type="text" id="phone_number" name="phone_number" value="{{old('phone_number')}}" class="form-control">
                                                @if ($errors->has('phone_number'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" data-id="nav-tab2" class="next2  next action-button" value="Next"/>
                        </div>


                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-tab3">
                            <div class="container tab2">
                                <div class="form1">
                                    <div class="col-md-12 col-sm-12 buttons">
                                        <button type="button" class="payment" data-name="Credit Card">
                                            <i class="fa fa-credit-card"></i>Credit Card
                                        </button>
                                        <button type="button" class="payment" data-name="PayPal">
                                            <i class="fa fa-paypal"></i>PayPal
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="payment_first_name">Cardholder's First Name:</label>
                                            <input type="text" id="payment_first_name" name="payment_first_name" class="form-control" value="{{old('payment_first_name')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_second_name">Cardholder's Last Name:</label>
                                            <input type="text" id="payment_second_name" name="payment_second_name" value="{{old('payment_second_name')}}" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="card_number">Card Number:</label>
                                            <input type="text" id="card_number" name="card_number" value="{{old('card_number')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="expiration_month">Expiration date*:</label>
                                            <input type="text" id="expiration_month" name="expiration_month" value="{{old('expiration_month')}}" class="form-control ex-date1">
                                            <label for="expiration_year" style="display: none;"></label>
                                            <input type="text" id="expiration_year" name="expiration_year" value="{{old('expiration_year')}}" class="form-control ex-date2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="security_code">Security Code*:</label>
                                            <input type="text" id="security_code" name="security_code" value="{{old('security_code')}}" class="form-control sec-date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" data-id="nav-tab3" class="  next action-button next2" value="Next"/>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="nav-tab4">
                            <div class="container tab2">
                                <div class="row billing">
                                    <div class="col-md-4 col-sm-5 col-xs-12 leftSection">
                                        <h3>Account Information</h3>
                                        <h4 id="name_text"></h4>
                                        <h4 id="email_text"></h4>
                                        <p>
                                            <span id="address_text"></span> <br>
                                            <span id="address2_text"></span> <br>
                                            <span id="city_text"></span> , <span id="country_text"></span> <br>
                                            <span id="postal_code_text"></span> <br>
                                            <span id="phone_number_text"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-5 col-xs-12 rightSection">
                                        <h3>Billing Information</h3>
                                        <h4 id="MemberShip_text"></h4>
                                        <h4 id="BillingType_text"></h4>
                                        <h4 id="card_number_text"></h4>
                                        <h4><span id="expiration_month_text"></span>/<span id="Expiration_year_text"></span>   </h4>
                                    </div>
                                </div>

                                <div class="inner-text">
                                    <p>Please verify the information above is correct , and click "Submit" to complete your membership application . you can cancel or change your membership at any time! </p>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 summary">
                                        <h3>Order Summary</h3>
                                        <div class="col-md-8 col-xs-12">
                                            <h4>One-time Setup fee:</h4>
                                            <span><strong>$ <span id="setup_fee_text"></span></strong></span><br>
                                            <h4>Membership fee (Monthly):</h4>
                                            <span><strong>$ <span id="MemberShipPrice_text"></span></strong></span>
                                        </div>
                                        <div class="col-md-8 col-xs-12 Total">
                                            <h2><strong>Total:</strong></h2>
                                            <span class="bs"><strong>$ <slot id="TotalPrice_text"></slot></strong></span><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="mrT">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" style="opacity: 0" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">I accept and agree ...... </label>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="submit action-button next2" value="Submit"/>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <br><br><br><br><br><br><br><br>

    @include('layout.footer')
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('public/css/intlTelInput.css')}}">
    <!-- custome style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/price-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/pricre-responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/calculator.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/address-book.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/singUp.css')}}">
@endsection
@section('script')
    <script src="{{asset('public/js/msform.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    {{--<script src="{{asset('public/js/countrypicker.min.js')}}"></script>--}}
    <script src="{{asset('public/js/intlTelInput.min.js')}}"></script>
    <script>
        $(function(){var e=[{name:"Afghanistan",code:"AF"},{name:"Åland Islands",code:"AX"},{name:"Albania",code:"AL"},{name:"Algeria",code:"DZ"},{name:"American Samoa",code:"AS"},{name:"Andorra",code:"AD"},{name:"Angola",code:"AO"},{name:"Anguilla",code:"AI"},{name:"Antarctica",code:"AQ"},{name:"Antigua and Barbuda",code:"AG"},{name:"Argentina",code:"AR"},{name:"Armenia",code:"AM"},{name:"Aruba",code:"AW"},{name:"Australia",code:"AU"},{name:"Austria",code:"AT"},{name:"Azerbaijan",code:"AZ"},{name:"Bahamas",code:"BS"},{name:"Bahrain",code:"BH"},{name:"Bangladesh",code:"BD"},{name:"Barbados",code:"BB"},{name:"Belarus",code:"BY"},{name:"Belgium",code:"BE"},{name:"Belize",code:"BZ"},{name:"Benin",code:"BJ"},{name:"Bermuda",code:"BM"},{name:"Bhutan",code:"BT"},{name:"Bolivia",code:"BO"},{name:"Bosnia and Herzegovina",code:"BA"},{name:"Botswana",code:"BW"},{name:"Bouvet Island",code:"BV"},{name:"Brazil",code:"BR"},{name:"British Indian Ocean Territory",code:"IO"},{name:"Brunei Darussalam",code:"BN"},{name:"Bulgaria",code:"BG"},{name:"Burkina Faso",code:"BF"},{name:"Burundi",code:"BI"},{name:"Cambodia",code:"KH"},{name:"Cameroon",code:"CM"},{name:"Canada",code:"CA"},{name:"Cape Verde",code:"CV"},{name:"Cayman Islands",code:"KY"},{name:"Central African Republic",code:"CF"},{name:"Chad",code:"TD"},{name:"Chile",code:"CL"},{name:"China",code:"CN"},{name:"Christmas Island",code:"CX"},{name:"Cocos (Keeling) Islands",code:"CC"},{name:"Colombia",code:"CO"},{name:"Comoros",code:"KM"},{name:"Congo",code:"CG"},{name:"Congo, The Democratic Republic of the",code:"CD"},{name:"Cook Islands",code:"CK"},{name:"Costa Rica",code:"CR"},{name:'Cote D"Ivoire',code:"CI"},{name:"Croatia",code:"HR"},{name:"Cuba",code:"CU"},{name:"Cyprus",code:"CY"},{name:"Czech Republic",code:"CZ"},{name:"Denmark",code:"DK"},{name:"Djibouti",code:"DJ"},{name:"Dominica",code:"DM"},{name:"Dominican Republic",code:"DO"},{name:"Ecuador",code:"EC"},{name:"Egypt",code:"EG"},{name:"El Salvador",code:"SV"},{name:"Equatorial Guinea",code:"GQ"},{name:"Eritrea",code:"ER"},{name:"Estonia",code:"EE"},{name:"Ethiopia",code:"ET"},{name:"Falkland Islands (Malvinas)",code:"FK"},{name:"Faroe Islands",code:"FO"},{name:"Fiji",code:"FJ"},{name:"Finland",code:"FI"},{name:"France",code:"FR"},{name:"French Guiana",code:"GF"},{name:"French Polynesia",code:"PF"},{name:"French Southern Territories",code:"TF"},{name:"Gabon",code:"GA"},{name:"Gambia",code:"GM"},{name:"Georgia",code:"GE"},{name:"Germany",code:"DE"},{name:"Ghana",code:"GH"},{name:"Gibraltar",code:"GI"},{name:"Greece",code:"GR"},{name:"Greenland",code:"GL"},{name:"Grenada",code:"GD"},{name:"Guadeloupe",code:"GP"},{name:"Guam",code:"GU"},{name:"Guatemala",code:"GT"},{name:"Guernsey",code:"GG"},{name:"Guinea",code:"GN"},{name:"Guinea-Bissau",code:"GW"},{name:"Guyana",code:"GY"},{name:"Haiti",code:"HT"},{name:"Heard Island and Mcdonald Islands",code:"HM"},{name:"Holy See (Vatican City State)",code:"VA"},{name:"Honduras",code:"HN"},{name:"Hong Kong",code:"HK"},{name:"Hungary",code:"HU"},{name:"Iceland",code:"IS"},{name:"India",code:"IN"},{name:"Indonesia",code:"ID"},{name:"Iran, Islamic Republic Of",code:"IR"},{name:"Iraq",code:"IQ"},{name:"Ireland",code:"IE"},{name:"Isle of Man",code:"IM"},{name:"Israel",code:"IL"},{name:"Italy",code:"IT"},{name:"Jamaica",code:"JM"},{name:"Japan",code:"JP"},{name:"Jersey",code:"JE"},{name:"Jordan",code:"JO"},{name:"Kazakhstan",code:"KZ"},{name:"Kenya",code:"KE"},{name:"Kiribati",code:"KI"},{name:'Korea, Democratic People"S Republic of',code:"KP"},{name:"Korea, Republic of",code:"KR"},{name:"Kuwait",code:"KW"},{name:"Kyrgyzstan",code:"KG"},{name:'Lao People"S Democratic Republic',code:"LA"},{name:"Latvia",code:"LV"},{name:"Lebanon",code:"LB"},{name:"Lesotho",code:"LS"},{name:"Liberia",code:"LR"},{name:"Libyan Arab Jamahiriya",code:"LY"},{name:"Liechtenstein",code:"LI"},{name:"Lithuania",code:"LT"},{name:"Luxembourg",code:"LU"},{name:"Macao",code:"MO"},{name:"Macedonia, The Former Yugoslav Republic of",code:"MK"},{name:"Madagascar",code:"MG"},{name:"Malawi",code:"MW"},{name:"Malaysia",code:"MY"},{name:"Maldives",code:"MV"},{name:"Mali",code:"ML"},{name:"Malta",code:"MT"},{name:"Marshall Islands",code:"MH"},{name:"Martinique",code:"MQ"},{name:"Mauritania",code:"MR"},{name:"Mauritius",code:"MU"},{name:"Mayotte",code:"YT"},{name:"Mexico",code:"MX"},{name:"Micronesia, Federated States of",code:"FM"},{name:"Moldova, Republic of",code:"MD"},{name:"Monaco",code:"MC"},{name:"Mongolia",code:"MN"},{name:"Montserrat",code:"MS"},{name:"Morocco",code:"MA"},{name:"Mozambique",code:"MZ"},{name:"Myanmar",code:"MM"},{name:"Namibia",code:"NA"},{name:"Nauru",code:"NR"},{name:"Nepal",code:"NP"},{name:"Netherlands",code:"NL"},{name:"Netherlands Antilles",code:"AN"},{name:"New Caledonia",code:"NC"},{name:"New Zealand",code:"NZ"},{name:"Nicaragua",code:"NI"},{name:"Niger",code:"NE"},{name:"Nigeria",code:"NG"},{name:"Niue",code:"NU"},{name:"Norfolk Island",code:"NF"},{name:"Northern Mariana Islands",code:"MP"},{name:"Norway",code:"NO"},{name:"Oman",code:"OM"},{name:"Pakistan",code:"PK"},{name:"Palau",code:"PW"},{name:"Palestinian Territory, Occupied",code:"PS"},{name:"Panama",code:"PA"},{name:"Papua New Guinea",code:"PG"},{name:"Paraguay",code:"PY"},{name:"Peru",code:"PE"},{name:"Philippines",code:"PH"},{name:"Pitcairn",code:"PN"},{name:"Poland",code:"PL"},{name:"Portugal",code:"PT"},{name:"Puerto Rico",code:"PR"},{name:"Qatar",code:"QA"},{name:"Reunion",code:"RE"},{name:"Romania",code:"RO"},{name:"Russian Federation",code:"RU"},{name:"RWANDA",code:"RW"},{name:"Saint Helena",code:"SH"},{name:"Saint Kitts and Nevis",code:"KN"},{name:"Saint Lucia",code:"LC"},{name:"Saint Pierre and Miquelon",code:"PM"},{name:"Saint Vincent and the Grenadines",code:"VC"},{name:"Samoa",code:"WS"},{name:"San Marino",code:"SM"},{name:"Sao Tome and Principe",code:"ST"},{name:"Saudi Arabia",code:"SA"},{name:"Senegal",code:"SN"},{name:"Serbia",code:"RS"},{name:"Montenegro",code:"ME"},{name:"Seychelles",code:"SC"},{name:"Sierra Leone",code:"SL"},{name:"Singapore",code:"SG"},{name:"Slovakia",code:"SK"},{name:"Slovenia",code:"SI"},{name:"Solomon Islands",code:"SB"},{name:"Somalia",code:"SO"},{name:"South Africa",code:"ZA"},{name:"South Georgia and the South Sandwich Islands",code:"GS"},{name:"Spain",code:"ES"},{name:"Sri Lanka",code:"LK"},{name:"Sudan",code:"SD"},{name:"Suriname",code:"SR"},{name:"Svalbard and Jan Mayen",code:"SJ"},{name:"Swaziland",code:"SZ"},{name:"Sweden",code:"SE"},{name:"Switzerland",code:"CH"},{name:"Syrian Arab Republic",code:"SY"},{name:"Taiwan, Province of China",code:"TW"},{name:"Tajikistan",code:"TJ"},{name:"Tanzania, United Republic of",code:"TZ"},{name:"Thailand",code:"TH"},{name:"Timor-Leste",code:"TL"},{name:"Togo",code:"TG"},{name:"Tokelau",code:"TK"},{name:"Tonga",code:"TO"},{name:"Trinidad and Tobago",code:"TT"},{name:"Tunisia",code:"TN"},{name:"Turkey",code:"TR"},{name:"Turkmenistan",code:"TM"},{name:"Turks and Caicos Islands",code:"TC"},{name:"Tuvalu",code:"TV"},{name:"Uganda",code:"UG"},{name:"Ukraine",code:"UA"},{name:"United Arab Emirates",code:"AE"},{name:"United Kingdom",code:"GB"},{name:"United States",code:"US"},{name:"United States Minor Outlying Islands",code:"UM"},{name:"Uruguay",code:"UY"},{name:"Uzbekistan",code:"UZ"},{name:"Vanuatu",code:"VU"},{name:"Venezuela",code:"VE"},{name:"Viet Nam",code:"VN"},{name:"Virgin Islands, British",code:"VG"},{name:"Virgin Islands, U.S.",code:"VI"},{name:"Wallis and Futuna",code:"WF"},{name:"Western Sahara",code:"EH"},{name:"Yemen",code:"YE"},{name:"Zambia",code:"ZM"},{name:"Zimbabwe",code:"ZW"}],a=$(document).find(".countrypicker"),n="";for(i=0;i<a.length;i++)flag=a.eq(i).data("flag"),flag?(n="",$.each(e,function(e,a){var o="{{asset('public/css/flags')}}/"+a.code+".png";n+="<option data-country-code='"+a.code+"' data-tokens='"+a.code+" "+a.name+"' style='padding-left:25px; background-position: 4px 7px; background-image:url("+o+");background-repeat:no-repeat;' value='"+a.name+"'>"+a.name+"</option>"}),a.eq(i).on("loaded.bs.select",function(e){var a=$(this).closest(".btn-group").children(".btn");a.hide();var n=$(this).find(":selected").data("country-code"),o="{{asset('public/css/flags')}}/"+n+".png";a.css("background-size","20px"),a.css("background-position","10px 9px"),a.css("padding-left","40px"),a.css("background-repeat","no-repeat"),a.css("background-image","url('"+o+"'"),a.show()}),a.eq(i).on("change",function(){button=$(this).closest(".btn-group").children(".btn"),def=$(this).find(":selected").data("country-code"),flagIcon="{{asset('public/css/flags')}}/"+def+".png",button.css("background-size","20px"),button.css("background-position","10px 9px"),button.css("padding-left","40px"),button.css("background-repeat","no-repeat"),button.css("background-image","url('"+flagIcon+"'")})):(n="",$.each(e,function(e,a){n+="<option data-country-code='"+a.code+"' data-tokens='"+a.code+" "+a.name+"' value='"+a.name+"'>"+a.name+"</option>"})),a.eq(i).html(n),def=a.eq(i).data("default"),def&&a.eq(i).val(def)});
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            // hiddenInput: "full_number",
            // initialCountry: "auto",
            // localizedCountries: { 'de': 'Deutschland' },
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            // preferredCountries: ['cn', 'jp'],
            // separateDialCode: true,
            utilsScript: "{{asset('public/js/utils.js')}}",
        });
    </script>
    <script>
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches


        $(document).ready(function () {

            $('.MemberShip').on('click',function () {
                console.log($(this).attr('data-price'));
                $('#MemberShip').val($(this).attr('data-id'));
                $('#MemberShipPrice').val($(this).attr('data-price'));
                $('#MemberShipName').val($(this).attr('data-name'));
                $('#MemberShip_text').html($(this).attr('data-name'));
                if($(this).attr('data-price') === '0'){
                    signupfree();
                }
            });

            $('.payment').on('click',function () {
                $('.payment').removeClass('PaymentActive');
                $(this).addClass('PaymentActive');
                $('#BillingType').val($(this).attr('data-name'));
            });
            $('#AccountInformation').on('click',function () {
                $('#name_text').html($('#first_name').val() +' ' +$('#second_name').val());
                $('#email_text').html($('#email').val() );
                $('#country_text').html($('#country').val() );
                $('#address_text').html($('#address').val() );
                $('#address2_text').html($('#address2').val() );
                $('#city_text').html($('#city').val() );
                $('#postal_code_text').html($('#postal_code').val() );
                $('#phone_number_text').html($('#phone_number').val() );
                $('#setup_fee_text').html(' 0' );
                $('#MemberShipPrice_text').html($('#MemberShipPrice').val() );
                $('#TotalPrice_text').html($('#MemberShipPrice').val() );
            });
            $('#BillingInformation').on('click',function () {
                $('#BillingType_text').html($('#BillingType').val() );
                $('#card_number_text').html($('#card_number').val() );
                $('#expiration_month_text').html($('#expiration_month').val() );
                $('#expiration_year_text').html($('#expiration_year').val() );
            });
            $('#Submit').on('click',function (e) {
                e.preventDefault();
                if(!$('#inlineCheckbox1')[0].checked){
                    alert('you have to accept .!');
                    return;
                }
                let dataString = new FormData();
                dataString.append('membership_id', $('#MemberShip').val());
                dataString.append('first_name', $('#first_name').val());
                dataString.append('second_name', $('#second_name').val());
                dataString.append('email', $('#email').val());
                dataString.append('country', $('#country').val());
                dataString.append('password', $('#password').val());
                dataString.append('password_confirmation', $('#password_confirmation').val());
                dataString.append('address', $('#address').val());
                dataString.append('address2', $('#address2').val());
                dataString.append('city', $('#city').val());
                dataString.append('state_province', $('#state_province').val());
                dataString.append('postal_code', $('#postal_code').val());
                dataString.append('phone_number', $('#phone_number').val());
                if($('#MemberShipPrice').val() !=='0'){
                    dataString.append('billing_type', $('#BillingType').val());
                    dataString.append('payment_first_name', $('#payment_first_name').val());
                    dataString.append('payment_second_name', $('#payment_second_name').val());
                    dataString.append('card_number', $('#card_number').val());
                    dataString.append('expiration_month', $('#expiration_month').val());
                    dataString.append('expiration_year', $('#expiration_year').val());
                    dataString.append('security_code', $('#security_code').val());
                }

                $.ajax({
                    url: "{{ url('register') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: dataString,
                    async: true,
                    cache: true,
                    success: function(response) {
                        if(response.status){
                            window.location = '{{url('')}}';
                        }
                        else {
                        }
                    },
                    contentType: false,
                    processData: false

                });
            });
        });
        $(function() {
            $(".form-check-label").click(function() {
                $(this).toggleClass("active");
            });
        });
        function signupfree() {
            $(".sign-free").click(function() {
                $('#tab3').remove();
                $('#nav-tab3').remove();
                $('#tabs .nav-tabs ul li.nav-item').css('width','33.3%');
                // $('#tabs .nav-tabs ul li.nav-item').css('height','60px');
                // $('#tabs .nav-tabs ul li.nav-item').css('verticalAlign','middel');
                $('#nav-tab4').toggleClass('border-left');
            });
        };
        signupfree();

    </script>

@endsection
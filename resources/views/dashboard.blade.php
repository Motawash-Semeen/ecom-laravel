@extends('frontend.main_master')
@section('main_content')
    <br><br>
    <div class="body-content m-4">
        <div class="container">
            <div class="row">
                <div class="col-md-2 responsive-flex">
                    <img src="{{ Auth::user()->profile_photo_path ? url('upload/profile/' . Auth::user()->profile_photo_path) : asset('upload/profile/no_image.jpg') }}"
                        alt="" class="card-img-top" style="border-radius:50%; margin-bottom:20px" height="100%"
                        width="100%">
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('dashboard') }}"
                            class="btn btn-primary btn-sm btn-block @if (request()->is('dashboard')) active @endif">Home</a>
                        <a href="{{ url('profile') }}"
                            class="btn btn-primary btn-sm btn-block @if (request()->is('profile')) active @endif">Profile
                            Update</a>
                        <a href="{{ url('user-password') }}"
                            class="btn btn-primary btn-sm btn-block @if (request()->is('user-password')) active @endif">Change
                            Password</a>
                        <a href="{{ url('logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>
                <div class="col-md-1">


                </div>
                <div class="col-md-9">
                    <div class="card" style="width: 100%">
                        <div class="text-center">
                            @if (request()->is('dashboard'))
                                <h4>Welcome to Dashboard</h4>
                                <h4>{{ Auth::user()->name }}</h4>
                                <h5>{{ Auth::user()->email }}</h5>
                            @elseif (request()->is('profile'))
                                <h4>Profile Update</h4>
                            @elseif (request()->is('user-password'))
                                <h4>Password Update</h4>
                            @endif

                        </div>
                        @if (request()->is('profile'))
                            <div class="card-body">
                                <form action="{{ url('profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName">Name
                                            <span>*</span></label>
                                        <input type="text" name="name"
                                            class="form-control unicase-form-control text-input" id="exampleInputName"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail2">Email Address
                                            <span>*</span></label>
                                        <input type="email" name="email"
                                            class="form-control unicase-form-control text-input" id="exampleInputEmail2"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8 col-12">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="image" name="profile_photo_path"
                                                    class="form-control" value="{{ $user->profile_photo_path }}">
                                                <div class="help-block"></div>
                                            </div>

                                        </div>
                                        <div class="form-group col-lg-4 col-12">
                                            <img src="{{ $user->profile_photo_path ? url('upload/profile/' . $user->profile_photo_path) : asset('upload/profile/no_image.jpg') }}"
                                                alt="" id="showImage" style="width: 100px; height:100px;">

                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                    </div>
                                </form>
                                <br>
                                <br>
                                <br>
                            </div>
                        @elseif (request()->is('user-password'))
                            <div class="card-body">
                                <form action="{{ url('user-password') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="old_password" class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('old_password')
                                            <div class="form-control-feedback"><small>This field is
                                                    <code>required</code></small></div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="new_password" class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('new_password')
                                            <div class="form-control-feedback"><small>This field is
                                                    <code>required</code></small></div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="confirm_password" class="form-control"
                                                required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('confirm_password')
                                            <div class="form-control-feedback"><small>This field is
                                                    <code>required</code></small></div>
                                        @enderror

                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                    </div>
                                </form>
                                <br>
                                <br>
                                <br>
                            </div>
                        @endif
                    </div>
                    @if (request()->is('dashboard'))
                        <div class="mt-5" style="width: 100%; margin: 30px 0px;">
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-12">
                                    <div class="rounded">
                                        <div class="table-responsive table-borderless">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center">Order #</th>
                                                        <th style="text-align: center">Payment</th>
                                                        <th style="text-align: center">Status</th>
                                                        <th style="text-align: center">Total</th>
                                                        <th style="text-align: center">Created</th>
                                                        <th style="text-align: center; width:150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                    @if ($orders->count() == 0)
                                                        <tr>
                                                            <td colspan="6" class="text-center text-danger">No Data
                                                                Available</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($orders as $order)
                                                            <tr class="cell-1">
                                                                <td>#{{ $order->invoice_number }}</td>
                                                                <td>{{ $order->payment_method }}</td>
                                                                <td><span
                                                                        class="badge badge-warning badge-pill">{{ $order->status }}</span>
                                                                </td>
                                                                <td>${{ $order->amount }}</td>
                                                                <td>{{ date('F d, Y', $order->order_date) }}</td>
                                                                <td>
                                                                    <a href="{{ url('order-view/' . $order->id) }}"
                                                                        class="btn btn-sm btn-info" title="View"><i
                                                                            class="fa fa-eye"></i></a>
                                                                    <a href="{{ url('invoice_download/' . $order->id) }}"
                                                                        class="btn btn-sm btn-info" title="Invoice"><i
                                                                            class="fa fa-download"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                    @if (request()->is('order-view/*'))
                        <style>
                            
                            .card-track {
                                margin: auto;
                                width: 38%;
                                max-width: 600px;
                                padding: 4vh 0;
                                box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                border-top: 3px solid rgb(252, 103, 49);
                                border-bottom: 3px solid rgb(252, 103, 49);
                                border-left: none;
                                border-right: none;
                            }

                            @media(max-width:768px) {
                                .card {
                                    width: 90%;
                                }
                            }

                            .title {
                                color: rgb(252, 103, 49);
                                font-weight: 600;
                                margin-bottom: 2vh;
                                padding: 0 8% 0 6%;
                                font-size: initial;
                            }

                            #details {
                                font-weight: 400;
                            }

                            .info {
                                padding: 5% 8%;
                            }

                            .info .col-5 {
                                padding: 0;
                            }

                            #heading {
                                color: grey;
                                line-height: 6vh;
                            }

                            .pricing {
                                background-color: #ddd3;
                                padding: 2vh 8%;
                                font-weight: 400;
                                line-height: 2.5;
                            }

                            .pricing .col-3 {
                                padding: 0;
                            }

                            .total {
                                padding: 2vh 8%;
                                color: rgb(252, 103, 49);
                                font-weight: bold;
                            }

                            .total .col-3 {
                                padding: 0;
                            }

                            
                            .footer a {
                                color: rgb(252, 103, 49);
                            }

                            .footer .col-10,
                            .col-2 {
                                display: flex;
                                padding: 3vh 0 0;
                                align-items: center;
                            }

                            .footer .row {
                                margin: 0;
                            }

                            #progressbar {
                                margin-bottom: 3vh;
                                overflow: hidden;
                                color: rgb(252, 103, 49);
                                padding-left: 0px;
                                margin-top: 3vh
                            }

                            #progressbar li {
                                list-style-type: none;
                                font-size: x-small;
                                width: 25%;
                                float: left;
                                position: relative;
                                font-weight: 400;
                                color: rgb(160, 159, 159);
                            }

                            #progressbar #step1:before {
                                content: "";
                                color: rgb(252, 103, 49);
                                width: 5px;
                                height: 5px;
                                margin-left: 0px !important;
                                /* padding-left: 11px !important */
                            }

                            #progressbar #step2:before {
                                content: "";
                                color: #fff;
                                width: 5px;
                                height: 5px;
                                margin-left: 32%;
                            }

                            #progressbar #step3:before {
                                content: "";
                                color: #fff;
                                width: 5px;
                                height: 5px;
                                margin-right: 32%;
                                /* padding-right: 11px !important */
                            }

                            #progressbar #step4:before {
                                content: "";
                                color: #fff;
                                width: 5px;
                                height: 5px;
                                margin-right: 0px !important;
                                /* padding-right: 11px !important */
                            }

                            #progressbar li:before {
                                line-height: 29px;
                                display: block;
                                font-size: 12px;
                                background: #ddd;
                                border-radius: 50%;
                                margin: auto;
                                z-index: -1;
                                margin-bottom: 1vh;
                            }

                            #progressbar li:after {
                                content: '';
                                height: 2px;
                                background: #ddd;
                                position: absolute;
                                left: 0%;
                                right: 0%;
                                margin-bottom: 2vh;
                                top: 1px;
                                z-index: 1;
                            }

                            .progress-track {
                                padding: 0 8%;
                            }

                            #progressbar li:nth-child(2):after {
                                margin-right: auto;
                            }

                            #progressbar li:nth-child(1):after {
                                margin: auto;
                            }

                            #progressbar li:nth-child(3):after {
                                float: left;
                                width: 68%;
                            }

                            #progressbar li:nth-child(4):after {
                                margin-left: auto;
                                width: 132%;
                            }

                            #progressbar li.active {
                                color: black;
                            }

                            #progressbar li.active:before,
                            #progressbar li.active:after {
                                background: rgb(252, 103, 49);
                            }
                        </style>
                        <div class="">
                            <div class="title">Purchase Reciept</div>
                            <div class="info">
                                <div class="row">
                                    <div class="col-md-7" style="padding-left: 0px">
                                        <span id="heading">Date</span><br>
                                        <span id="details">{{ date("d F Y", $order->order_date) }}</span>
                                    </div>
                                    <div class="col-md-5 pull-right text-right" style="padding-right: 0px">
                                        <span id="heading">Order No.</span><br>
                                        <span id="details">{{ $order->invoice_number }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pricing">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px">
                                        <h5><b>Billing Address</b></h5>
                                        <address>{{ strtoupper($order->name) }}<br>{{ strtoupper($order->address) }}<br>{{ $order->area->post_office_name }}<br>{{ $order->city->city_name }}<br>{{ $order->division->division_name }}-{{ $order->post_code }}<br>Bangladesh</address>
                                    </div>
                                    <div class="col-md-8" style="padding-left: 25px">
                                        <div class="row">
                                            <h5><b>Order Summary</b></h5>
                                            <div class="col-md-9" style="padding-left: 0px">
                                                
                                                @foreach ($orderitems as $orderitem)
                                                <div id="name">{{ $orderitem->product->product_name_en }} ({{ $orderitem->qty }})</div>
                                                @endforeach
                                                <div id="name">Tax</div>
                                                @if ($order->discount)
                                                    <div id="name">Coupon Discount</div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 text-right" style="padding-right: 0px">
                                                @foreach ($orderitems as $orderitem)
                                                <div id="price">${{ $orderitem->price*$orderitem->qty }}</div>
                                                @endforeach
                                                <div id="price">${{ round($order->tax) }}</div>
                                                @if ($order->discount)
                                                <div id="price">(-) ${{ round($order->discount) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="total">
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3 text-right" style="padding-right: 0px"><big>${{ round($order->amount) }}</big></div>
                                </div>
                            </div>
                            <div class="tracking">
                                <div class="title">Tracking Order</div>
                            </div>
                            <div class="progress-track">
                                <ul id="progressbar">
                                    <li class="step0 @if ($order->status == 'pending') active @endif " id="step1">Ordered</li>
                                    <li class="step0 text-center @if ($order->status == 'confirmed') active @endif" id="step2">Confirmed</li>
                                    <li class="step0 text-right @if ($order->status == 'processing') active @endif" id="step3">Processing</li>
                                    <li class="step0 text-right @if ($order->status == 'picked') active @endif" id="step4">Delivered</li>
                                </ul>
                            </div>


                            <div class="footer" style="margin: 5rem 0px;">
                                <div class="row">
                                    <div class="col-md-12 text-center">Want any help? Please &nbsp;<a> contact us</a></div>
                                </div>


                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

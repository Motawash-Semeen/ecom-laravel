@extends('frontend.main_master')
@section('main_content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <form class="register-form" role="form" method="get" action="{{ url('checkout/store') }}">
                        @csrf
                        <div class="col-md-8">
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <div class="panel panel-default checkout-step-01">

                                    <div id="collapseOne" class="panel-collapse collapse in">

                                        <!-- panel-body  -->
                                        <div class="panel-body">
                                            <div class="row">

                                                <!-- guest-login -->
                                                <div class="col-md-6 col-sm-6 guest-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputName">Name:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputName" name="shipping_name" placeholder="Jhon Doe"
                                                            value="{{ Auth::user()->name }}">
                                                        @error('shipping_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputEmail">Email:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputEmail" name="shipping_email"
                                                            placeholder="example@gmail.com"
                                                            value="{{ Auth::user()->email }}">
                                                        @error('shipping_email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputPhone">Phone:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputPhone" name="shipping_phone" placeholder="01234567899">
                                                        @error('shipping_phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputPost">Post Code::
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inpuPost" name="post_code" placeholder="1234">
                                                        @error('post_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="inputDivision">Division:
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control unicase-form-control text-input"
                                                            id="inputDivision" name="division_id">
                                                            <option value="">Select Division</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">
                                                                    {{ $division->division_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!--form  -->

                                                </div>

                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputCity">City:
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control unicase-form-control text-input"
                                                            id="inputCity" name="city_id">
                                                            <option value="">Select City</option>
                                                        </select>
                                                        @error('city_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputArea">Area:
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control unicase-form-control text-input"
                                                            id="inputArea" name="area_id">
                                                            <option value="">Select Area</option>
                                                        </select>
                                                        @error('area_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputPhone">Address:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputPhone" name="address"
                                                            placeholder="Dhaka, Bangladesh">

                                                    </div>
                                                    @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div
                                                    class="col-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="inputPhone">Notes: </label>
                                                        <textarea name="notes" class="form-control unicase-form-control text-input" id="noteInput" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <!-- already-registered-login -->

                                            </div>

                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                <!-- checkout-step-01  -->


                            </div><!-- /.checkout-steps -->
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <div class="panel panel-default checkout-step-01">
                                    <!-- panel-heading -->

                                    <div id="collapseOne" class="panel-collapse collapse in">

                                        <!-- panel-body  -->
                                        <div class="panel-body">
                                            <div class="row">
                                                <!-- guest-login -->
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="shopping-cart-table ">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cart-description item text-center">Image
                                                                        </th>
                                                                        <th class="cart-product-name item text-center">
                                                                            Product Name</th>
                                                                        <th class="cart-qty item text-center">Quantity</th>
                                                                        <th class="cart-sub-total item text-center">Unit
                                                                            Price</th>
                                                                        <th class="cart-total last-item text-center">Total
                                                                        </th>
                                                                    </tr>
                                                                </thead><!-- /thead -->
                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="5">
                                                                            <hr>
                                                                            <div class="sub-total"
                                                                                style="text-align: end">
                                                                                <div class="shopping-cart-total">
                                                                                    <h5><b>Sub Total : </b><span
                                                                                            class="shop-total">{{ $subtotal }}</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="shopping-cart-total">
                                                                                    <h5><b>Tax : </b><span
                                                                                            class="shop-total">{{ $cartTax }}</span>
                                                                                    </h5>
                                                                                </div>
                                                                                @if (Session::has('coupon'))
                                                                                    <div class="shopping-cart-total">
                                                                                        <h5><b>Discount (12%) : </b><span
                                                                                                class="shop-total">{{ session()->get('coupon')['discount_amount'] }}</span>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="shopping-cart-total">
                                                                                        <h5><b>Grand Total : </b><span
                                                                                                class="shop-total">{{ session()->get('coupon')['totla_after_discount'] }}</span>
                                                                                        </h5>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="shopping-cart-total">
                                                                                        <h5><b>Grand Total : </b><span
                                                                                                class="shop-total">{{ $cartTotal }}</span>
                                                                                        </h5>
                                                                                    </div>
                                                                                @endif


                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>

                                                                    @foreach ($carts as $cart)
                                                                        <tr>
                                                                            <td>
                                                                                <img src="{{ asset('upload/products/' . $cart->options->image) }}"
                                                                                    alt=""
                                                                                    style="height: 50px; width: 60px;">
                                                                            </td>
                                                                            <td>
                                                                                <a href="">{{ $cart->name }}</a>
                                                                                <br>
                                                                                <small>Color:
                                                                                    {{ $cart->options->color }}</small>
                                                                                <br>
                                                                                @if ($cart->options->size != null)
                                                                                    <small>Size:
                                                                                        {{ $cart->options->size }}</small>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <h5><b>{{ $cart->qty }}</b></h5>
                                                                            </td>
                                                                            <td>
                                                                                <h5><b>{{ $cart->price }}</b></h5>
                                                                            </td>
                                                                            <td>
                                                                                <h5><b>{{ $cart->subtotal }}</b></h5>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody><!-- /tbody -->
                                                            </table><!-- /table -->
                                                        </div>
                                                    </div><!-- /.shopping-cart-table -->
                                                </div>
                                                <div class="text-end" style="text-align: right">
                                                    <button type="submit"
                                                        class="btn-upper btn btn-primary checkout-page-button checkout-continue text-right"
                                                        style="text-align: end">Continue</button>
                                                </div>

                                                <!-- already-registered-login -->
                                            </div>
                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                <!-- checkout-step-01  -->


                            </div><!-- /.checkout-steps -->
                        </div>
                        <div class="col-md-4">
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Select Payment Method
                                            </h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"
                                                style="display: flex;   align-items: center; justify-content: space-between;">
                                                <input type="radio" id="stripe" name="method" value="Stripe">
                                                <div class="">
                                                    <label for="stripe">Stripe</label><br>
                                                    <img src="{{ asset('frontend/assets/images/payments/2.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-4"
                                                style="display: flex;   align-items: center; justify-content: space-between;">

                                                <input type="radio" id="card" name="method" value="Card">
                                                <div class="">
                                                    <label for="card">Card</label><br>
                                                    <img src="{{ asset('frontend/assets/images/payments/4.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-4"
                                                style="display: flex;   align-items: center; justify-content: space-between;">

                                                <input type="radio" id="cod" name="method" value="COD">
                                                <div class="">
                                                    <label for="cod">COD</label><br>
                                                    <img src="{{ asset('frontend/assets/images/payments/6.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            @error('method')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <img src="{{ asset('frontend/assets/images/SSL.png') }}" alt=""
                                            style="width:100%; height:100%;">
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-progress-sidebar -->
                        </div>
                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <script>
        $(document).ready(function() {
            $('#inputDivision').change(function() {
                var division_id = $(this).val();
                if (division_id != null) {
                    $.ajax({
                        url: "/get/city",
                        type: "GET",
                        data: {
                            division_id: division_id
                        },
                        success: function(data) {
                            $('#inputArea').html('<option value="">Select Area</option>');
                            var html = '<option value="">Select City</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.city_name +
                                    '</option>';
                            });
                            $('#inputCity').html(html);
                        }
                    });
                } else {
                    alert('Please Select Division');
                }
            });
            $('#inputCity').change(function() {
                var city_id = $(this).val();
                if (city_id != null) {
                    $.ajax({
                        url: "/get/area",
                        type: "GET",
                        data: {
                            city_id: city_id
                        },
                        success: function(data) {
                            var html = '<option value="">Select Area</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v
                                    .post_office_name +
                                    '</option>';
                            });
                            $('#inputArea').html(html);
                        }
                    });
                } else {
                    alert('Please Select City');
                }
            });
        });
    </script>
@endsection

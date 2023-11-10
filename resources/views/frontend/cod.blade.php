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
              <form class="register-form require-validation" role="form" action="{{ url('/cod/payment') }}" method="post" id="payment-form">
                
                @csrf
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 5rem">
                                            <h4><mark>Our Customer Person will contact you soon.</mark></h4>

                                        </div>

                                        <input type="hidden" name="user_id" value="{{ $data['user_id'] }}">
                                        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                        <input type="hidden" name="city_id" value="{{ $data['city_id'] }}">
                                        <input type="hidden" name="area_id" value="{{ $data['area_id'] }}">
                                        <input type="hidden" name="address" value="{{ $data['address'] }}">
                                        <input type="hidden" name="shipping_name" value="{{ $data['shipping_name'] }}">
                                        <input type="hidden" name="shipping_email" value="{{ $data['shipping_email'] }}">
                                        <input type="hidden" name="shipping_phone" value="{{ $data['shipping_phone'] }}">
                                        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                        <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                    </div>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue text-right">Confirm ${{ Session::has('coupon') ? Session::get('coupon')['totla_after_discount'] : Cart::total() }}</button>
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
                                    <h4 class="unicase-checkout-title">Total Amount
                                    </h4>
                                </div>
                                <h2 class="price">$ {{ Session::has('coupon') ? Session::get('coupon')['totla_after_discount'] : Cart::total() }} </h2>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <img src="{{ asset('frontend/assets/images/SSL.png') }}" alt="" style="width:100%; height:100%;">
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

@endsection

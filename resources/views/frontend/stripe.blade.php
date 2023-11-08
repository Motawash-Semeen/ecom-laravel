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
                                        <div class="col-md-12 col-sm-12 guest-login">
                                                <div class="form-group">
                                                    <label class="info-title" for="inputName">Card Owner: 
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="inputName" name="shipping_name" placeholder="Jhon Doe" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="inputEmail">Card Number:
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="inputEmail" name="shipping_email" placeholder="example@gmail.com" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="form-group col-md-6 p-0" style="padding-left: 0px">
                                                    <div class="">
                                                        <label class="info-title" for="inputDate">Expiration Date: 
                                                            <span class="text-danger">*</span></label>
                                                    </div>
                                                    
                                                        <div class="col-md-6" style="padding-left: 0px">
                                                            <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputDate" name="shipping_phone" placeholder="MM">
                                                        </div>
                                                        <div class="col-md-6" style="padding-right: 0px">
                                                            <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="inputPhone" name="shipping_phone" placeholder="YY">
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-6 p-0" style="padding-right: 0px">
                                                    <label class="info-title" for="inputPhone">CVV : 
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="inputPhone" name="shipping_phone" placeholder="01234567899">
                                                </div>

                                            <!--form  -->        
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue text-right">Continue</button>
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
                                <h2 class="price">$ 123.00 </h2>
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

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
              <form class="register-form require-validation" role="form" action="{{ url('/stripe/payment') }}" method="post" data-cc-on-file="false"
              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                
                @csrf
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12 col-sm-12 guest-login">
                                                <div class="form-group required'">
                                                    <label class="info-title" for="card_name">Card Owner: 
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input card-name"
                                                        id="card_name" placeholder="Jhon Doe">
                                                        @error('card_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="form-group required'">
                                                    <label class="info-title" for="card_number">Card Number:
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input card-number"
                                                        id="card_number" name="card_number" size='20'>
                                                        @error('card_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="form-group col-md-6 p-0 required'" style="padding-left: 0px">
                                                    <div class="">
                                                        <label class="info-title" for="card_exp_month">Expiration Date: 
                                                            <span class="text-danger">*</span></label>
                                                    </div>
                                                    
                                                        <div class="col-md-6" style="padding-left: 0px">
                                                            <input type="text"
                                                            class="form-control unicase-form-control text-input card-expiry-month"
                                                            id="card_exp_month" placeholder="MM" name="card_exp_month" size='2'>
                                                            @error('card_exp_month')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        </div>
                                                        <div class="col-md-6" style="padding-right: 0px">
                                                            <input type="text"
                                                            class="form-control unicase-form-control text-input card-expiry-year"
                                                            id="card_exp_year" placeholder="YY" name="card_exp_year" size='4'>
                                                            @error('card_exp_year')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-6 p-0 required'" style="padding-right: 0px">
                                                    <label class="info-title" for="cvc">CVV : 
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input card-cvc"
                                                        id="cvc" name="cvc" placeholder="012" size='4'>
                                                        @error('cvc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class='form-row row'>
                                                    <div class='col-md-12 error form-group hide'>
                                                        <div class='alert-danger alert'>Please correct the errors and try
                                                            again.</div>
                                                    </div>
                                                </div>
                        
                                            <!--form  -->        
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
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue text-right">Pay Now ${{ Session::has('coupon') ? Session::get('coupon')['totla_after_discount'] : Cart::total() }}</button>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
  
    $(function() {
      
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        
        var $form = $(".require-validation");
         
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });
         
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
        
        });
          
        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                     
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
         
    });
    </script>
    
@endsection

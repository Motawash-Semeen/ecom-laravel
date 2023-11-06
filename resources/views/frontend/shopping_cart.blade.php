@extends('frontend.main_master')
@section('main_content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class='active'>Shopping Cart</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class="container">
    <div class="row ">
      <div class="shopping-cart">
        <div class="shopping-cart-table ">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="cart-romove item">Remove</th>
                  <th class="cart-description item">Image</th>
                  <th class="cart-product-name item">Product Name</th>
                  <th class="cart-edit item">Edit</th>
                  <th class="cart-qty item">Quantity</th>
                  <th class="cart-sub-total item">Subtotal</th>
                  <th class="cart-total last-item">Grandtotal</th>
                </tr>
              </thead><!-- /thead -->
              <tfoot>
                <tr>
                  <td colspan="7">
                    <div class="shopping-cart-btn">
                      <span class>
                        <a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
                          Shopping</a>
                        <a href="{{ request()->url() }}"
                          class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                          shopping cart</a>
                      </span>
                    </div><!-- /.shopping-cart-btn -->
                  </td>
                </tr>
              </tfoot>
              <tbody id="cart-main">
                {{-- @if($cartQty > 0)
                @foreach ($carts as $cart)
                @php
                $product = App\Models\Product::where('id', $cart->id)->first();
                @endphp
                <tr>
                  <td class="romove-item"><button type="submit" title="cancel" class="icon" onclick="miniCartRemove(this.id)" id="{{ $cart->rowId }}"><i
                        class="fa fa-trash-o"></i></button></td>
                  <td class="cart-image">
                    <a class="entry-thumbnail" href="{{url('product-details/'.$cart->id.'/'.$product->product_slug_en)}}">
                      <img src="{{ asset('upload/products/'.$cart->options->image) }}" alt>
                    </a>
                  </td>
                  <td class="cart-product-name-info">
                    <h4 class='cart-product-description'><a href="{{url('product-details/'.$cart->id.'/'.$product->product_slug_en)}}" class="modal-title">{{ session()->get('lang')=='bn' ? $product->product_name_bn : $product->product_name_en }}</a></h4>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="rating rateit-small"></div>
                      </div>
                      <div class="col-sm-8">
                        <div class="reviews">
                          (06 Reviews)
                        </div>
                      </div>
                    </div><!-- /.row -->
                    <div class="cart-product-info">
                      <span class="product-color">COLOR:<span>{{ $cart->options->color }}</span></span>
                      @if($cart->options->size != NULL)
                      <span class="product-color" style="margin-left: 10px;">SIZE:<span>{{ $cart->options->size }}</span></span>
                      @endif
                    </div>
                  </td>
                  <td class="cart-product-edit"><a href="#" class="product-edit">Edit</a></td>
                  <td class="cart-product-quantity">
                    <div class="quant-input">
                      <input type="hidden" name="product_id" id="product_id" value="{{ $cart->id }}">
                      <input type="number" value="{{ $cart->qty }}" min="1" max="{{ $product->product_qty }}" onchange="updateCart('{{ $cart->rowId }}')" id="quntyControl-{{ $cart->rowId }}">
                    </div>
                  </td>
                  <td class="cart-product-sub-total"><span class="cart-sub-total-price">${{ ($cart->price) }}</span></td>
                  <td class="cart-product-grand-total"><span
                      class="cart-grand-total-price">${{ $cart->price*$cart->qty }}</span></td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="7">
                        <p class="text-center">Your Shopping Cart is empty</p>
                      <!-- /.shopping-cart-btn -->
                  </td>
                </tr>
                @endif --}}
                @if($cartQty <= 0)
                <tr>
                  <td colspan="7">
                        <p class="text-center">Your Shopping Cart is empty</p>
                      <!-- /.shopping-cart-btn -->
                  </td>
                </tr>
                @else
                @endif

              </tbody><!-- /tbody -->
            </table><!-- /table -->
          </div>
        </div><!-- /.shopping-cart-table --> 
        <div class="col-md-4 col-sm-12 estimate-ship-tax">
          <table class="table">
            <thead>
              <tr>
                <th>
                  {{ Session::has('coupon') ? Session::get('coupon')['total_amount'] : '' }}
                  <span class="estimate-title">Estimate shipping and tax</span>
                  <p>Enter your destination to get shipping and tax.</p>
                </th>
              </tr>
            </thead><!-- /thead -->
            <tbody>
              <tr>
                <td>
                  <div class="form-group">
                    <label class="info-title control-label">Country <span>*</span></label>
                    <select class="form-control unicase-form-control selectpicker">
                      <option>--Select options--</option>
                      <option>India</option>
                      <option>SriLanka</option>
                      <option>united kingdom</option>
                      <option>saudi arabia</option>
                      <option>united arab emirates</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="info-title control-label">State/Province <span>*</span></label>
                    <select class="form-control unicase-form-control selectpicker">
                      <option>--Select options--</option>
                      <option>TamilNadu</option>
                      <option>Kerala</option>
                      <option>Andhra Pradesh</option>
                      <option>Karnataka</option>
                      <option>Madhya Pradesh</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="info-title control-label">Zip/Postal Code</label>
                    <input type="text"
                      class="form-control unicase-form-control text-input" placeholder>
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.estimate-ship-tax -->

        <div class="col-md-4 col-sm-12 estimate-ship-tax" id="cupon-main">
          {{-- @if(Session::has('coupon'))
          @else --}}
          {{-- <table class="table">
            <thead>
              <tr>
                <th>
                  <span class="estimate-title">Discount Code</span>
                  <p>Enter your coupon code if you have one..</p>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="form-group">
                    <input type="text"
                      class="form-control unicase-form-control text-input"
                      placeholder="You Coupon.." id="cupon_code">
                  </div>
                  <div class="clearfix pull-right">
                    <button type="submit" class="btn-upper btn btn-primary" onclick="applyCupon()">APPLY COUPON</button>
                  </div>
                </td>
              </tr>
            </tbody><!-- /tbody -->
          </table><!-- /table --> --}}
          {{-- @endif --}}
        </div><!-- /.estimate-ship-tax -->

        
        <div class="col-md-4 col-sm-12 cart-shopping-total">
          
          <table class="table">
            <thead>
              <tr id="priceShow">
                <th>
                  {{-- <div class="cart-sub-total">
                    Subtotal<span class="inner-left-md">${{ $subtotal }}</span>
                  </div>
                  <div class="cart-sub-total">
                    Tax<span class="inner-left-md">${{ $tax }}</span>
                  </div>
                  <div class="cart-grand-total">
                    Grand Total<span class="inner-left-md">${{ $cartTotal }}</span>
                  </div> --}}
                  <div class="cart-sub-total">
                    Subtotal<span class="inner-left-md sub-totals">$0.00</span>
                  </div>
                  <div class="cart-sub-total">
                    Tax<span class="inner-left-md total-tax">$0.00</span>
                  </div>
                  <div class="cart-grand-total">
                    Grand Total<span class="inner-left-md grnd-total">$0.00</span>
                  </div>
                </th>
              </tr>
            </thead><!-- /thead -->
            <tbody>
              <tr>
                <td>
                  <div class="cart-checkout-btn pull-right">
                    <button type="submit" class="btn btn-primary checkout-btn">PROCCED
                      TO CHEKOUT</button>
                    <span class>Checkout with multiples address!</span>
                  </div>
                </td>
              </tr>
            </tbody><!-- /tbody -->
          </table><!-- /table -->
        </div><!-- /.cart-shopping-total -->
        

      </div><!-- /.shopping-cart -->
    </div> <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
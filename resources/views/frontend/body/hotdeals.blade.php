<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
  <h3 class="section-title">hot deals</h3>
  <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
    @foreach ($hotdeals as $hotdeal)
    <div class="item">
        <div class="products">
            <div class="hot-deal-wrapper">
                <div class="image"> <img
                        src="{{ asset('upload/products/'.$hotdeal->product_thambnail) }}"
                        alt=""> </div>
                <div class="sale-offer-tag"><span>{{ $hotdeal->discount_price }}%<br>
                        off</span></div>
                <div class="timing-wrapper">
                    <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span
                                class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span
                                class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span
                                class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span
                                class="value">SEC</span> </div>
                    </div>
                </div>
            </div>
            <!-- /.hot-deal-wrapper -->

            <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{url('product-details/'.$hotdeal->id.'/'.$hotdeal->product_slug_en)}}">{{ session()->get('lang')=='bn' ? mb_substr($hotdeal->product_name_bn, 0, 20, 'UTF-8') : substr($hotdeal->product_name_en, 0, 20) }}...</a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price">  @if($hotdeal->discount_price == NULL)
                    <span class="price"> $ {{ $hotdeal->selling_price }} </span>
                    @else
                    @php
                    $sellingPrice = floatval($hotdeal->selling_price);
                    $discount = floatval($hotdeal->discount_price);
                    $discountedPrice = $sellingPrice - ($sellingPrice * $discount / 100);
                @endphp

                <span class="price">$ {{ number_format($discountedPrice, 2) }}</span>
                <span class="price-before-discount">$ {{ number_format($sellingPrice, 2) }}</span>
                    @endif </div>
                <!-- /.product-price -->

            </div>
            <!-- /.product-info -->

            <div class="cart clearfix animate-effect">
                <div class="action">
                    <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown"
                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to
                            cart</button>
                    </div>
                </div>
                <!-- /.action -->
            </div>
            <!-- /.cart -->
        </div>
    </div>
    @endforeach
      
  </div>
  <!-- /.sidebar-widget -->
</div>
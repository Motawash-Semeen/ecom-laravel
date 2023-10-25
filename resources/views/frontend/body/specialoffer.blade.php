<div class="sidebar-widget outer-bottom-small wow fadeInUp">
  <h3 class="section-title">Special Offer</h3>
  <div class="sidebar-widget-body outer-top-xs">
      <div
          class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
          <div class="item">
            <div class="products special-product">
                @foreach ($offers as $offer)
                <div class="product" style="margin: 1rem 0rem;">
                    <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col col-xs-5">
                                <div class="product-image">
                                    <div class="image"> <a href="#"> <img
                                                src="{{ asset('upload/products/'.$offer->product_thambnail) }}"
                                                alt=""> </a> </div>
                                    <!-- /.image -->

                                </div>
                                <!-- /.product-image -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-xs-7">
                                <div class="product-info">
                                    <h3 class="name"><a href="{{url('product-details/'.$offer->id.'/'.$offer->product_slug_en)}}">{{ session()->get('lang')=='bn' ? mb_substr($offer->product_name_bn, 0, 20, 'UTF-8') : substr($offer->product_name_en, 0, 20) }}...</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price"> @if($offer->discount_price == NULL)
                                        <span class="price"> $ {{ $offer->selling_price }} </span>
                                        @else
                                        @php
                                        $sellingPrice = floatval($offer->selling_price);
                                        $discount = floatval($offer->discount_price);
                                        $discountedPrice = $sellingPrice - ($sellingPrice * $discount / 100);
                                    @endphp
    
                                    <span class="price">$ {{ number_format($discountedPrice, 2) }}</span>
                                    
                                        @endif </div>
                                    <!-- /.product-price -->

                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                </div>
                @endforeach
            </div>
        </div>
          
      </div>
      
  </div>
  <!-- /.sidebar-widget-body -->
</div>
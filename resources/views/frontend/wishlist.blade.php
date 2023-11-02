@extends('frontend.main_master')
@section('main_content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
  <div class="body-content">
      <div class="container">
          <div class="my-wishlist-page">
              <div class="row">
                  <div class="col-md-12 my-wishlist">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th colspan="4" class="heading-title">My Wishlist</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($wishlists as $wishlist)
                                <tr>
                                  <td class="col-md-2"><img src="{{ asset('upload/products/'.$wishlist->product->product_thambnail) }}"
                                          alt="imga"></td>
                                  <td class="col-md-7">
                                      <div class="product-name"><a href="{{url('product-details/'.$wishlist->product->id.'/'.$wishlist->product->product_slug_en)}}">{{ session()->get('lang')=='bn' ? $wishlist->product->product_name_bn : $wishlist->product->product_name_en }}</a></div>
                                      <div class="rating">
                                          <i class="fa fa-star rate"></i>
                                          <i class="fa fa-star rate"></i>
                                          <i class="fa fa-star rate"></i>
                                          <i class="fa fa-star rate"></i>
                                          <i class="fa fa-star non-rate"></i>
                                          <span class="review">( 06 Reviews )</span>
                                      </div>
                                      @if($wishlist->product->discount_price == NULL)
                                        <div class="price"> $ {{ $wishlist->product->selling_price }} </div>
                                        @else
                                        @php
                                        $sellingPrice = floatval($wishlist->product->selling_price);
                                        $discount = floatval($wishlist->product->discount_price);
                                        $discountedPrice = $sellingPrice - ($sellingPrice * $discount / 100);
                                    @endphp

                                    <div class="price">$ {{ number_format($discountedPrice, 2) }} <span>$ {{ number_format($sellingPrice, 2) }}</span></div>
                                    
                                        @endif 
                                  </td>
                                  <td class="col-md-2">
                                      <input type="hidden" name="product_id" id="product_id" value="{{ $wishlist->product->id }}">
                                      <button class="btn-upper btn btn-primary" type="button"
                                      title="Add Cart" data-toggle="modal" data-target="#cartModal" id="{{ $wishlist->product->id }}" onclick="productView(this.id)">Add to cart</button>
                                  </td>
                                  <td class="col-md-1 close-btn">
                                      <a href="{{ url('/remove-product/wishlist/'.$wishlist->product->id) }}" class><i class="fa fa-times"></i></a>
                                  </td>
                              </tr>
                                @endforeach

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.sigin-in-->
      </div><!-- /.container -->
  </div><!-- /.body-content -->
  @include('frontend.body.brands')
@endsection

@extends('frontend.main_master')
@section('main_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="#">{{ $oneproduct->categories->category_name }}</a></li>
				<li class='active'>{{ $oneproduct->product_name_en }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n" style="margin-bottom: 30px;">
                        <img src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>

                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.body.hotdeals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    @include('frontend.body.newsletter')<!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    @include('frontend.body.testimonials')

                    <!-- ============================================== Testimonials: END ============================================== -->



                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                              @php
                              $i=1;
                            @endphp
                                <div id="owl-single-product">
                                  <div class="single-product-gallery-item" id="slide0">
                                    <a data-lightbox="image-1" data-title="Gallery"
                                        href="{{ asset('upload/products/'.$oneproduct->product_thambnail) }}">
                                        <img class="img-responsive" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="{{ asset('upload/products/'.$oneproduct->product_thambnail) }}" />
                                    </a>
                                </div><!-- /.single-product-gallery-item -->
                                  @foreach ($oneproduct->multiImgs as $multiImg)
                                  @php
                              $i++;
                            @endphp
                                  <div class="single-product-gallery-item" id="slide{{$i}}">
                                    <a data-lightbox="image-1" data-title="Gallery"
                                        href="{{ asset('upload/products/'.$multiImg->photo_name) }}">
                                        <img class="img-responsive" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="{{ asset('upload/products/'.$multiImg->photo_name) }}" />
                                    </a>
                                  </div><!-- /.single-product-gallery-item -->
                                  @endforeach

                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                      <div class="item">
                                        <a class="horizontal-thumb" data-target="#owl-single-product"
                                            data-slide="0" href="#slide0">
                                            <img class="img-responsive" width="85" alt=""
                                                src="assets/images/blank.gif"
                                                data-echo="{{ asset('upload/products/'.$oneproduct->product_thambnail) }}" />
                                        </a>
                                    </div>
                                      @php
                                      $i=1;
                                    @endphp
                                      @foreach ($oneproduct->multiImgs as $multiImg)
                                  @php
                              $i++;
                            @endphp
                                  <div class="item">
                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                        data-slide="{{$i}}" href="#slide{{$i}}">
                                        <img class="img-responsive" width="85" alt=""
                                            src="assets/images/blank.gif"
                                            data-echo="{{ asset('upload/products/'.$multiImg->photo_name) }}" />
                                    </a>
                                </div>
                                  @endforeach
                                        
                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name modal-title">{{ session()->get('lang')=='bn' ? $oneproduct->product_name_bn : $oneproduct->product_name_en }}</h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    {{ session()->get('lang')=='bn' ? $oneproduct->short_descp_bn : $oneproduct->short_descp_en }}
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                {{-- <span class="price">$800.00</span>
                                                <span class="price-strike">$900.00</span> --}}

                                                @if($oneproduct->discount_price == NULL)
                                                    <span class="price"> ${{ $oneproduct->selling_price }} </span>
                                                    @else
                                                    @php
                                                    $sellingPrice = floatval($oneproduct->selling_price);
                                                    $discount = floatval($oneproduct->discount_price);
                                                    $discountedPrice = $sellingPrice - ($sellingPrice * $discount / 100);
                                                @endphp

                                                <span class="price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="price-strike">$ {{ number_format($sellingPrice, 2) }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                {{-- Add Product Color and Product Size --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="colorControl">Choose Color</label>
                                        <select class="form-control" id="colorControl">
                                            @foreach ($oneproduct->product_color_en as $color)
                                            <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($oneproduct->product_size_en != '')
                                    <div class="col-md-6">
                                        <label for="sizeControl">Choose Size</label>
                                        <select class="form-control" id="sizeControl">
                                            @foreach ($oneproduct->product_size_en as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    
                                </div>

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    
                                                    <input type="number" value="1" min="1" id="quntyControl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <input type="hidden" name="product_id" id="product_id" value="{{ $oneproduct->id }}">
                                            <button class="btn btn-primary" onclick="addToCart()"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->






                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! session()->get('lang')=='bn' ? $oneproduct->long_descp_bn : $oneproduct->long_descp_en !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span class="summary">We love this
                                                            product</span><span class="date"><i
                                                                class="fa fa-calendar"></i><span>1 days
                                                                ago</span></span></div>
                                                    <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.Aliquam suscipit."</div>
                                                </div>

                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->



                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality"
                                                                        class="radio" value="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table><!-- /.table .table-bordered -->
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                <div class="form-container">
                                                    <form role="form" class="cnt-form">

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Your Name <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputName" placeholder="">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Summary <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputSummary" placeholder="">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Review <span
                                                                            class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->

                                                        <div class="action text-right">
                                                            <button class="btn btn-primary btn-upper">SUBMIT
                                                                REVIEW</button>
                                                        </div><!-- /.action -->

                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Product Tags</h4>
                                        <div class="sidebar-widget-body outer-top-xs" style="margin-bottom:10px;">
                                            <div class="tag-list">
                                                @php
                                                    session()->get('lang')=='bn' ? $tags = $oneproduct->product_tags_bn : $tags = $oneproduct->product_tags_en;
                                                @endphp 
                                                @foreach ($tags_en as $tag)
                                                <a class="item" title="{{strtoupper($tag)}}" href="category.html">{{ $tag }}</a>  
                                                @endforeach
                                                
                                                
                                            </div>
                                            <!-- /.tag-list --> 
                                          </div>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag"
                                                        class="form-control txt">


                                                </div>

                                                <button class="btn btn-upper btn-primary" type="submit">ADD
                                                    TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                    single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                @if ($related->count() > 0)
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">upsell products</h3>
                    <div
                        class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                        

                        @foreach ($related as $product)
                        <div class="item item-carousel">
                          <div class="products">
                              <div class="product">
                                  <div class="product-image">
                                      <div class="image">
                                          <a href="{{url('product-details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{ asset('upload/products/'.$product->product_thambnail) }}"
                                                  alt=""></a>
                                      </div><!-- /.image -->

                                      <div class="tag sale"><span>sale</span></div>
                                  </div><!-- /.product-image -->

                                  <div class="product-info text-left">
                                      <h3 class="name"><a href="{{url('product-details/'.$product->id.'/'.$product->product_slug_en)}}">{{ session()->get('lang')=='bn' ? mb_substr($product->product_name_bn, 0, 20, 'UTF-8') : substr($product->product_name_en, 0, 20) }}...</a></h3>
                                      <div class="rating rateit-small"></div>
                                      <div class="description"></div>

                                      <div class="product-price">
                                        @if($product->discount_price == NULL)
                                        <span class="price"> $ {{ $product->selling_price }} </span>
                                        @else
                                        @php
                                        $sellingPrice = floatval($product->selling_price);
                                        $discount = floatval($product->discount_price);
                                        $discountedPrice = $sellingPrice - ($sellingPrice * $discount / 100);
                                        @endphp
                                        <span class="price">$ {{ number_format($discountedPrice, 2) }}</span>
                                        <span class="price-before-discount">$ {{ number_format($sellingPrice, 2) }}</span>
                                            @endif
                                      </div><!-- /.product-price -->

                                  </div><!-- /.product-info -->
                                  <div class="cart clearfix animate-effect">
                                      <div class="action">
                                          <ul class="list-unstyled">
                                              <li class="add-cart-button btn-group">
                                                  <button class="btn btn-primary icon" data-toggle="dropdown"
                                                      type="button">
                                                      <i class="fa fa-shopping-cart"></i>
                                                  </button>
                                                  <button class="btn btn-primary cart-btn" type="button">Add to
                                                      cart</button>

                                              </li>

                                              <li class="lnk wishlist">
                                                  <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                      <i class="icon fa fa-heart"></i>
                                                  </a>
                                              </li>

                                              <li class="lnk">
                                                  <a class="add-to-cart" href="detail.html" title="Compare">
                                                      <i class="fa fa-signal"></i>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div><!-- /.action -->
                                  </div><!-- /.cart -->
                              </div><!-- /.product -->

                          </div><!-- /.products -->
                      </div><!-- /.item -->
                        @endforeach

                        
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                @endif
                
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->

        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')<!-- /.logo-slider -->
        <!-- == = BRANDS CAROUSEL : END = -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
@extends('frontend.main_master')
@section('main_content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.body.navigation')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Camera </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Desktops </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Pants </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Bags </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Hats </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> Accessories </a>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <li><a href="#">gaming</a></li>
                                                        <li><a href="#">office</a></li>
                                                        <li><a href="#">kids</a></li>
                                                        <li><a href="#">for women</a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                        <!-- /.accordion-group -->

                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder"> <span class="min-max">
                                            <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span>
                                        </span>
                                        <input type="text" id="amount"
                                            style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                        <input type="text" class="price-slider" value>
                                    </div>
                                    <!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->
                            <!-- ============================================== MANUFACTURES============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Brands</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        @foreach ($brands as $brand)
                                        <li><a href="#">{{ session()->get('lang')=='bn' ? $brand->brand_name_bn : $brand->brand_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== MANUFACTURES: END ============================================== -->
                            <!-- ============================================== COLOR============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        @php
                                            session()->get('lang')=='bn' ? $colors = $color_bn : $colors = $color_en;
                                        @endphp
                                        @foreach ($colors as $color)
                                        <li><a href="#">{{ $color }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COLOR: END ============================================== -->
                            <!-- ============================================== COMPARE============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('frontend.body.producttag')
                            <!-- /.sidebar-widget -->
                            <!----------- Testimonials------------->
                            @include('frontend.body.testimonials')

                            <!-- ============================================== Testimonials: END ============================================== -->

                            <div class="home-banner"> <img
                                    src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                            </div>
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img src="{{ asset('frontend') }}/assets/images/banners/cat-banner-1.jpg"
                                    alt class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off
                                    </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>

                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                    class="btn dropdown-toggle"> Position <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest
                                                            first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest
                                                            first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A
                                                            to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                    class="btn dropdown-toggle"> 1 <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product-details/'.$product->id.'/'.$product->product_slug_en)}}"><img
                                                                    src="{{ asset('upload/products/'.$product->product_thambnail) }}"
                                                                    alt></a>
                                                        </div>
                                                        <!-- /.image -->

                                                        <div class="tag new"><span>new</span></div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{url('product-details/'.$product->id.'/'.$product->product_slug_en)}}">{{ session()->get('lang')=='bn' ? mb_substr($product->product_name_bn, 0, 50, 'UTF-8') : substr($product->product_name_en, 0, 50) }}...</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price"> @if($product->discount_price == NULL)
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
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon"
                                                                        data-toggle="dropdown" type="button"> <i
                                                                            class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a class="add-to-cart"
                                                                        href="detail.html" title="Wishlist"> <i
                                                                            class="icon fa fa-heart"></i> </a> </li>
                                                                <li class="lnk"> <a class="add-to-cart"
                                                                        href="detail.html" title="Compare"> <i
                                                                            class="fa fa-signal"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        @endforeach
                                        
                                        <!-- /.item -->

                                        <!-- /.item -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @foreach ($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img
                                                                    src="{{ asset('upload/products/'.$product->product_thambnail) }}"
                                                                    alt>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{url('product-details/'.$product->id.'/'.$product->product_slug_en)}}">{{ session()->get('lang')=='bn' ? $product->product_name_bn : $product->product_name_en }}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> @if($product->discount_price == NULL)
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
                                                            </div>
                                                            <!-- /.product-price -->
                                                            <div class="description m-t-10">{{ session()->get('lang')=='bn' ? $product->short_descp_bn: $product->short_descp_en }}</div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon"
                                                                                data-toggle="dropdown" type="button">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a class="add-to-cart"
                                                                                href="detail.html" title="Wishlist"> <i
                                                                                    class="icon fa fa-heart"></i> </a>
                                                                        </li>
                                                                        <li class="lnk"> <a class="add-to-cart"
                                                                                href="detail.html" title="Compare"> <i
                                                                                    class="fa fa-signal"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @endforeach
                                    
                                    <!-- /.category-product-inner -->

                                    <!-- /.category-product-inner -->

                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
@endsection

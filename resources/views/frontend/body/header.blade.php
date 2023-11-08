<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">

                        <li><a href="{{ url('/view/wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ url('/show/cart') }}"><i class="icon fa fa-shopping-cart"></i>@lang('words.cart')</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                        @if (Auth::user())
                            <li><a href="{{ url('dashboard') }}"><i class="icon fa fa-user"></i>My Account</a></li>
                        @else
                            <li><a href="{{ url('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
                        @endif

                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    @if (session()->get('lang') == 'bn')
                                        বাংলা
                                    @else
                                        English
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('lang') == 'bn')
                                    <li><a href="{{ url('language/en') }}">English</a></li>
                                @else
                                    <li><a href="{{ url('language/bn') }}">বাংলা</a></li>
                                @endif

                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend') }}/assets/images/logo.png"
                                alt="logo"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> 
                        <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">0</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span><span
                                            class="cartTotal">0.00</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary" id="miniCart">
                                    
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span
                                            class='total_price'>$600.00</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ url('/checkout') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" >Home</a> </li>
                                        @php
                                            $categories = App\Models\Category::orderBy('id', 'ASC')->get();

                                        @endphp
                                        {{-- <li class="dropdown hidden-sm"> <a href="category.html">Health & Beauty <span class="menu-label new-menu hidden-xs">new</span> </a> </li> --}}
                                @foreach ($categories as $category)
                                    @php
                                        $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
                                    @endphp
                                <li class="dropdown @if (count($subcategories) > 0) yamm mega-menu @else hidden-sm  @endif">
                                    <a href="category.html" @if (count($subcategories) > 0)
                                        data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown"
                                    @endif >{{ session()->get('lang')=='bn' ? $category->category_name_bn : $category->category_name }} <span
                                            class="menu-label hot-menu hidden-xs">hot</span> </a>
                                            @php
                                                $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
                                            @endphp
                                    @if (count($subcategories) > 0)
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    
                                                    @foreach ($subcategories as $subcategory)

                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <a style="padding:0px" href="{{ url('all-product/'.$subcategory->id.'/'.$category->category_slug.'/'.$subcategory->subcategory_slug) }}"><h2 class="title">{{ session()->get('lang')=='bn' ? $subcategory->subcategory_name_bn : $subcategory->subcategory_name }}</h2></a>
                                                        
                                                        <ul class="links">
                                                            @php
                                                                $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcategory->id)->orderBy('id', 'ASC')->get();
                                                            @endphp
                                                            @foreach ($subsubcategories as $subsubcategory)
                                                            <li><a href="{{ url('all-product/'.$subsubcategory->id.'/'.$category->category_slug.'/'.$subcategory->subcategory_slug.'/'.$subsubcategory->subsubcategory_slug) }}">{{ session()->get('lang')=='bn' ? $subsubcategory->subsubcategory_name_bn : $subsubcategory->subsubcategory_name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endforeach
                                                   
                                                    {{-- <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                        <a href="#"><img alt=""
                                                                src="{{ asset('frontend') }}/assets/images/banners/banner-side.png"></a>
                                                    </div> --}}
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                    @endif
                                    
                                </li>
                                @endforeach

                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays
                                        offer</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

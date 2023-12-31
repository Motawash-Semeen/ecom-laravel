@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    $route = explode('.', $route);
    //dd($prefix, $route);
@endphp

<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

      <div class="user-profile">
          <div class="ulogo">
              <a href="index.html">
                  <!-- logo for regular state and mobile devices -->
                  <div class="d-flex align-items-center justify-content-center">
                      <img src="{{ asset('backend') }}/images/logo-dark.png" alt="">
                      <h3><b>Ecom</b> Admin</h3>
                  </div>
              </a>
          </div>
      </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

          <li class="{{ $route[1]=='dashboard' ? 'active':'' }}">
              <a href="{{ url('admin/dashboard') }}">
                  <i data-feather="pie-chart"></i>
                  <span>Dashboard</span>
              </a>
          </li>

          <li class="treeview {{ $route[1]=='brands' ? 'active menu-open':'' }}">
              <a href="{{ url('admin/brand') }}">
                  <i data-feather="message-circle"></i>
                  <span>@lang('words.brand')</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu ">
                  <li class="{{ $route[1]=='brands' ? 'active':'' }}"><a href="{{ url('admin/brands') }}"><i class="ti-more"></i>All Brands</a></li>
              </ul>
          </li>
          <li class="treeview {{ $route[1]=='category' ? 'active menu-open':'' }}">
              <a href="{{ url('admin/category') }}">
                  <i data-feather="message-circle"></i>
                  <span>Category</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu ">
                  <li class="{{ $route[1]=='category' ? 'active':'' }}"><a href="{{ url('admin/category') }}"><i class="ti-more"></i>All Categories</a></li>
                  <li class="{{ $route[1]=='subCategory' ? 'active':'' }}"><a href="{{ url('admin/subCategory') }}"><i class="ti-more"></i>All Sub-Categories</a></li>
                  <li class="{{ $route[1]=='subSubCategory' ? 'active':'' }}"><a href="{{ url('admin/subSubCategory') }}"><i class="ti-more"></i>All Sub Sub-Categories</a></li>
              </ul>
          </li>

          <li class="treeview {{ $route[1]=='product' ? 'active menu-open':'' }}">
              <a href="{{ url('admin/product') }}">
                  <i data-feather="message-circle"></i>
                  <span>Products</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu ">
                  <li class="@if (isset($route[2]) && $route[2] === 'add' && $route[1] === 'product')
                      active
                  @endif"><a href="{{ url('admin/product/add') }}"><i class="ti-more"></i>Add Product</a></li>
                  <li class="@if (isset($route[2]) && $route[2] === 'manage' && $route[1] === 'product')
                  active
              @endif"><a href="{{ url('admin/product/manage') }}"><i class="ti-more"></i>Manage Products</a></li>
                  
              </ul>
          </li>

          <li class="treeview {{ $route[1]=='orders' ? 'active menu-open':'' }}">
            <a href="{{ url('admin/orders') }}">
                <i data-feather="message-circle"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu ">
                <li class="{{ $route[1]=='orders' ? 'active':'' }}"><a href="{{ url('admin/orders') }}"><i class="ti-more"></i>All Orders</a></li>
            </ul>
        </li>

          <li class="treeview {{ $route[1]=='slider' ? 'active menu-open':'' }}">
              <a href="{{ url('admin/slider') }}">
                  <i data-feather="message-circle"></i>
                  <span>Sliders</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu ">
                  <li class="{{ isset($route[1]) ? $route[1]=='slider' ? 'active': '':'' }}"><a href="{{ url('admin/slider/manage') }}"><i class="ti-more"></i>Manage Sliders</a></li>
              </ul>
          </li>

          <li class="treeview {{ $route[1]=='cupons' ? 'active menu-open':'' }}">
              <a href="{{ url('admin/cupons') }}">
                  <i data-feather="message-circle"></i>
                  <span>Cupons</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu ">
                  <li class="{{ isset($route[1]) ? $route[1]=='cupons' ? 'active': '':'' }}"><a href="{{ url('admin/cupons') }}"><i class="ti-more"></i>Manage Cupons</a></li>
              </ul>
          </li>
          <li class="treeview {{ $route[1]=='address' ? 'active menu-open':'' }}">
            <a href="{{ url('admin/address') }}">
                <i data-feather="message-circle"></i>
                <span>Address</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu ">
                <li class="{{ $route[1]=='division' ? 'active':'' }}"><a href="{{ url('admin/address/division') }}"><i class="ti-more"></i>All Divition</a></li>
                <li class="{{ $route[1]=='cities' ? 'active':'' }}"><a href="{{ url('admin/address/cities') }}"><i class="ti-more"></i>All Cities</a></li>
                <li class="{{ $route[1]=='area' ? 'active':'' }}"><a href="{{ url('admin/address/area') }}"><i class="ti-more"></i>All Post Office</a></li>
            </ul>
        </li>

          <li class="treeview">
              <a href="#">
                  <i data-feather="file"></i>
                  <span>Pages</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
                  <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
                  <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
                  <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
                  <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
              </ul>
          </li>

          <li class="header nav-small-cap">User Interface</li>

          <li class="treeview">
              <a href="#">
                  <i data-feather="grid"></i>
                  <span>Components</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                  <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                  <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                  
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i data-feather="credit-card"></i>
                  <span>Cards</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                  <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                  <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
              </ul>
          </li>
      </ul>
  </section>

  <div class="sidebar-footer">
      <!-- item-->
      <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
          data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
      <!-- item-->
      <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
          data-original-title="Email"><i class="ti-email"></i></a>
      <!-- item-->
      <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
          data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
</aside>
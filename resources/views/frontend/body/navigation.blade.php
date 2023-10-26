<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> @lang('words.category')</div>
  <nav class="yamm megamenu-horizontal">
      <ul class="nav">
          
          <!-- /.menu-item -->

          @foreach ($categories as $category)
          <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
            data-toggle="dropdown"><i class="icon {{ $category->category_icon }}"
                aria-hidden="true"></i>{{ session()->get('lang')=='bn' ? $category->category_name_bn : $category->category_name }}</a>
            <!-- ================================== MEGAMENU VERTICAL ================================== -->
            @php
                $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
            @endphp
            @if (count($subcategories) > 0)
                    <ul class="dropdown-menu mega-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    
                                    @foreach ($subcategories as $subcategory)

                                    <div class="col-xs-12 col-sm-12 col-md-3 col-menu">
                                        <h2 class="title">{{ session()->get('lang')=='bn' ? $subcategory->subcategory_name_bn : $subcategory->subcategory_name }}</h2>
                                        <ul class="links">
                                            @php
                                                $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcategory->id)->orderBy('id', 'ASC')->get();
                                            @endphp
                                            @foreach ($subsubcategories as $subsubcategory)
                                            <li><a href="#">{{ session()->get('lang')=='bn' ? $subsubcategory->subsubcategory_name_bn : $subsubcategory->subsubcategory_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                   
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                    @endif
            <!-- /.dropdown-menu -->
            <!-- ================================== MEGAMENU VERTICAL ================================== -->
        </li>
          @endforeach
          
          <!-- /.menu-item -->

      </ul>
      <!-- /.nav -->
  </nav>
  <!-- /.megamenu-horizontal -->
</div>
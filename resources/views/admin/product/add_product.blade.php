@extends('admin.admin_master')
@section('admin_content')
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          <h3 class="page-title">Add Product</h3>
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i
                      class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Add Product</li>
                
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-12">
          <div class="box">


            <div class="box-body pb-0">
              <form action="{{ url('admin/addProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Brand Select <span class="text-danger">*</span></h5>
                    <select class="form-control select2" style="width: 100%;" name="brand_id">
                      <option selected="selected">Select One</option>
                      @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                      @endforeach
                    </select>
                    @error('brand_id')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <select class="form-control select2" style="width: 100%;" name="category_id">
                      <option selected="selected">Select One</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                    <select class="form-control select2" style="width: 100%;" name="subcategory_id">
                      <option selected="selected">Select Category First</option>
                      
                    </select>
                    @error('subcategory_id')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <!-- /.form-group -->
                </div>               
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Sub SubCategory Select <span class="text-danger">*</span></h5>
                    <select class="form-control select2" style="width: 100%;" name="subsubcategory_id">
                      <option selected="selected">Select SubCategory First</option>
                    </select>
                    @error('subsubcategory_id')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Name(en) <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="product_name_en" class="form-control" required=""
                          data-validation-required-message="This field is required" value="">
                      <div class="help-block"></div>
                  </div>
                  @error('product_name_en')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Name(bn) <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="product_name_bn" class="form-control" required=""
                        data-validation-required-message="This field is required" value="">
                    <div class="help-block"></div>
                    </div>
                  @error('product_name_bn')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                            
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Code <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="product_code" class="form-control" required=""
                          data-validation-required-message="This field is required" value="">
                      <div class="help-block"></div>
                  </div>
                  @error('product_code')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Quantity <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="product_qty" class="form-control" required=""
                        data-validation-required-message="This field is required" value="">
                    <div class="help-block"></div>
                    </div>
                  @error('product_qty')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Tag(en) <span class="text-danger">*</span>
                    <small>Max 5 tags.</small>
                  </h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_tags_en"/>
                      </div>
                    {{-- <select multiple data-role="tagsinput">
											<option value="Lorem">Lorem</option>
											<option value="Ipsum">Ipsum</option>
											<option value="Amet">Amet</option>
										</select> --}}
                    </div>
                  @error('product_tags_en')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Tag(bn) <span class="text-danger">*</span><small>Max 5 tags.</small></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="" data-role="tagsinput" class="form-control productTags" id="productTagsBn" placeholder="add tags" name="product_tags_bn"/>
                      </div>
                    
                    </div>
                  @error('product_tags_bn')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Size(en) </h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="small,large,medium" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_size_en"/>
                      </div>
                    {{-- <select multiple data-role="tagsinput">
											<option value="Lorem">Lorem</option>
											<option value="Ipsum">Ipsum</option>
											<option value="Amet">Amet</option>
										</select> --}}
                    </div>                  
                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Size(bn) </span></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="ছোট,বড়,মধ্যম" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_size_bn"/>
                      </div>
                    {{-- <select multiple data-role="tagsinput">
											<option value="Lorem">Lorem</option>
											<option value="Ipsum">Ipsum</option>
											<option value="Amet">Amet</option>
										</select> --}}
                    </div>
                    </div> 
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Color(en) <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="black,red,white" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_color_en"/>
                      </div>
                    {{-- <select multiple data-role="tagsinput">
											<option value="Lorem">Lorem</option>
											<option value="Ipsum">Ipsum</option>
											<option value="Amet">Amet</option>
										</select> --}}
                    </div>
                  @error('product_color_en')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Color(bn) <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="কালো,সাদা,লাল" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_color_bn"/>
                      </div>
                    {{-- <select multiple data-role="tagsinput">
											<option value="Lorem">Lorem</option>
											<option value="Ipsum">Ipsum</option>
											<option value="Amet">Amet</option>
										</select> --}}
                    </div>
                  @error('product_color_bn')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Price <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="selling_price" class="form-control" required=""
                          data-validation-required-message="This field is required" value="">
                      <div class="help-block"></div>
                  </div>
                  @error('selling_price')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Price Discount </h5>
                    <div class="controls">
                      <div class="input-group">
                        <input type="text" class="form-control"   aria-invalid="false" name="discount_price"> <span class="input-group-addon" id="basic-addon1"><i class="fa-solid fa-percent"></i></span> </div>
                    <div class="help-block"></div></div>
                    
                  </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="file" name="product_thambnail" class="form-control" required="" aria-invalid="false" id="productThambnail"> <div class="help-block"></div></div>
                      @error('product_thambnail')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <img id="showImage">
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Multiple Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="file" name="file[]" class="form-control" required="" aria-invalid="false" id="multiImg" multiple=""> <div class="help-block"></div></div>
                      <div class="row" id="preview_img">

                      </div>
                      @error('file[]')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Short Description(en) <span class="text-danger">*</span></h5>
                    <textarea rows="3" class="form-control" placeholder="Short Description in English" name="short_descp_en"></textarea>
                    @error('short_descp_en')
                    <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Short Description(bn) <span class="text-danger">*</span></h5>
                    <textarea rows="3" class="form-control" placeholder="Short Description in Bangla" name="short_descp_bn"></textarea>
                    @error('short_descp_bn')
                    <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                @enderror
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Long Description(en) <span class="text-danger">*</span></h5>
                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80" placeholder="">
                      Product Long Description in English.
                    </textarea>
                    @error('long_descp_en')
                    <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Long Description(bn) <span class="text-danger">*</span></h5>
                    <textarea id="editor2" name="long_descp_bn" rows="10" cols="80"  placeholder="">
                      Product Long Description in Bangla.
                    </textarea>
                    @error('long_descp_bn')
                    <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                @enderror
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <div class="controls">
                      <fieldset>
                      <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                      <label for="checkbox_2">Hot Deals</label>
                      </fieldset>
                      <fieldset>
                      <input type="checkbox" id="checkbox_3" value="1" name="featured">
                      <label for="checkbox_3">Featured</label>
                      </fieldset>
                      </div>
                    
                  </div>
                </div>
                <div class="col-md-6 col-12 with-border">
                  <div class="form-group ">
                    <div class="controls">
                      <fieldset>
                      <input type="checkbox" id="checkbox_4" value="1" name="special_offer">
                      <label for="checkbox_4">Special Offer</label>
                      </fieldset>
                      <fieldset>
                      <input type="checkbox" id="checkbox_5" value="1" name="special_deals">
                      <label for="checkbox_5">Special Deals</label>
                      </fieldset>
                      </div>
                    
                    
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="text-right mb-25">
                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
              </div>
            </form>
              <!-- /.row -->
            </div>
        <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <script>
     $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

<script>
  $(document).ready(function () {
      // Listen for changes in the file input
      $('#productThambnail').on('change', function () {
          if (this.files && this.files[0]) {
              // Store a copy of this in a variable
              var reader = new FileReader();

              // Set the image once loaded into file reader
              reader.onload = function (e) {
                  $('#showImage').attr('src', e.target.result).width(80).height(80);
              }

              // Read the image file as a data URL
              reader.readAsDataURL(this.files[0]);
          }
      });
  });
</script>
  
  <script>
    $(document).ready(function () {
        var maxTags = 5; // Set the maximum number of tags allowed

        $('#productTags').on('beforeItemAdd', function(event) {
            // Count the number of tags
            var tagCount = $('#productTags').tagsinput('items').length;

            // Check if the maximum limit is reached
            if (tagCount >= maxTags) {
                event.cancel = true; // Cancel the tag addition
            } else {
                // Remove the placeholder when a tag is added
                $('#productTags').removeAttr('placeholder');
            }
        });
    });
    $(document).ready(function () {
        var maxTags = 5; // Set the maximum number of tags allowed

        $('#productTagsBn').on('beforeItemAdd', function(event) {
            // Count the number of tags
            var tagCount = $('#productTagsBn').tagsinput('items').length;

            // Check if the maximum limit is reached
            if (tagCount >= maxTags) {
                event.cancel = true; // Cancel the tag addition
            } else {
                // Remove the placeholder when a tag is added
                $('#productTagsBn').removeAttr('placeholder');
            }
        });
    });
</script>
<script>
  $(document).ready(function () {
      // Listen for changes in the category select element
      $('select[name="category_id"]').on('change', function () {
          var categoryId = $(this).val(); // Get the selected category ID

          // Make an AJAX request to fetch subcategories for the selected category
          $.ajax({
              url: '/admin/get-subcategories', // Replace with the URL to your server-side script
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}', // Include CSRF token for security
                  category_id: categoryId // Send the selected category ID
              },
              success: function (data) {
                  // Clear and populate the subcategory select element with the fetched data
                  var subcategorySelect = $('select[name="subcategory_id"]');
                  subcategorySelect.empty();
                  subcategorySelect.append('<option selected="selected">Select One</option>');

                  // Add the fetched subcategories as options
                  $.each(data.subcategories, function (key, value) {
                      subcategorySelect.append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                  });
              }
          });
      });
  });
</script>
<script>
  $(document).ready(function () {
      // Listen for changes in the category select element
      $('select[name="subcategory_id"]').on('change', function () {
            var subcategoryId = $(this).val(); // Get the selected subcategory ID

            // Make an AJAX request to fetch subsubcategories for the selected subcategory
            $.ajax({
                url: '/admin/get-subsubcategories', // Replace with your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    subcategory_id: subcategoryId // Send the selected subcategory ID
                },
                success: function (data) {
                    // Clear and populate the subsubcategory select element with the fetched data
                    var subsubcategorySelect = $('select[name="subsubcategory_id"]');
                    subsubcategorySelect.empty();
                    subsubcategorySelect.append('<option selected="selected">Select One</option>');

                    // Add the fetched subsubcategories as options
                    $.each(data.subsubcategories, function (key, value) {
                        subsubcategorySelect.append('<option value="' + value.id + '">' + value.subsubcategory_name + '</option>');
                    });
                }
            });
        });
  });
</script>
@endsection

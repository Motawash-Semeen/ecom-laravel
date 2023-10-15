@extends('admin.admin_master')
@section('admin_content')
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          @if (isset($product->id))
          <h3 class="page-title">Edit Product</h3>
          @else
          <h3 class="page-title">Add Product</h3>
          @endif
          
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
              <form action="{{ url('admin/product/add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ isset($product->id) ?  $product->id : ''}}">
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Brand Select <span class="text-danger">*</span></h5>
                    <select class="form-control select2" style="width: 100%;" name="brand_id">
                      <option selected value="">Select One</option>
                      @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}" @if (isset($product->brand_id) && $product->brand_id==$brand->id)
                        selected
                        
                      @endif>{{ $brand->brand_name }}</option>
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
                      <option selected value="">Select One</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if (isset($product->category_id) && $product->category_id==$category->id)
                        selected
                        
                      @endif>{{ $category->category_name }}</option>
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
                      <option selected value="">Select Category First</option>
                      @if (isset($product->id))
                                                 @foreach ($subcategories as $subcategory)
                                                 @if ($subcategory->category_id == $product->category_id)
                                                 <option value="{{ $subcategory->id }}" @if (isset($product) && $product->subcategory_id == $subcategory->id)
                                                    selected
                                                  
                                                @endif>{{ $subcategory->subcategory_name }}
                                                </option>
                                                 @endif
                                                 
                                                @endforeach   
                                                 @endif
                      
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
                      <option selected value="">Select SubCategory First</option>
                      @if (isset($product->id))
                                                 @foreach ($subsubcategories as $subsubcategory)
                                                 @if ($subsubcategory->subcategory_id == $product->subcategory_id)
                                                 <option value="{{ $subsubcategory->id }}" @if (isset($product) && $product->subsubcategory_id == $subsubcategory->id)
                                                    selected
                                                  
                                                @endif>{{ $subsubcategory->subsubcategory_name }}
                                                </option>
                                                 @endif
                                                 
                                                @endforeach   
                                                 @endif
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
                      <input type="text" name="product_name_en" class="form-control" value="{{ isset($product->id) ? $product->product_name_en : "" }}">
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
                    <input type="text" name="product_name_bn" class="form-control" value="{{ isset($product->id) ? $product->product_name_en : "" }}">
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
                      <input type="text" name="product_code" class="form-control"  value="{{ isset($product->id) ? $product->product_code : '' }}">
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
                    <input type="text" name="product_qty" class="form-control" value="{{ isset($product->id) ? $product->product_qty : '' }}">
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
                    <small>Comma Separeted.</small>
                  </h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_tags_en" value="{{ isset($product->id) ? $product->product_tags_en : '' }}"/>
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
                  <h5>Product Tag(bn) <span class="text-danger">*</span><small>Comma Separeted.</small></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="{{ isset($product->id) ? $product->product_tags_bn : '' }}" data-role="tagsinput" class="form-control productTags" id="productTagsBn" placeholder="add tags" name="product_tags_bn"/>
                      </div>
                    
                    </div>
                  @error('product_tags_bn')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror

                    </div> 
                </div>
                <div class="col-md-4 col-12">
                  <div class="form-group">
                  <h5>Product Size(en) <small>Comma Separeted.</small></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="{{ isset($product->id) ? $product->product_size_en	 : 'small,large,medium' }}" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_size_en"/>
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
                  <h5>Product Size(bn) <small>Comma Separeted.</small></span></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="{{ isset($product->id) ? $product->product_size_bn	 : 'ছোট,বড়,মধ্যম' }}" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_size_bn"/>
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
                  <h5>Product Color(en) <span class="text-danger">*</span><small>Comma Separeted.</small></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="{{ isset($product->id) ? $product->product_color_en	 : 'black,red,white' }}" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_color_en"/>
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
                  <h5>Product Color(bn) <span class="text-danger">*</span><small>Comma Separeted.</small></h5>
                  <div class="controls">
                      <div class="tags-default bg-transparent">
                          <input type="text" value="{{ isset($product->id) ? $product->product_color_bn	 : 'কালো,সাদা,লাল' }}" data-role="tagsinput" class="form-control productTags" id="productTags" placeholder="add tags" name="product_color_bn"/>
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
                      <input type="text" name="selling_price" class="form-control" value="{{ isset($product->id) ? $product->selling_price	 : '' }}">
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
                <div class="col-12 {{ isset($product->id) ? 'col-md-6' : 'col-md-4' }}">
                  <div class="form-group">
                    <h5>Price Discount </h5>
                    <div class="controls">
                      <div class="input-group">
                        <input type="text" class="form-control"   aria-invalid="false" name="discount_price" value="{{ isset($product->id) ? $product->discount_price	 : '' }}"> <span class="input-group-addon" id="basic-addon1"><i class="fa-solid fa-percent"></i></span> </div>
                    <div class="help-block"></div></div>
                    
                  </div> 
                </div>
                <div class=" col-12 {{ isset($product->id) ? 'col-md-6' : 'col-md-4' }}">
                  <div class="form-group">
                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="file" name="product_thambnail" class="form-control" aria-invalid="false" id="productThambnail"> <div class="help-block"></div></div>
                      @error('product_thambnail')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                  <img id="showImage" @if (isset($product->product_thambnail))
                    src="{{ asset('upload/products/'.$product->product_thambnail) }}" 
                    style="width:60px; height:60px"
                  @endif >
                </div>
                @if (!isset($product->id))
                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <h5>Multiple Image <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="file" name="file[]" class="form-control" aria-invalid="false" id="multiImg" multiple=""> <div class="help-block"></div></div>
                      <div class="row" id="preview_img">

                      </div>
                      @error('file[]')
                      <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                  @enderror
                  </div>
                </div>
                @endif
                
                <!-- /.col -->
              </div>
              <div class="row mt-3">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Short Description(en) <span class="text-danger">*</span></h5>
                    <textarea rows="3" class="form-control" placeholder="Short Description in English" name="short_descp_en">{{ isset($product->id) ? $product->short_descp_en	 : '' }}</textarea>
                    @error('short_descp_en')
                    <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <h5>Short Description(bn) <span class="text-danger">*</span></h5>
                    <textarea rows="3" class="form-control" placeholder="Short Description in Bangla" name="short_descp_bn">{{ isset($product->id) ? $product->short_descp_bn	 : '' }}</textarea>
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
                      {{ isset($product->id) ? $product->long_descp_en	 : '' }}
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
                      {{ isset($product->id) ? $product->long_descp_bn	 : '' }}
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
                      <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" @if (isset($product->hot_deals) && $product->hot_deals==1)
                        checked
                        
                      @endif>
                      <label for="checkbox_2">Hot Deals</label>
                      </fieldset>
                      <fieldset>
                      <input type="checkbox" id="checkbox_3" value="1" name="featured" @if (isset($product->featured) && $product->featured==1)
                        checked
                        
                      @endif>
                      <label for="checkbox_3">Featured</label>
                      </fieldset>
                      </div>
                    
                  </div>
                </div>
                <div class="col-md-6 col-12 with-border">
                  <div class="form-group ">
                    <div class="controls">
                      <fieldset>
                      <input type="checkbox" id="checkbox_4" value="1" name="special_offer" @if (isset($product->special_offer) && $product->special_offer==1)
                        checked
                        
                      @endif>
                      <label for="checkbox_4">Special Offer</label>
                      </fieldset>
                      <fieldset>
                      <input type="checkbox" id="checkbox_5" value="1" name="special_deals" @if (isset($product->special_deals) && $product->special_deals==1)
                        checked
                        
                      @endif>
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
@if (isset($product->id))
  {{-- mutiple image --}}
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box bt-3 border-info">
          <div class="box-header">
          <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
          </div>

          <div class="box-body">
          <form action="{{ url('admin/product/multiImg/update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row row-sm" id="rowMulti">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
              @foreach ($multiImg as $img)
              <div class="col-md-3">
                <div class="card" >
                  <img src="{{ asset('upload/products/'.$img->photo_name) }}" class="card-img-top" alt="..." height="130px" width="280px">
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="{{ url('admin/product/multiImg/delete/'.$img->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete this"><i class="fa fa-trash"></i></a>
                    </h5>
                    <p class="card-text">
                      <div class="form-group">
                        <label for="" class="form-control-label">Change Image</label>
                        <input class="form-control" type="file" name="file[ {{ $img->id }} ]" id="">
                      </div>
                    </p>
                    
                  </div>
                </div>
              </div>
              @endforeach

              
            
          </div>
          
            <div class="text-center d-flex align-items-center justify-content-center" style="height: 100%;">
              <button type="button" class="btn btn-success  d-flex align-items-center justify-content-center" title="Add New Image" id="addImage" >Add New Image</button>
          </div>
          
          
          <div class="text-right mb-25">
            <button type="submit" class="btn btn-rounded btn-info">Update</button>
          </div>
          </form>
          </div>
        </div>
        </div>
    </div>
  </section>
  
@endif
    
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
    // $(document).ready(function () {
    //     var maxTags = 5; // Set the maximum number of tags allowed

    //     $('.productTags').on('beforeItemAdd', function(event) {
    //         // Count the number of tags
    //         var tagCount = $('.productTags').tagsinput('items').length;

    //         // Check if the maximum limit is reached
    //         if (tagCount >= maxTags) {
    //             event.cancel = true; // Cancel the tag addition
    //         } else {
    //             // Remove the placeholder when a tag is added
    //             $('.productTags').removeAttr('placeholder');
    //         }
    //     });
    // });
    // $(document).ready(function () {
    //     var maxTags = 5; // Set the maximum number of tags allowed

    //     $('.productTagsBn').on('beforeItemAdd', function(event) {
    //         // Count the number of tags
    //         var tagCount = $('.productTagsBn').tagsinput('items').length;

    //         // Check if the maximum limit is reached
    //         if (tagCount >= maxTags) {
    //             event.cancel = true; // Cancel the tag addition
    //         } else {
    //             // Remove the placeholder when a tag is added
    //             $('.productTagsBn').removeAttr('placeholder');
    //         }
    //     });
    // });
@if (isset($product->id))
$(document).ready(function () {
        // Counter to track added image fields
        var imageFieldCounter = {{ count($multiImg) }};

        // Add Image Button Click Event
        $('#addImage').on('click', function () {
            // Create a new image input field
            var newImageField = `
                <div class="col-md-3">
                    <div class="card">
                      
                      <img id="preview-${imageFieldCounter}" class="card-img-top" src="#" alt="Image Preview" style="display: none;" height="130px" width="280px">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="#" class="btn btn-danger btn-sm delete-image" title="Delete this">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </h5>
                            <p class="card-text">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Add Image</label>
                                    <input class="form-control" type="file" name="newFile[${imageFieldCounter}]" id="file-${imageFieldCounter}">
                                    
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            `;

            // Append the new image field to the row
            $('#rowMulti').append(newImageField);

            // Increment the counter
            imageFieldCounter++;
        });

        // Delete Image Button Click Event
        $(document).on('click', '.delete-image', function () {
            // Remove the parent card element
            $(this).closest('.col-md-3').remove();
        });

        // Show Image Preview when File is Selected
        $(document).on('change', 'input[type="file"]', function () {
            var inputId = $(this).attr('id');
            var previewId = inputId.replace('file-', 'preview-');
            var fileInput = document.getElementById(inputId);
            var previewImage = document.getElementById(previewId);

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                previewImage.src = '#';
                previewImage.style.display = 'none';
            }
        });
    });
@endif
    
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
                  var subsubcategorySelect = $('select[name="subsubcategory_id"]');
                  subsubcategorySelect.empty();
                  subsubcategorySelect.append('<option selected="selected">Select SubCategory First</option>');

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

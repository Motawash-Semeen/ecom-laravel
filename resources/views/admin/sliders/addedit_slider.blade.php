@extends('admin.admin_master')
@section('admin_content')
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="mr-auto">
          @if (isset($product->id))
          <h3 class="page-title">Edit Slider</h3>
          @else
          <h3 class="page-title">Add Slider</h3>
          @endif
          
          <div class="d-inline-block align-items-center">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i
                      class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">@if (isset($product->id)) Edit Slider @else Add Slider @endif</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-12 col-lg-10 offset-lg-1">
          <div class="box">


            <div class="box-body pb-0">
              <form action="{{ url('admin/slider/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ isset($product->id) ?  $product->id : ''}}">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <h5>Slider Title </h5>
                    <input type="hidden" name="id" value="{{ isset($slider_edit) ? $slider_edit->id : '' }}">
                    <div class="controls">
                            <textarea id="editor1" name="slider_title" rows="4" cols="80" placeholder="">
                                {{ isset($slider_edit) ? $slider_edit->slider_title : '' }}
                              </textarea>
                        <div class="help-block"></div>
                    </div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <h5>Slider Description </h5>
                    <div class="controls">
                        
                            <textarea id="editor2" name="slider_description" rows="4" cols="80" placeholder="">
                                {{ isset($slider_edit)? $slider_edit->slider_description : '' }}
                              </textarea>
                        <div class="help-block"></div>
                    </div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="slider_img"
                                                class="form-control" value="{{ isset($slider_edit)? $slider_edit->slider_img : '' }}">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('slider_img')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-center">
                    <img src="{{ isset($slider_edit)? asset('upload/sliders/'.$slider_edit->slider_img) : asset('upload/profile/no_image.jpg') }}" alt="" id="showImage" class=" "
                        style="width: 300px; height:200px;">

                </div>
                  <!-- /.form-group -->
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
  

@endsection

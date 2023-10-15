@extends('admin.admin_master')
@section('admin_content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Band Name(en)</th>
                                            <th>Band Name(bn)</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->brand_name }}</td>
                                                <td>{{ $brand->brand_name_bn }}</td>
                                                <td><img src="{{ asset('upload/brands/'.$brand->brand_image) }}" alt=""
                                                        style="width: 50px; height: 50px;"></td>
                                                <td>
                                                    <a href="{{ url('admin/brands/'. $brand->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ url('admin/brands/delete/'. $brand->id) }}" class="btn btn-danger delete"
                                                        id="delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-lg-4">
                  <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <div class="box-body">
                    <form novalidate="" method="POST" action="{{ url('admin/brands/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Brand Name(en) <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id" value="{{ isset($brand_edit) ? $brand_edit->id : '' }}">
                                    <div class="controls">
                                        <input type="text" name="brand_name" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($brand_edit) ? $brand_edit->brand_name : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('brand_name')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <h5>Brand Name(bn) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_bn" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($brand_edit)? $brand_edit->brand_name_bn : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('brand_name_bn')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                
                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="brand_image"
                                                class="form-control" value="{{ isset($brand_edit)? $brand_edit->brand_image : '' }}">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('brand_image')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-center">
                                        <img src="{{ isset($brand_edit)? asset('upload/brands/'.$brand_edit->brand_image) : asset('upload/profile/no_image.jpg') }}" alt="" id="showImage" class=" "
                                            style="width: 100px; height:100px;">

                                    </div>
                                

                            </div>
                        </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                        </div>
                    </form>
                  </div>
                  </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


    <script>
      $(document).ready(function() {
          $('#image').change(function(e) {
              let reader = new FileReader();
              reader.onload = function(e) {
                  $('#showImage').attr('src', e.target.result);
              }
              reader.readAsDataURL(e.target.files['0']);
          });
      });
  </script>
@endsection

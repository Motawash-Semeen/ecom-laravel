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
                            <h3 class="box-title">Category Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category Name(en)</th>
                                            <th>Category Name(bn)</th>
                                            <th>Category Icon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ $category->category_name_bn }}</td>
                                                <td>
                                                  @if (isset($category->category_icon))
                                                  <i class="{{ $category->category_icon }}"></i>
                                                  @else
                                                    <p class="text-danger">No Icon Selected</p>
                                                  @endif
                                                  
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/category/'. $category->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ url('admin/category/delete/'. $category->id) }}" class="btn btn-danger"
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
                      @if (isset($category_edit))
                      <h3 class="box-title">Edit Category</h3>
                      @else
                        <h3 class="box-title">Add Category</h3>
                      @endif
                        
                    </div>
                    <div class="box-body">
                    <form novalidate="" method="POST" action="{{ url('admin/category/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Category Name(en) <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id" value="{{ isset($category_edit) ? $category_edit->id : '' }}">
                                    <div class="controls">
                                        <input type="text" name="category_name" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($category_edit) ? $category_edit->category_name : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('category_name')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <h5>Category Name(bn) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_bn" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($category_edit)? $category_edit->category_name_bn : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('category_name_bn')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                
                                    <div class="form-group">
                                        <h5>Icon</h5>
                                        <div class="controls">
                                            <input type="text" id="image" name="category_icon"
                                                class="form-control" value="{{ isset($category_edit)? $category_edit->category_icon : '' }}">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('category_icon')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

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

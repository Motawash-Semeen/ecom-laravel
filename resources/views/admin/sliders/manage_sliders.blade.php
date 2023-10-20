@extends('admin.admin_master')
@section('admin_content')
<style>
  .badge a{
    color: #fff !important;
  }
</style>
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
                            <h3 class="box-title">Slider Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Slider Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td><img src="{{ asset('upload/sliders/'.$slider->slider_img) }}" alt=""
                                                  style="width: 50px; height: 50px;"></td>
                                                <td>
                                                  @if ($slider->slider_title)
                                                  {{ $slider->slider_title }}
                                                  @else
                                                  <span class="badge badge-danger">No Title</span>
                                                  @endif
                                                  </td>
                                                <td>
                                                  @if ($slider->slider_description)
                                                  {{ $slider->slider_description }}
                                                  @else
                                                  <span class="badge badge-danger">No Description</span>
                                                  @endif
                                                  </td>
                                                <td>
                                                    @if ($slider->slider_status == 1)
                                                        <span class="badge badge-success icon-link-hover"><a href="{{ url('admin/slider/status/'.$slider->id) }}">Active</a></span>
                                                    @else
                                                        <span class="badge badge-danger icon-link-hover"><a href="{{ url('admin/slider/status/'.$slider->id) }}">Inactive</a></span>
                                                    @endif
                                                </td>
                                                <td>

                                                    <a href="{{ url('admin/slider/'. $slider->id) }}"
                                                        class="btn btn-info" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/slider/delete/'. $slider->id) }}" class="btn btn-danger delete"
                                                        id="delete" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
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
                      @if (isset($slider_edit))
                      <h3 class="box-title">Edit Slider</h3>
                      @else
                        <h3 class="box-title">Add Slider</h3>
                      @endif
                    </div>
                    <div class="box-body">
                    <form novalidate="" method="POST" action="{{ url('admin/slider/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Slider Title </h5>
                                    <input type="hidden" name="id" value="{{ isset($slider_edit) ? $slider_edit->id : '' }}">
                                    <div class="controls">
                                        <input id="editor" type="text" name="slider_title" class="form-control"  value="{{ isset($slider_edit) ? $slider_edit->slider_title : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <h5>Slider Description </h5>
                                    <div class="controls">
                                        <input type="text" name="slider_description" class="form-control"  value="{{ isset($slider_edit)? $slider_edit->slider_description : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                </div>
                                
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

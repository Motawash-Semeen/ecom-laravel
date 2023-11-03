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
                            <h3 class="box-title">Cupon Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Discount</th>
                                            <th>Validity</th>
                                            <th>Limit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cupons as $cupon)
                                            <tr>
                                                <td>{{ $cupon->cupon_name }}</td>
                                                <td>
                                                    <span class="badge rounded-pill badge-info">{{ $cupon->cupon_discount }} %</span>
                                                </td>
                                                <td>{{ $cupon->cupon_validity }}</td>
                                                <td>{{ $cupon->cupon_limit }}</td>
                                                <td>
                                                    @if ($cupon->status == 1)
                                                        <a href="{{ url('admin/cupons/status/'.$cupon->id) }}" class="badge badge-success icon-link-hover" style="--bs-link-hover-color-rgb: 0, 0, 0;">Active</a>
                                                    @else
                                                        <a href="{{ url('admin/cupons/status/'.$cupon->id) }}" class="btn btn-sm badge badge-danger" style="--bs-link-hover-color-rgb: 0, 0, 0;">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/cupons/'. $cupon->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ url('admin/cupons/delete/'. $cupon->id) }}" class="btn btn-danger delete"
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
                        @if (isset($cupon_edit))
                      <h3 class="box-title">Edit Cupon</h3>
                      @else
                        <h3 class="box-title">Add Cupon</h3>
                      @endif
                    </div>
                    <div class="box-body">
                    <form novalidate="" method="POST" action="{{ url('admin/cupon/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Cupon <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id" value="{{ isset($cupon_edit) ? $cupon_edit->id : '' }}">
                                    <div class="controls">
                                        <input type="text" name="cupon_name" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($cupon_edit) ? $cupon_edit->cupon_name : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('cupon_name')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <h5>Price Discount <span class="text-danger">*</h5>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-invalid="false"
                                                name="cupon_discount"
                                                value="{{ isset($cupon_edit) ? $cupon_edit->cupon_discount : old('cupon_discount') }}">
                                            <span class="input-group-addon" id="basic-addon1"><i
                                                    class="fa-solid fa-percent"></i></span>
                                        </div>
                                        <div class="help-block"></div>
                                        @error('cupon_discount')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <h5>Brand Limit <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="cupon_limit" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($cupon_edit)? $cupon_edit->cupon_limit : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('cupon_limit')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Date range:</label>
                
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                <!-- /.form group -->
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

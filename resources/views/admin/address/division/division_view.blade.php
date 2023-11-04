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
                            <h3 class="box-title">Divition Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>Division Name(bn)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($divisions as $division)
                                            <tr>
                                                <td>{{ $division->division_name }}</td>
                                                <td>{{ $division->division_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/address/division/'. $division->id) }}"
                                                        class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/address/division/delete/'. $division->id) }}" class="btn btn-danger delete"
                                                        id="delete"><i class="fa-regular fa-trash-can"></i></a>
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
                        @if (isset($division_edit))
                      <h3 class="box-title">Edit Division</h3>
                      @else
                        <h3 class="box-title">Add Division</h3>
                      @endif
                    </div>
                    <div class="box-body">
                    <form novalidate="" method="POST" action="{{ url('admin/address/division/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Division Name <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id" value="{{ isset($division_edit) ? $division_edit->id : '' }}">
                                    <div class="controls">
                                        <input type="text" name="division_name" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($division_edit) ? $division_edit->division_name : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('division_name')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <h5>Division Name(bn) <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id" value="{{ isset($division_edit) ? $division_edit->id : '' }}">
                                    <div class="controls">
                                        <input type="text" name="division_name_bn" class="form-control" required=""
                                            data-validation-required-message="This field is required" value="{{ isset($division_edit) ? $division_edit->division_name_bn : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                    @error('division_name_bn')
                                        <div class="form-control-feedback text-danger"><small>{{ $message }}</small></div>
                                    @enderror

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
@endsection

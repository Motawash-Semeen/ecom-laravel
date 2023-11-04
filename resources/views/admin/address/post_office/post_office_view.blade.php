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
                            <h3 class="box-title">Post Office Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Area(bn)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offices as $office)
                                            <tr>
                                                
                                                <td>{{ $office->division->division_name }}</td>
                                                <td>{{ $office->city->city_name }}</td>
                                                <td>{{ $office->post_office_name }}</td>
                                                <td>{{ $office->post_office_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/address/area/' . $office->id) }}"
                                                        class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/address/area/delete/' . $office->id) }}"
                                                        class="btn btn-danger delete" id="delete"><i
                                                            class="fa-regular fa-trash-can"></i></a>
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
                            @if (isset($office_edit))
                                <h3 class="box-title">Edit Post office</h3>
                            @else
                                <h3 class="box-title">Add Post office</h3>
                            @endif
                        </div>
                        <div class="box-body">
                            <form novalidate="" method="POST" action="{{ url('admin/address/area/store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Division Name<span class="text-danger">*</span></h5>
                                            <select class="form-control" style="width: 100%;" tabindex="-1"
                                                aria-hidden="true" name="division_id" id="division_id">
                                                <option selected="selected">Select One</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                        @if (isset($office_edit) && $office_edit->division_id == $division->id) selected @endif>
                                                        {{ $division->division_name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            <!-- /.form-group -->

                                        </div>
                                        <div class="form-group">
                                            <h5>City Name<span class="text-danger">*</span></h5>
                                            <select class="form-control" style="width: 100%;" tabindex="-1"
                                                aria-hidden="true" name="city_id" id="city_id">
                                                <option selected="selected">Select Devision</option>
                                                {{-- @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        @if (isset($office_edit) && $office_edit->city_id == $city->id) selected @endif>
                                                        {{ $city->city_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>


                                            <!-- /.form-group -->

                                        </div>
                                        <div class="form-group">
                                            <h5>Area Name <span class="text-danger">*</span></h5>
                                            <input type="hidden" name="id"
                                                value="{{ isset($office_edit) ? $office_edit->id : '' }}">
                                            <div class="controls">
                                                <input type="text" name="post_office_name" class="form-control" required=""
                                                    data-validation-required-message="This field is required"
                                                    value="{{ isset($office_edit) ? $office_edit->post_office_name : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('post_office_name')
                                                <div class="form-control-feedback text-danger">
                                                    <small>{{ $message }}</small></div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <h5>Area Name(bn) <span class="text-danger">*</span></h5>
                                            <input type="hidden" name="id"
                                                value="{{ isset($office_edit) ? $office_edit->id : '' }}">
                                            <div class="controls">
                                                <input type="text" name="post_office_name_bn" class="form-control"
                                                    required="" data-validation-required-message="This field is required"
                                                    value="{{ isset($office_edit) ? $office_edit->post_office_name_bn : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('post_office_name_bn')
                                                <div class="form-control-feedback text-danger">
                                                    <small>{{ $message }}</small></div>
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
    <script>
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                var select = '';
                if (division_id) {
                    $.ajax({
                        url: "{{  url('/admin/address/city/get') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data.cities, function(key, value) {
                                $("#city_id").append('<option value="' + value.id + '"' + (value.id == data.office_edit.division_id ? 'selected' : '') + '>' + value.city_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('Select Division');
                }
            });
        });
    </script>
@endsection

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
                            <h3 class="box-title">SubCategory Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>SubCategory(en)</th>
                                            <th>SubCategory(bn)</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->category->category_name }}</td>
                                                <td>{{ $subcategory->subcategory_name }}</td>
                                                <td>{{ $subcategory->subcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subCategory/' . $subcategory->id) }}"
                                                        class="btn btn-info" title="Edit"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/subCategory/delete/' . $subcategory->id) }}"
                                                        class="btn btn-danger" id="delete" title="Delete"><i
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
                            @if (isset($subcategory_edit))
                                <h3 class="box-title">Edit SubCategory</h3>
                            @else
                                <h3 class="box-title">Add SubCategory</h3>
                            @endif

                        </div>
                        <div class="box-body">
                            <form novalidate="" method="POST" action="{{ url('admin/subCategory/store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category Name<span class="text-danger">*</span></h5>
                                            <select class="form-control"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="category_id">
                                                <option selected="selected">Select One</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (isset($subcategory_edit) && $subcategory_edit->category_id == $category->id)
                                                        selected
                                                      
                                                    @endif>{{ $category->category_name }}
                                                    </option>
                                                @endforeach                                                
                                            </select>
                                            

                                            <!-- /.form-group -->

                                        </div>
                                        <div class="form-group">
                                            <h5>SubCategory Name(en) <span class="text-danger">*</span></h5>
                                            <input type="hidden" name="id"
                                                value="{{ isset($subcategory_edit) ? $subcategory_edit->id : '' }}">
                                            <div class="controls">
                                                <input type="text" name="subcategory_name" class="form-control"
                                                    required="" data-validation-required-message="This field is required"
                                                    value="{{ isset($subcategory_edit) ? $subcategory_edit->subcategory_name : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('subcategory_name')
                                                <div class="form-control-feedback text-danger">
                                                    <small>{{ $message }}</small></div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <h5>SubCategory Name(bn) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subcategory_name_bn" class="form-control"
                                                    required="" data-validation-required-message="This field is required"
                                                    value="{{ isset($subcategory_edit) ? $subcategory_edit->subcategory_name_bn : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('subcategory_name_bn')
                                                <div class="form-control-feedback text-danger">
                                                    <small>{{ $message }}</small></div>
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
@endsection

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
                            <h3 class="box-title">Sub SubCategory Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Sub SubCategory(en)</th>
                                            <th>Sub SubCategory(bn)</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $subsubcategory)
                                            <tr>
                                                <td>{{ $subsubcategory->category->category_name }}</td>
                                                <td>{{ $subsubcategory->subcategory->subcategory_name }}</td>
                                                <td>{{ $subsubcategory->subsubcategory_name }}</td>
                                                <td>{{ $subsubcategory->subsubcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subSubCategory/' . $subsubcategory->id) }}"
                                                        class="btn btn-info" title="Edit"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/subSubCategory/delete/' . $subsubcategory->id) }}"
                                                        class="btn btn-danger delete" id="delete" title="Delete"><i
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
                            @if (isset($subsubcategory_edit))
                                <h3 class="box-title">Edit Sub SubCategory</h3>
                            @else
                                <h3 class="box-title">Add Sub SubCategory</h3>
                            @endif

                        </div>
                        <div class="box-body">
                            <form novalidate="" method="POST" action="{{ url('admin/subSubCategory/store') }}"
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
                                                    <option value="{{ $category->id }}" @if (isset($subsubcategory_edit) && $subsubcategory_edit->category_id == $category->id)
                                                        selected
                                                      
                                                    @endif>{{ $category->category_name }}
                                                    </option>
                                                @endforeach                                                
                                            </select>
                                            

                                            <!-- /.form-group -->

                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Category Name<span class="text-danger">*</span></h5>
                                            <select class="form-control"
                                                style="width: 100%;" tabindex="-1" aria-hidden="true" name="subcategory_id">
                                                 <option selected="selected">First Select Category</option>{{--
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" @if (isset($subsubcategory_edit) && $subsubcategory_edit->subcategory_id == $subcategory->id)
                                                        selected
                                                      
                                                    @endif>{{ $subcategory->subcategory_name }}
                                                    </option>
                                                @endforeach                                                 --}}
                                            </select>
                                            

                                            <!-- /.form-group -->

                                        </div>
                                        <div class="form-group">
                                            <h5>Sub SubCategory Name(en) <span class="text-danger">*</span></h5>
                                            <input type="hidden" name="id"
                                                value="{{ isset($subsubcategory_edit) ? $subsubcategory_edit->id : '' }}">
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name" class="form-control"
                                                    required="" data-validation-required-message="This field is required"
                                                    value="{{ isset($subsubcategory_edit) ? $subsubcategory_edit->subsubcategory_name : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('subsubcategory_name')
                                                <div class="form-control-feedback text-danger">
                                                    <small>{{ $message }}</small></div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <h5>Sub SubCategory Name(bn) <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_bn" class="form-control"
                                                    required="" data-validation-required-message="This field is required"
                                                    value="{{ isset($subsubcategory_edit) ? $subsubcategory_edit->subsubcategory_name_bn : '' }}">
                                                <div class="help-block"></div>
                                            </div>
                                            @error('subsubcategory_name_bn')
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
@endsection

@extends('admin.admin_master')
@section('admin_content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Prodcut Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Prodcut Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('upload/products/'.$product->product_thambnail) }}" alt="product-image"
                                                        style="height: 60px; width: 60px;">
                                                </td>
                                                <td>{{ $product->product_name_en }}</td>
                                                <td>{{ $product->selling_price }} $</td>
                                                <td>{{ $product->product_qty }} pc</td>
                                                <td>
                                                    @if ($product->discount_price == NULL)
                                                        <span class="badge badge-danger">No Discount</span>
                                                    @else
                                                    <span class="badge rounded-pill badge-info">{{ $product->discount_price }} %</span>
                                                        
                                                    @endif
                                                    </td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <a href="{{ url('admin/product/status/'.$product->id) }}" class="badge badge-success icon-link-hover" style="--bs-link-hover-color-rgb: 0, 0, 0;">Active</a>
                                                    @else
                                                        <a href="{{ url('admin/product/status/'.$product->id) }}" class="btn btn-sm badge badge-danger" style="--bs-link-hover-color-rgb: 0, 0, 0;">Inactive</a>
                                                    @endif
                                                </td>
                                                <td width="30%">
                                                    <a href="{{ url('admin/product/edit/'. $product->id) }}"
                                                        class="btn btn-info" title="View"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ url('admin/product/edit/'. $product->id) }}"
                                                        class="btn btn-info" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="{{ url('admin/product/delete/'. $product->id) }}" class="btn btn-danger delete"
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection

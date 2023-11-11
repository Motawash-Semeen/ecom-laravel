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
                <div class="col-lg-12">

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
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ date("F d, Y", $order->order_date) }}</td>
                                                <td>{{ $order->invoice_number }}</td>
                                                <td>{{ $order->amount }}</td>
                                                <td>{{ $order->payment_type }}</td>
                                                <td><span class="badge badge-success icon-link-hover">{{ $order->status }}</span></td>
                                                
                                                <td>
                                                  <a href="{{ url('admin/order/order-view/'. $order->id) }}"
                                                    class="btn btn-info" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ url('invoice_download/'. $order->id) }}" class="btn btn-danger download"
                                                    id="download" title="Download"><i class="fa fa-download"></i></a>
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

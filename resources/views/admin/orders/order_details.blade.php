@extends('admin.admin_master')
@section('admin_content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Order</li>
                                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong></h4>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th> Shipping Name: </th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Phone: </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>
                                <tr>
                                    <th> Shipping Email: </th>
                                    <th> {{ $order->email }} </th>
                                </tr>
                                <tr>
                                    <th> Divivsion: </th>
                                    <th> {{ $order->division->division_name }} </th>
                                </tr>
                                <tr>
                                    <th> City: </th>
                                    <th> {{ $order->city->city_name }} </th>
                                </tr>
                                <tr>
                                    <th> Area: </th>
                                    <th> {{ $order->area->post_office_name }}-{{ $order->post_code }} </th>
                                </tr>
                                <tr>
                                    <th> Address: </th>
                                    <th> {{ $order->address }} </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details<span class="text-danger">Invoice:
                                        {{ $order->invoice_number }}</span></strong></h4>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th> Order Date: </th>
                                    <th> {{ date('F d, Y', $order->order_date) }} </th>
                                </tr>

                                <tr>
                                    <th> Payment Type: </th>
                                    <th> {{ $order->payment_type }} </th>
                                </tr>
                                <tr>
                                    <th> Tranx ID: </th>
                                    <th> {{ $order->transaction_id != null ? $order->transaction_id : '-' }} </th>
                                </tr>
                                <tr>
                                    <th> Invoice: </th>
                                    <th> {{ $order->invoice_number }} </th>
                                </tr>
                                <tr>
                                    <th> Total: </th>
                                    <th> {{ round($order->amount) }} </th>
                                </tr>
                                <tr>
                                    <th> Status: </th>
                                    <th>
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->status == 'confirmed')
                                            <span class="badge badge-info">Payment Accept</span>
                                        @elseif($order->status == 'processing')
                                            <span class="badge badge-warning">Progress</span>
                                        @elseif($order->status == 'picked')
                                            <span class="badge badge-success">Picked</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-success">Delevered</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge badge-success">Shipped</span>
                                        @elseif($order->status == 'return')
                                            <span class="badge badge-success">Returned</span>
                                        @else
                                            <span class="badge badge-danger">Cancle</span>
                                        @endif

                                    </th>

                                </tr>
                                <tr>
                                  <th></th>
                                  <th>@if ($order->status == 'pending')
                                    <a href="{{ url('admin/order-status/update/'.$order->id) }}" class="btn btn-info confirms" id="confirms">Confirmed Order</a>
                                    @elseif($order->status == 'confirmed')
                                    <a href="{{ url('admin/order-status/update/'.$order->id) }}" class="btn btn-info confirms" id="confirms">Start Processing</a>
                                    @elseif($order->status == 'processing')
                                    <a href="{{ url('admin/order-status/update/'.$order->id) }}" class="btn btn-info confirms" id="confirms">Picked Order</a>
                                    @elseif($order->status == 'picked')
                                    <a href="{{ url('admin/order-status/update/'.$order->id) }}" class="btn btn-success confirms" id="confirms">Order Shipped</a>
                                    @elseif($order->status == 'shipped')
                                    <a href="{{ url('admin/order-status/update/'.$order->id) }}" class="btn btn-success confirms" id="confirms">Delivary Done</a>
                                    @elseif($order->status == 'return')
                                    <strong class="text-danger text-center">This product is Returned </strong>
                                    @elseif($order->status == 'delivered')
                                    <strong class="text-success text-center">This product are successfuly Deliverd  </strong>
                                    @endif</th>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Product Details</strong></h4>
                        </div>
                        <div class="box-body">
                            <div class="table-wrapper">
                                <table class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Image</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Color</th>
                                            <th class="wd-15p">Size</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-20p">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderitems as $row)
                                            <tr>
                                                <td> <img
                                                        src="{{ asset('upload/products/' . $row->product->product_thambnail) }}"
                                                        height="50px;" width="50px;"> </td>
                                                <td>{{ $row->product->product_name_en }}</td>
                                                <td>{{ $row->color }}</td>
                                                <td>{{ $row->size }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->price * $row->qty }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <hr>
                                                <div class="sub-total" style="text-align: end">
                                                    
                                                    <div class="shopping-cart-total">
                                                        <h5><b>Tax : </b><span
                                                                class="shop-total">{{ round($order->tax) }}</span>
                                                        </h5>
                                                    </div>
                                                    @if ($order->discount)
                                                    <div class="shopping-cart-total">
                                                          <h5><b>Discount</b><span
                                                            class="shop-total">(-) {{ $order->discount }}</span></h5>
                                                    </div>
                                                    @endif
                                        <div class="shopping-cart-total">
                                            <h5><b>Grand Total : </b><span class="shop-total">${{ round($order->amount) }}</span>
                                            </h5>
                                        </div>


                            </div>

                            </td>
                            </tr>
                            </tfoot>
                            </table>
                        </div><!-- table-wrapper -->
                    </div>
                </div>
            </div>
            <!-- /.col -->
    </div>

    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>
@endsection

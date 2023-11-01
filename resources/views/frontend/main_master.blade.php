<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Ecommart</title>
    @include('frontend.body.style')

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('main_content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->
    <!-- ============================================================= MOdal : Start============================================================= -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="AddToCart" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="" class="card-img-top" alt="" style="width: 200px; height:200px;">
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item product_price">Price: <span id="pprice" class="text-danger"></span> <del id="oldprice">$</del></li>
                            <li class="list-group-item product_code">Code:</li>
                            <li class="list-group-item product_brand">Brand:</li>
                            <li class="list-group-item product_category">Category:</li>
                            <li class="list-group-item product_stock">Stock: <span class="badge badge-pill badge-success" id="available" style="background: green; color:white;"></span><span class="badge badge-pill badge-success" id="stockout" style="background: red; color:white;"></span></li>
                          </ul>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                              <label for="quntyControl">Quantity</label>
                              <input type="number" class="form-control" id="quntyControl" value="1" min="1">
                            </div>
                            <div class="form-group">
                              <label for="colorControl">Choose Color</label>
                              <select class="form-control" id="colorControl">
                              </select>
                            </div>
                            <div class="form-group sizeControlMian">
                              <label for="sizeControl">Choose Size</label>
                              <select class="form-control" id="sizeControl">
                              </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="product_id" id="product_id">
                                <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to cart</button>
                            </div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
        </div>

    @include('frontend.body.script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });

        // Start product View With Modal
        function productView(id){
            //alert(id)
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/product/view/modal/"+id,
                success: function(data){
                    //console.log(data)
                    $('#cartModal').modal('show');
                    $('.modal-title').text(data.product.product_name_en);
                    $('#product_id').val(data.product.id);
                    $('.card-img-top').attr('src', 'upload/products/'+data.product.product_thambnail);
                    $("#quntyControl").attr({
                        "max" : data.product.product_qty,        // substitute your own
                    });
                    $('#pprice').html('<b>$ '+data.product.selling_price+'</b>');
                    $('.product_code').html('Code: <b>'+data.product.product_code+'</b>');
                    $('.product_brand').html('Brand: <b>'+data.product.brands.brand_name+'</b>');
                    $('.product_category').html('Category: <b>'+data.product.categories.category_name+'</b>');
                    if(data.product.product_qty > 0){
                        $('#available').html('Available');
                        $('#stockout').html('');
                    }
                    else{
                        $('#available').html('');
                        $('#stockout').html('Stock Out');
                    }
                    //console.log(data.color_en.length);
                    $.each(data.color_en,function(key, value) {
                        $("#colorControl").append("<option>"+value+"</option>");
                    });
                    $.each(data.size_en,function(key, value) {
                        
                        if(data.size_en == ''){
                            // $("#sizeControl").append("<option>Free Size</option>");
                            $(".sizeControlMian").hide();
                        }
                        else{
                            $(".sizeControlMian").show();
                            $("#sizeControl").append("<option>"+value+"</option>");
                        }
                    });

                    if(data.product.discount_price == null){
                        $("#oldprice").hide();
                    }
                    else{
                        var price = data.product.selling_price-(data.product.selling_price*data.product.discount_price)/100;
                        $("#oldprice").show();
                        $("#oldprice").html(data.product.selling_price);
                        $('#pprice').html('<b>$ '+price+'</b>');
                    }
                }
            })
        }

        // Start add to Cart
        function addToCart(){
            var product_id = $('#product_id').val();
            var product_name = $('.modal-title').text();
            var qty = $('#quntyControl').val();
            var color = $('#colorControl').val();
            var size = $('#sizeControl').val();
            //alert(product_id);
            //console.log(product_id, product_name, qty, color, size)
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {product_id:product_id, qty:qty, color:color, size:size, product_name:product_name},
                url: "/cart/data/store/"+product_id,
                success: function(data){
                    //console.log(data)
                    $('#cartModal').modal('hide');
                    $('#cartShow').html(data);
                    if($.isEmptyObject(data.error)){
                        miniCart();
                        toastr.success('Product Added to Cart Successfully')
                    }
                    else{
                        toastr.error('An error occurred. Please try again.')
                    }
                   
                }
            })
        }

        function miniCart(){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/cart/mini/show",
                success: function(data){
                    console.log(data)
                    var miniCart = '';
                    $.each(data.carts, function(key, value){
                    $('.cartTotal').text(data.cartTotal);
                    $('.price').text(data.cartTotal);
                    $('.count').text(data.cartQty);
                        //console.log(value)
                        miniCart += `<div class="row" style="margin-bottom:10px;">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="{{ url('/product-details/`+value.id+`') }}"><img
                                                        src="{{ asset('upload/products/') }}/${value.options.image}"
                                                        alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7" style="padding-left: 0px;">
                                            <h3 class="name" style="margin-bottom:5px;"><a href="{{ url('/product-details/`+value.id+`') }}">`+value.name+`</a>
                                            </h3>
                                            <div class="price">$`+value.subtotal+`</div>
                                        </div>
                                        <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i
                                                    class="fa fa-trash"></i></button> </div>
                                    </div>`;
                    })
                    $('#miniCart').html(miniCart);
                    
                }
            })
        }
        miniCart();

        function miniCartRemove(id){
            //alert(rowId)
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/cart/mini/remove/"+id,
                success: function(data){
                    //console.log(data)
                    miniCart();
                    toastr.success('Product Removed from Cart Successfully')
                }
            })
        }
        

    </script>

</body>

</html>

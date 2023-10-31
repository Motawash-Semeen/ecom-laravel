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
                <h5 class="modal-title" id="exampleModalLabel">Product Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="..." style="width: 200px; height:200px;">
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Price:</li>
                            <li class="list-group-item">Code:</li>
                            <li class="list-group-item">Brand:</li>
                            <li class="list-group-item">Category:</li>
                            <li class="list-group-item">Stock:</li>
                          </ul>
                    </div>
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Quantity</label>
                              <input type="number" class="form-control" id="exampleFormControlInput1" value="1" min="1">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Choose Color</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Choose Size</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">Add to cart</button>
                            </div>
                            
                          </form>
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
                    $('.modal-title').text(data.product.product_name);
                    $('.card-img-top').attr('src', data.product.product_thambnail);
                    $('.product_price').text(data.product.product_price);
                    $('.product_code').text(data.product.product_code);
                    $('.product_brand').text(data.product.brand.brand_name);
                    $('.product_category').text(data.product.category.category_name);
                    $('.product_stock').text(data.product.product_stock);
                }
            })
        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookshop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
  <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('bootstrap-shop-template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('bootstrap-shop-template/css/style.css') }}" rel="stylesheet">

    <!-- them cho phan login -->

    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/css/responsive.css') }}">
    <!-- modernizr css -->
</head> 

<body>
	   
	    <!-- Topbar Start -->
        <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ url('home')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">N</span>Bookshop</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a>

                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" style="height: 40px;" data-dismiss="alert"></button>
                        Hi, {{session()->get('success')}}
                    </div>
                    @endif
                </a>

                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{url('customer/cart')}}" class="btn border shoppingcart">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="mini-cart-count">(
                        <!-- lay duoc thong tin da them vao gio hang  -->
                        @if(Session('Cart')!=null)
                        {{$cart->total_quantity}} |
                        {{number_format($cart->total_price) }}
                        )
                        @else
                        
                        @endif

                    </span><i class="fa fa-caret-down"></i>
                </a>

            </div>

        </div>
    </div>
    </div>
    <!-- Topbar End -->

    <script>

    </script>

	   @include("frontend.layout.navbar-trangtrong")
 <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('img/vendor-6.jpg')}}" alt="">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    @include("frontend.layout.footer")

   
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap-shop-template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('bootstrap-shop-template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('bootstrap-shop-template/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('bootstrap-shop-template/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('bootstrap-shop-template/js/main.js') }}"></script>

     <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash//assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/jquery.slicknav.min.js') }}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('srtdash-admin-dashboard-master/srtdash/assets/js/scripts.js') }}"></script>
</body>

</html>
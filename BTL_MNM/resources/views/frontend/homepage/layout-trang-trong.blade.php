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
	   
	   @include("frontend.layout.header")

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
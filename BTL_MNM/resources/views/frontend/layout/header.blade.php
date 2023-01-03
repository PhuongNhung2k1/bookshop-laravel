<style>
    .mini-cart {
        /* display: none; */
    }

    .shoppingcart:hover .mini-cart {
        display: block;
    }
</style>
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
                <span class="mini-cart-count"> 2 </span><i class="fa fa-caret-down"></i>
            </a>


        </div>
        <div class="col-lg-3 text-right col-md-3">
            <div class="nav-right">
                <li class="Heart-icon"><a href="#">
                        <i class="icon_heart_alt"></i>
                        <span>1</span>
                    </a>
                </li>
                <li class="cart-icon"><a href="#">
                        <i class="icon_bag_alt"></i>
                        <span>3</span>
                    </a>
                    <div class="cart-hover">
                        <div id="change-item-cart">

                        </div>
                        <div class="select-items">

                        </div>
                    </div>

                </li>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-3 align-content-end mini-cart">
            <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="cart"> <span class="mini-cart-count"></span> 2sản phẩm <i class="fa fa-caret-down"></i></a>
                <div class="content-mini-cart">
                    <div class="has-items">
                        <ul class="list-unstyled">

                            <li class="clearfix" id="item-1853038">
                                <div class="image"> <a href="index.php?controller=products&action=detail&id="> <img alt="" src="../assets/upload/products" title="" class="img-responsive"> </a> </div>
                                <div class="info">
                                    <h3><a href="index.php?controller=products&action=detail&id=">name</a></h3>
                                    <p>sl x price* discoun₫</p>
                                </div>
                                <div> <a href="index.php?controller=cart&action=delete&productId="> <i class="fa fa-times"></i></a> </div>
                            </li>

                        </ul>
                        <a href="index.php?controller=cart&action=checkout" class="button">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>
<!-- Topbar End -->

<script>

</script>
@extends("frontend.homepage.layout-trang-trong")
@section("load-du-lieu")
@if(Session::has('cart')!=null)
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('home')}}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <form method="post">
        @csrf
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">STT</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">TotalPrice</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $item)
                                @dd($cart->items)
                                <tr>
                                    <td></td>
                                    <td class="image product-thumbnail"><img src="{{ asset('upload/products/'.$rows['photo'])}}" height="100px" width="100px" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{url('customer/products/detail/')}}">name</a></h5>
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>pcei</span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down"><i class="fas fa-solid fa-caret-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fas fa-solid fa-caret-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>pricexsl </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="{{url('customer/delCart/') }}" class="text-muted"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted" style="background-color: #ed7070;height: 50px;width: 100px;display: inline-block;border-radius: 8px;"> <i class="fi-rs-cross-small"></i> <span style="display: inline-block;line-height: 50px;color: #fff;">Clear Cart</span></a>
                                    </td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn  mr-10 mb-sm-15" style="font-size:20px;color: orangered;text-decoration: underline;background-color: lightblue;border-radius: 5px;"><span>Update Cart</span></a>
                        <a href="{{ url('home')}}" class="btn mr-10 mb-sm-15 " style="font-size:20px;color: orangered;text-decoration: underline;background-color: lightblue;border-radius: 5px;"><i class="fi-rs-shopping-bag mr-10"></i><span>Continue Shopping</span></a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3" style="margin-top:10px;">
                                <h4>Infomation Shipping</h4>
                            </div>
                            <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900" style="font-size:18px;font-weight: bold;">Disount %</span></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Customer Information</td>
                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">phuongnhung@gmail.com</span></td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Phone</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>0902080209</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-30 mt-50">
                                <div class="form-group col-lg-6 heading_s1 mb-3">
                                    <h4>Applied Coupon</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Price</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h4>Total</h4>
                                                </td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">
                                                            <h4>price</h4>
                                                        </span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ url('customer/addCart/')}}" class="btn " style="background-color:#da9347;height: 50px;width: 200px;color: white;border-radius: 8px;font-size: 20px;"> <i class="fi-rs-box-alt mr-10"></i> Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
</main>
@endif
@endsection
@section("title")

<h5>Your Cart</h5>
@endsection
@extends("frontend.homepage.layout-trang-trong")
@section("load-du-lieu")


<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb" style="text-align: center;">
                <a href="{{ url('home')}}" rel="nofollow" style="font-size:16px;text-align:center">Home</a>
                <span> Shop - </span>
                <span> Your Cart</span>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
    @csrf
    @if(Auth::check())
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
                                    <!-- //sau khi dang nhap thi lay duoc thong tin khach hang  -->
                                    <tr>
                                        <td></td>
                                        <td class="image product-thumbnail"><img src="{{ asset('upload/products/'.$item['photo'])}}" height="100px" width="100px" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{url('customer/products/detail/')}}">{{$item['name']}}</a></h5>
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{number_format($item['price'])}}</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down"><i class="fas fa-solid fa-caret-down"></i></a>
                                                <span class="qty-val">{{$item['quantity']}}</span>
                                                <a href="#" class="qty-up"><i class="fas fa-solid fa-caret-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>{{number_format($item['price']*$item['quantity'])}} </span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="{{ route('cart.remove',['id'=>$item['id']]) }}" class="text-muted"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="{{route('cart.clear')}}" class="text-muted" style="background-color: #ed7070;height: 50px;width: 100px;display: inline-block;border-radius: 8px;">
                                                <i class="fi-rs-cross-small"></i> <span style="display: inline-block;line-height: 50px;color: #fff;">Clear Cart</span></a>
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
                                                <td class="cart_total_label">Chức danh:</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"><h4>
                                                   
                                                @if(Auth::user()->level==0)
                                                    <h5>Khách hàng</h5>
                                                    @else
                                                    <h5>Admin</h5>
                                                    @endif
                                                </h4></span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Customer Information</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"><h4>{{Auth::user()->name}}</h4></span></td>
                                            </tr>

                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Phone Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>
                                                <input type="text" name="addressship" value="{{Auth::user()->phone}}">
                                                
                                            </td>
                                            <tr>
                                                <td class="cart_total_label">Address Current Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>
                                                <input type="text" name="addressship" value="{{Auth::user()->address}}">
                                                
                                            </td>
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
                                                <tr>Quantity: {{$cart->total_quantity}}</tr>
                                                <tr>
                                                    <td class="cart_total_label">
                                                        <h4>Total Price</h4>
                                                    </td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">
                                                                <h4>{{number_format($cart->total_price)}}</h4>
                                                            </span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                   
                                    <a href="{{ url('customer/order')}}" class="btn " style="background-color:#da9347;height: 50px;width: 200px;color: white;border-radius: 8px;font-size: 20px;">
                                    <input type="submit" value="Thanh toán">
                                    </a>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </form>
</main>
@endsection
@section("title")

<h3> Cart</h3>
@endsection
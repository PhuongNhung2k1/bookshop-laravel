@extends("frontend.homepage.layout-trang-trong")

@section("load-du-lieu")
  <!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('upload/products/'.$detailProd->photo) }}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1" style="font-size: 15px;">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder">{{$detailProd->name}}</h1>
                <div class="fs-5 mb-5">
                    <span style="font-size:17px;font-weight: bold;">Gía bán : </span><span class="text-decoration-line-through" style="text-decoration: line-through;color: red;margin-right:20px;font-size: 19px;">{{ number_format($detailProd->price)}} đ   </span>
                    <span style="color: blue;margin-right:20px;font-size: 19px;">{{ number_format($detailProd->price - $detailProd->discount) }}đ</span>
                </div>
               <div class="fs-5 mb-5"><h5>Mô tả :</h5><br>
                <p style="font-size:18px;"
                    >{!! $detailProd->content !!}
                </p></div> 
                <div class="d-flex">
                     <button class="btn btn-outline-dark flex-shrink-0" type="button" style="border:1px solid #ccc;">
                        <i class="bi-cart-fill me-1"></i>
                        <a href="{{ route('cart.add',['id'=>$detailProd->id]) }}" style="font-size:18px">Add to cart</a>
                        
                         </button>
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection
 @section("title")
    <h5>Detail Products</h3>
@endsection

@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"></button>
    {{session()->get('message')}}
</div>
@endif
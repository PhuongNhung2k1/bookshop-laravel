@extends("frontend.homepage.layout-trang-trong")
@section("load-du-lieu")
 <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('home')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> You Ordered
                </div>
            </div>
        </div>
        
       
    </main>
     <div style="margin-left: 550px">
             <h3 class="font-weight-semi-bold text-uppercase mb-3">Bạn đã đặt hàng thành công!</h3>
        <a href="{{ url('home')}}" class="btn " style="background-color:orangered;height: 50px;width: 200px;color: white;border-radius: 8px;font-size: 20px;"> <i class="fi-rs-box-alt mr-10"></i> Back Home</a>
         </div>
 @endsection
@section("title")
	
	<h5>Your Cart</h5>
@endsection
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"></button>
    {{session()->get('message')}}
</div>
@endif
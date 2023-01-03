@extends("frontend.homepage.layout-trang-trong")
@section("load-du-lieu")
 <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                   
                   
                 	<div style="text-align: center;margin: 20px auto;">

                    <h3>Bạn đã đặt hàng thành công</h3>
                   <span><a href="{{ url('home')}}" style="font-size:19px;text-decoration: underline;" rel="nofollow">Back-home</a></span>
                </div>
                </div>
            </div>
        </div>
     
    </main>
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

@extends("frontend.homepage.layout-trang-trong")

@section("load-du-lieu")
    <!-- preloader area end -->
  
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in for this form</p>
                    </div>
                    <div class="login-form-body">
                       
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" style="height: 50px;" data-dismiss="alert"></button>
                            {{session()->get('error')}}
                        </div>
                        @endif
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" required>
                            <i class="ti-email"></i>
                            @if($errors->has('email'))
                            <div class="text-danger">{{$error->first('email')}}</div>
                            @endif
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                            <i class="ti-lock"></i>

                            @if($errors->has('password'))
                            <div class="text-danger" >{{$error->first('password')}}</div>
                            @endif
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" >Submit<i class="ti-arrow-right"></i></button>
                            <!-- <button id="form_submit" type="submit" ><a href="{{ url('customer/test_form')}}"> Submit</a> <i class="ti-arrow-right"></i></button> -->
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{ url('customer/register')}}">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    @endsection
@section("title")
    <h5>Login Page</h5>
@endsection

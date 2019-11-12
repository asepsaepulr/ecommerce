@extends('frontEnd.layouts.master')
@section('title','Login Register Page')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>Login</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">Login / Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
@if(Session::has('flash_message_success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif
@if(Session::has('flash_message_error'))
<div class="alert alert-error alert-block" style="background-color:#f4d2d2">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif  
       <div class="zoom-product-details">
        <div class="container">
        <div class="row">
            <div class="col-sm-7">
                    <div class="row"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" class="single-login" value="{{csrf_token()}}">
                        <div class="checkout-form-list">
                        <input type="email" placeholder="Email" class="form-control" name="email"/>
                        <br>
                        <input type="password" placeholder="Password" class="form-control" name="password"/>
                    </div>
                        <button type="submit" class="btn btn-default">Login</button>

                    </form>
                </div>
        <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
               <h2>New User Signup!</h2>
               <div class="checkout-form-list">
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <br>
                        <input type="text" placeholder="Name" name="name" class="form-control" value="{{old('name')}}"/>
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        <br>
                        <input type="email" placeholder="Email Address" name="email" class="form-control" value="{{old('email')}}"/>
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        <br>
                        <input type="password" placeholder="Password" name="password" class="form-control" value="{{old('password')}}"/>
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        <br>
                        <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                        <br>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                </div><!--/sign up form-->
            </div>
        </div>

    </div>
</div>
<div style="margin-bottom: 20px;"></div>
</div>
</div>
</div>
</div>
@endsection
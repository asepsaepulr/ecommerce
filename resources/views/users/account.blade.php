@extends('frontEnd.layouts.master')
@section('title','My Account Page')
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
    <div class="zoom-product-details">
        <div class="container">
              @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="row">
             <form action="{{url('/update-profile',$user_login->id)}}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field('PUT')}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-form">
                        <h3>Account Profile</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <label>Name<span class="required">*</span></label>
                                <div class="checkout-form-list {{$errors->has('name')?'has-error':''}}">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$user_login->name}}" placeholder="Name">
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                             <label>Address <span class="required">*</span></label>
                             <div class="checkout-form-list {{$errors->has('address')?'has-error':''}}">
                                <input type="text" class="form-control" value="{{$user_login->address}}" name="address" id="address" placeholder="Address">
                                <span class="text-danger">{{$errors->first('address')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label>City <span class="required">*</span></label>
                            <div class="checkout-form-list {{$errors->has('city')?'has-error':''}}">
                                <input type="text" class="form-control" name="city" value="{{$user_login->city}}" id="city" placeholder="City">
                                <span class="text-danger">{{$errors->first('city')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>State <span class="required">*</span></label>
                            <div class="checkout-form-list {{$errors->has('state')?'has-error':''}}">
                                <input type="text" class="form-control" name="state" value="{{$user_login->state}}" id="state" placeholder="State">
                                <span class="text-danger">{{$errors->first('state')}}</span>
                            </div>
                        </div>
                        <div class=" col-lg-12">
                            <div class="country-select">
                                <label>Country <span class="required">*</span></label>
                                <select name="country" id="country" class="form-control">
                                    @foreach($countries as $country)
                                    <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                    @endforeach
                                </select>                                     
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>PIN <span class="required">*</span></label>
                          <div class="checkout-form-list {{$errors->has('pincode')?'has-error':''}}">
                            <input type="text" class="form-control" name="pincode" value="{{$user_login->pincode}}" id="pincode" placeholder="Pincode">
                            <span class="text-danger">{{$errors->first('pincode')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <label>Phone <span class="required">*</span></label>
                     <div class="checkout-form-list {{$errors->has('mobile')?'has-error':''}}">
                        <input type="text" class="form-control" name="mobile" value="{{$user_login->mobile}}" id="mobile" placeholder="Billing Mobile">
                        <span class="text-danger">{{$errors->first('mobile')}}</span>
                    </div>
                </div>
                <div class="col-lg-12">
                 <button type="submit" class="btn btn-default" style="float: right;">Update Profile</button>
             </div>                              
         </div>
     </form>

 </div>
</div>   
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="row">
        <form action="{{url('/update-password',$user_login->id)}}" method="post" class="form-horizontal">
           <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <legend>Update New Password</legend>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            {{method_field('PUT')}}
            <div class="checkout-form-list {{$errors->has('password')?'has-error':''}}">
                <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                @if(Session::has('oldpassword'))
                <span class="text-danger">{{Session::get('oldpassword')}}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="checkout-form-list  {{$errors->has('newPassword')?'has-error':''}}">
                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                <span class="text-danger">{{$errors->first('newPassword')}}</span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="checkout-form-list  {{$errors->has('newPassword_confirmation')?'has-error':''}}">
                <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="Confirm Password">
                <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>
            </div>
        </div>
        <div class="col-lg-12">
         <button type="submit" class="btn btn-default" style="float: right;">Update Password</button>
     </div>
 </form>
</div>
</div>
</form>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@extends('frontEnd.layouts.master')
@section('title','checkOut Page')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>checkout</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area">
    <div class="checkout-area">
        <div class="container">
            @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="row">
             <form action="{{url('/submit-checkout')}}" method="post" class="form-horizontal">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                            <div class=" col-lg-12">
                                <div class="country-select">
                                    <label>Country <span class="required">*</span></label>
                                    <select name="billing_country" id="billing_country" class="form-control">
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>                                     
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <label>First Name <span class="required">*</span></label>
                                <div class="checkout-form-list {{$errors->has('billing_name')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_name" id="billing_name" value="{{$user_login->name}}" placeholder="Billing Name">
                                    <span class="text-danger">{{$errors->first('billing_name')}}</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                             <label>Address <span class="required">*</span></label>
                             <div class="checkout-form-list {{$errors->has('billing_address')?'has-error':''}}">
                                <input type="text" class="form-control" value="{{$user_login->address}}" name="billing_address" id="billing_address" placeholder="Billing Address">
                                <span class="text-danger">{{$errors->first('billing_address')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label>Town/City <span class="required">*</span></label>
                            <div class="checkout-form-list {{$errors->has('billing_city')?'has-error':''}}">
                                <input type="text" class="form-control" name="billing_city" value="{{$user_login->city}}" id="billing_city" placeholder="Billing City">
                                <span class="text-danger">{{$errors->first('billing_city')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>State/Country <span class="required">*</span></label>
                            <div class="checkout-form-list {{$errors->has('billing_state')?'has-error':''}}">
                                <input type="text" class="form-control" name="billing_state" value="{{$user_login->state}}" id="billing_state" placeholder=" Billing State">
                                <span class="text-danger">{{$errors->first('billing_state')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>PIN Code <span class="required">*</span></label>
                          <div class="checkout-form-list {{$errors->has('billing_pincode')?'has-error':''}}">
                            <input type="text" class="form-control" name="billing_pincode" value="{{$user_login->pincode}}" id="billing_pincode" placeholder=" Billing Pincode">
                            <span class="text-danger">{{$errors->first('billing_pincode')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <label>Phone <span class="required">*</span></label>
                     <div class="checkout-form-list {{$errors->has('billing_mobile')?'has-error':''}}">
                        <input type="text" class="form-control" name="billing_mobile" value="{{$user_login->mobile}}" id="billing_mobile" placeholder="Billing Mobile">
                        <span class="text-danger">{{$errors->first('billing_mobile')}}</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="checkout-form-list create-acc"> 
                        <input type="checkbox" id="cbox">
                        <label>Create an account?</label>
                    </div>
                    <div class="checkout-form-list create-account" id="cbox_info" style="display: none;">
                        <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                        <label>Account password  <span class="required">*</span></label>
                        <input type="password" placeholder="password">  
                    </div>
                </div>                              
            </div>


            <div class="different-address">
                <div class="ship-different-title">
                    <h3>
                        <label>Ship to a different address?</label>
                        <input type="checkbox" class="checkbox" name="checkme" id="checkme">
                    </h3>
                </div>
                <div class="signup-form">

                    <div class="col-lg-12">
                        <div class="country-select">
                            <label>Country <span class="required">*</span></label>
                            <select name="shipping_country" id="shipping_country" class="form-control">
                                @foreach($countries as $country)
                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>                                  
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>First Name</label>
                       <div class="checkout-form-list {{$errors->has('shipping_name')?'has-error':''}}">
                        <input type="text" class="form-control" name="shipping_name" id="shipping_name" value="" placeholder="Shipping Name">
                        <span class="text-danger">{{$errors->first('shipping_name')}}</span>
                    </div>
                </div>
                <div class="col-lg-12">
                   <label>Address <span class="required">*</span></label> 
                   <div class="checkout-form-list {{$errors->has('shipping_address')?'has-error':''}}">
                    <input type="text" class="form-control" value="" name="shipping_address" id="shipping_address" placeholder="Shipping Address">
                    <span class="text-danger">{{$errors->first('shipping_address')}}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <label>Town/City <span class="required">*</span></label>
                <div class="checkout-form-list {{$errors->has('shipping_city')?'has-error':''}}">
                    <input type="text" class="form-control" name="shipping_city" value="" id="shipping_city" placeholder="Shipping City">
                    <span class="text-danger">{{$errors->first('shipping_city')}}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>State/Country <span class="required">*</span></label>
                <div class="checkout-form-list{{$errors->has('shipping_state')?'has-error':''}}">
                    <input type="text" class="form-control" name="shipping_state" value="" id="shipping_state" placeholder="Shipping State">
                    <span class="text-danger">{{$errors->first('shipping_state')}}</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <label>PIN <span class="required">*</span></label>
               <div class="checkout-form-list {{$errors->has('shipping_pincode')?'has-error':''}}">
                <input type="text" class="form-control" name="shipping_pincode" value="" id="shipping_pincode" placeholder="Shipping Pincode">
                <span class="text-danger">{{$errors->first('shipping_pincode')}}</span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Phone <span class="required">*</span></label>
            <div class="checkout-form-list {{$errors->has('shipping_mobile')?'has-error':''}}">
                <input type="text" class="form-control" name="shipping_mobile" value="" id="shipping_mobile" placeholder="Shipping Mobile">
                <span class="text-danger">{{$errors->first('shipping_mobile')}}</span>
            </div>
        </div>                              
    </div>
</div>                                                  
</div>
</div>
@php
$cart_datas = App\Cart::all();
@endphp
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="your-order">
        <h3>Your order</h3>
        <div class="your-order-table table-responsive">
            <table>
                <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Total</th>
                    </tr>                           
                </thead>
                 @foreach($cart_datas as $cart_data)
                <tbody>
                    <tr class="order-total">
                        <td class="product-name">
                           {{$cart_data->product_name}} <strong class="product-quantity">{{$cart_data->quantity}} ×</strong>
                       </td>
                       <td class="order-total">
                        <strong><span class="amount">$ {{$cart_data->price*$cart_data->quantity}}</span><strong>
                    </td>
                </tr>
        </tbody>
        @endforeach
         <tr class="order-total">
                            <th>Total</th>
                            <td>
                                <strong>
                                    <span class="amount"><?php echo 'Rp.'.number_format($total_price)?></span>
                                </strong>
                            </td>
                        </tr>
        </table>
    </div>
    <div class="payment-method">
        <div class="payment-accordion">
            <div class="collapses-group">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Direct Bank Transfer
                              </a>
                          </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div>
                </div>
               <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="order-button-payment">
    <input type="submit" value="Place order">
</div>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
<!-- checkout-area-end -->
</div>
@endsection
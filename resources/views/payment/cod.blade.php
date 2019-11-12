@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2></h2>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
    <div class="checkout-area">
    <div class="container">
        <h3 class="text-center">THANK YOU NEXT PAYMENT CONFIRM</h3>
        <p class="text-center">Thanks for your Order that use Options on Payment Confirm</p>
        <p class="text-center">We will contact you by Your Email (<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->mobile}}</b>)</p>
    </div>
</div>
</div>
    <div style="margin-bottom: 20px;"></div>
@endsection
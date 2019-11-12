@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>Order Review</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">Order Review</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
    <div class="zoom-product-details">
        <div class="checkout-area">
            <div class="container">
                <h2 class="heading">Shipping To</h2>
            </div>
            <div class="row">
                <form action="{{url('/submit-order')}}" method="post" class="form-horizontal" multiple>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <input type="hidden" name="users_id" value="{{$shipping_address->users_id}}" multiple="">
                    <input type="hidden" name="users_email" value="{{$shipping_address->users_email}}" multiple="">
                    <input type="hidden" name="name" value="{{$shipping_address->name}}" multiple="">
                    <input type="hidden" name="address" value="{{$shipping_address->address}}" multiple="">
                    <input type="hidden" name="city" value="{{$shipping_address->city}}" multiple="">
                    <input type="hidden" name="state" value="{{$shipping_address->state}}" multiple="">
                    <input type="hidden" name="pincode" value="{{$shipping_address->pincode}}" multiple="">
                    <input type="hidden" name="country" value="{{$shipping_address->country}}" multiple="">
                    <input type="hidden" name="mobile" value="{{$shipping_address->mobile}}" multiple="">
                    <input type="hidden" name="shipping_charges" value="0" multiple="">
                    <input type="hidden" name="order_status" value="success" multiple="">
                    @if(Session::has('discount_amount_price'))
                    <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                    <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                    <input type="hidden" name="grand_total" value="{{$total_price-Session::get('discount_amount_price')}}">
                    @else
                    <input type="hidden" name="coupon_code" value="NO Coupon">
                    <input type="hidden" name="coupon_amount" value="0">
                    <input type="hidden" name="grand_total" value="{{$total_price}}">
                    @endif

                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$shipping_address->name}}</td>
                                        <td>{{$shipping_address->address}}</td>
                                        <td>{{$shipping_address->city}}</td>
                                        <td>{{$shipping_address->state}}</td>
                                        <td>{{$shipping_address->country}}</td>
                                        <td>{{$shipping_address->pincode}}</td>
                                        <td>{{$shipping_address->mobile}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <section id="cart_items">
                            <div class="review-payment">
                                <h2>Review & Payment</h2>
                            </div>
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Item</td>
                                            <td class="description"></td>
                                            <td class="price">Price</td>
                                            <td class="quantity">Quantity</td>
                                            <td class="total">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart_datas as $cart_data)
                                        <?php
                                        $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                        ?>
                                        <tr>
                                            <td class="cart_product">
                                                @foreach($image_products as $image_product)
                                                <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>
                                                @endforeach
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                                <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
                                            </td>
                                            <td class="cart_price">
                                                <p><?php echo 'Rp.'.number_format($cart_data->price)?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <p>{{$cart_data->quantity}}</p>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price"><?php echo 'Rp.'.number_format($cart_data->price*$cart_data->quantity)?></p>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tr>
                                                        <td>Cart Sub Total</td>
                                                        <td><?php echo 'Rp.'.number_format($total_price)?></td>
                                                    </tr>
                                                    @if(Session::has('discount_amount_price'))
                                                    <tr class="shipping-cost">
                                                        <td>Coupon Discount</td>
                                                        <td>$ {{Session::get('discount_amount_price')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td><span><?php echo 'Rp.'.number_format($total_price-Session::get('discount_amount_price'))?></span></td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td>Total</td>
                                                        <td><span><?php echo 'Rp.'.number_format($total_price)?></span></td>
                                                    </tr>
                                                    @endif
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{url('/submit-order')}}" method="post" class="form-horizontal" multiple>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="payment-options">
                                    <span>Select Payment Method : </span>
                                    <span>
                                        <label><input type="radio" name="payment_method" value="BANK" checked> Transfer Bank</label>
                                    </span>

                                    <button type="submit" class="btn btn-default" style="float: right;" value="order now">ORDER NOW</button>

                                </div>
                            </form>
                            </section>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
    @endsection
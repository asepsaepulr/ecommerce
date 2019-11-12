@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>cart</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area">
    <!-- cart-main-area-start -->
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="image">Item</th>
                                        <th class="description">Desc</th>
                                        <th class="price">Price</th>
                                        <th class="quantity">Quantity</th>
                                        <th class="total">Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($cart_datas as $cart_data)
                                 <?php
                                 $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                 ?>
                                 <tr>
                                   <td class="product_thumnail">
                                    @foreach($image_products as $image_product)
                                    <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>
                                    @endforeach
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                    <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
                                </td>
                                <td class="product-subtotal">
                                    <p><?php echo 'Rp.'.number_format($cart_data->price)?></p>
                                </td>
                                <td class="product-quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2">
                                        @if($cart_data->quantity>1)
                                        <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> - </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <p class="cart_total_price"><?php echo 'Rp.'.number_format($cart_data->price*$cart_data->quantity)?></p>
                                </td>
                                <td class="product-remove">
                                    <a class="cart_quantity_delete" href="{{url('/cart/deleteItem',$cart_data->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="buttons-cart mb-30 mt-3">
                <ul>
                    <li><a href="{{url('/list-products')}}">Continue Shopping</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="cart_totals">
                <h2>Cart Totals</h2>
                        <div class="order-total">
                            Total :
                           
                                <strong>
                                    <span class="amount"><?php echo 'Rp.'.number_format($total_price)?></span>
                                </strong>
                <div class="wc-proceed-to-checkout">
                    <a href="{{url('/check-out')}}">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- cart-main-area-end -->
</div>
<!-- shop-main-area-end -->
<!-- newslatter-area-start -->
<div class="newslatter-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bt-top ptb-80">
                    <div class="newlatter-content text-center">
                        <h6>Special Offers For Subscribers</h6>
                        <h3>Ten Percent Member Discount</h3>
                        <p>Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email address here..."/>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newslatter-area-end -->
<!-- footer-area-start -->
<!-- footer-area-end -->
</div>
<!-- page-wraper-start -->

</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/mimosa/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Nov 2018 02:31:06 GMT -->
</html>
@endsection

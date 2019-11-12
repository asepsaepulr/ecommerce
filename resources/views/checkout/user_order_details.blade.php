@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>User Order Details</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">review order</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="do_action">
	<div class="shop-main-area">
        <!-- cart-main-area-start -->
        <div class="cart-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <h1>Your Order code for Payment Confirm :<u>#{{ $orderDetails->id }}</u></h1>
                    </center>
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Size</th>
                                            <th>Product Color</th>
                                            <th>Product Price</th>
                                            <th>Product Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($orderDetails->orders as $pro)
                                       <tr>
                                        <td>{{ $pro->product_code }}</td>
                                        <td>{{ $pro->product_name }}</td>
                                        <td>{{ $pro->product_size }}</td>
                                        <td>{{ $pro->product_color }}</td>
                                        <td>{{ $pro->product_price }}</td>
                                        <td>{{ $pro->product_qty }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
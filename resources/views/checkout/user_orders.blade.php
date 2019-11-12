@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>User Order</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">user order</a></li>
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
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Ordered Products<br>get code</th>
                                            <th>Order Status</th>
                                            <th>Payment Method</th>
                                            <th>Grand Total</th>
                                            <th>Created on</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($orders as $order)
                                     <tr>
                                        <td>
                                         @foreach($order->orders as $pro)
                                         <a href="{{ url('/orders/'.$order->id) }}">{{ $pro->product_code }}</a><br>
                                         @endforeach
                                     </td>
                                     <td>{{ $order->order_status }}</td>
                                     <td>{{ $order->payment_method }}</td>
                                     <td><?php echo 'Rp.'.number_format($order->grand_total)?></td>
                                     <td>{{ $order->created_at }}</td>
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
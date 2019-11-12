@extends('backEnd.layouts.master')
@section('content')

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>Order #{{ $orderDetails->id }}</h1>
    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif
  </div>
<div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="card">
        <div class="card-body">
          <div class="widget-title">
            <h5>Order Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td class="taskDesc">Order Date</td>
                  <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Order Status</td>
                  <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Order Total</td>
                  <td class="taskStatus"><?php echo 'Rp.'.number_format($orderDetails->grand_total)?></td>
                </tr>
                <tr>
                  <td class="taskDesc">Shipping Charges</td>
                  <td class="taskStatus">Rp.{{ $orderDetails->shipping_charges }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Payment Method</td>
                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
        <div class="card-body">
            <div class="card">
              <div class="accordion-heading">
                <div class="accordion-group widget-box" style="padding: 30px;">
                  <h5>Billing Address</h5>
               <li>{{ $orderDetails->name }}
               </li></br>
               <li>{{ $userDetails->address }}
               </li> <br>
               <li>{{ $userDetails->city }}
               </li> <br>
               <li>{{ $userDetails->state }}
               </li> <br>
               <li>{{ $userDetails->country }}
               </li> <br>
               <li>{{ $userDetails->pincode }}
               </li> <br>
               <li>{{ $userDetails->mobile }}
               </li> <br>
           </div>
         </div>
       </div>
     </div>
  <div class="card-body">
  <div class="card">
    <div class="accordion" id="collapse-group">
      <div class="accordion-group widget-box" style="padding: 30px;">
        <h5>Shipping Address</h5>
          <li>{{ $orderDetails->name }}
          </li> <br>
          <li>{{ $orderDetails->address }}
          </li> <br>
          <li>{{ $orderDetails->city }}
          </li> <br>
          <li>{{ $orderDetails->state }}
          </li> <br>
          <li>{{ $orderDetails->country }}
          </li> <br>
          <li>{{ $orderDetails->pincode }} 
          </li><br>
          <li>{{ $orderDetails->mobile }}
          </li> <br></div>
        
      </div>
    </div>
  </div>
  <div class="card-body">
   <div class="card">
        <table class="table">
          <tbody>
            <tr>
              <td class="taskDesc">Customer Name</td>
              <td class="taskStatus">{{ $orderDetails->name }}</td>
            </tr>
            <tr>
              <td class="taskDesc">Customer Email</td>
              <td class="taskStatus">{{ $orderDetails->users_email }}</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
  <div class="card">
  <div class="card-body">
     <h5>Update Order Status</h5>
  <div class="control-group"> 
    <form action="{{ url('admin/update-order-status') }}" method="post">{{ csrf_field() }}
      <input type="hidden"  name="order_id" value="{{ $orderDetails->id }}">
      <table width="100%">
        <tr>
          <td>
            <select name="order_status" id="order_status" class="form-control" style="width:300px;" required="">
              <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
              <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
              <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
              <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
              <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
              <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
              <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
            </select>
          </td>
          <td>
            <input type="submit" class="btn btn-success btn-xs" value="Update Status">
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
</div>
<div class="card-body">
  <div class="card">
    <table id="example" class="table" style="width:100%">
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
</div>
</div>
</div>
<!--main-container-part-->

@endsection
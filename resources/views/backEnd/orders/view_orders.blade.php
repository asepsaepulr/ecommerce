@extends('backEnd.layouts.master')
@section('title','List Categories')
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

  } );
</script>
@section('content')
  <div id="content-header">
   <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
<div class="row">
  <div class="col-lg-12">
   <h1>Orders</h1>
    @if(Session::has('flash_message_error'))
      <div class="alert alert-error alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
      </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
</div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Order</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                  <th>Code Order</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <th>Payment Method</th>
                  <th>Actions</th>
                </tr>
            </thead>
             <tbody>
                @foreach($orders as $order)
                <tr class="gradeX">
                  <td class="center">{{ $order->id }}</td>
                  <td class="center">{{ $order->created_at }}</td>
                  <td class="center">{{ $order->name }}</td>
                  <td class="center">{{ $order->users_email}}</td>
                <td class="center">
                     @foreach($order->orders as $pro)
                    {{ $pro->product_code }}
                    ({{ $pro->product_qty }})
                    <br>
                    @endforeach
                  </td>
                  <td class="center"><?php echo 'Rp.'.number_format($order->grand_total)?></td>
                  <td class="center">{{ $order->order_status }}</td>
                  <td class="center">{{ $order->payment_method }}</td>
                  <td class="center">
                    <a target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-success btn-mini">View Order Details</a> 
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
<script>
  $(".deleteRecord").click(function () {
   var id=$(this).attr('rel');
   var deleteFunction=$(this).attr('rel1');
   swal({
     title:'Are you sure?',
     text:"You won't be able to revert this!",
     type:'warning',
     showCancelButton:true,
     confirmButtonColor:'#3085d6',
     cancelButtonColor:'#d33',
     confirmButtonText:'Yes, delete it!',
     cancelButtonText:'No, cancel!',
     confirmButtonClass:'btn btn-success',
     cancelButtonClass:'btn btn-danger',
     buttonsStyling:false,
     reverseButtons:true
   },function () {
    window.location.href="/admin/"+deleteFunction+"/"+id;
  });
 });
</script>
@endsection
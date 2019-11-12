@extends('backEnd.layouts.master')
@section('title','List payment')
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

  } );
</script>
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('payment.index')}}" class="current">Payment Confirm</a></div>
<div class="row">
  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
        <h4 class="card-title">Data Payment Confirm</h4>
        
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>Email</th>
                <th>Nama Pemesan</th>
                <th>Kode Order</th>
                <th>Pemilik Rekening</th>
                <th>Transfer</th>
                <th>Nominal</th>
                <th>Note</th>
                <th>gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($payment as $data)
              <tr>
                <td class="py-1">
                  {{$data->email}}
                </td>
                <td>{{$data->name_order}} </td>
                <td>{{$data->code_order}}</td>
                <td>{{$data->owner_rekening}}</td>
                <td>{{$data->transfer}}</td>
                <td><?php echo 'Rp.'.number_format($data->nominal_pembayaran)?></td>
                <td>{{$data->note}}</td>
                <td><a href="" class="thumbnail">
                  <img src=" {{ asset ('assets/img/payment/' .$data->gambar. '' ) }}" width="100" height="100"></td>
                  <td>
                    <a href="#myModal{{$data->id}}" data-toggle="modal" class="btn btn-info btn-xs">View</a>
                  </td>
                </tr>
                {{--Pop Up Model for View Product--}}
                <div id="myModal{{$data->id}}" class="modal hide">
                  <div class="modal-body">
                    <div class="card">
                      <div class="text-center"><img src="{{ asset ('assets/img/payment/' .$data->gambar. '' ) }}" width="400"></div>
                      <h2><p class="text-center">Nama Order :{{$data->name_order}}</p></h2>
                      <button data-dismiss="modal" class="close" type="button">×</button>
                    </div>
                  </div>
                </div>
                {{--Pop Up Model for View data--}}
                @endforeach
              </tbody>
            </table>
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
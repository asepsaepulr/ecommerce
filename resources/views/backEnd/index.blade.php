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
<div class="row">
    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Category</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$categories->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-1 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh category
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-tshirt-crew text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Product</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$products->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total seluruh product
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-image-filter text-primary icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Slider</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$galeri->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i>Total seluruh slider
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-format-align-left text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Blog</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$artikel->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i>Total seluruh blog
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xl-6 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube-outline text-black icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Order</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$order->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i>Total seluruh order
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xl-6 col-lg-4 col-md-5 col-sm-8 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cash-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Payment Confirm</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$payment->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i>Total seluruh Payment
                  </p>
                </div>
              </div>
            </div>
</div>
<div class="row">
  <div class="col-lg-2">
  </div>
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
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
  <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('galeri.index')}}" class="current">Slider</a></div>
<div class="row">
    <div class="col-lg-2">
    <a href="{{url('/admin/galeri/create')}}" class="btn btn-primary btn-rounded btn-fw right full-right"><i class="mdi mdi-plus"></i>Add</a>
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
        <h4 class="card-title">Data Kategori</h4>
        
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Galeri</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($galeri as $data)  
              <tr>
                <td class="py-1">
                    {{$data->id}}
                </td>
                 <td><img src="{{ asset('assets/img/galeri/'.$data->gambar)}}" style="text-align: center;" alt="" width="50"> </td>  
                <td>
               <a href="{{route('galeri.edit',$data->id)}}" class="btn btn-primary btn-xs">Edit</a>
              <a href="javascript:" rel="{{$data->id}}" rel1="delete-data" class="btn btn-danger btn-xs deleteRecord">Delete</a>
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

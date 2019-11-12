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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> / <a href="#" class="current">View Users</a> </div>
<div class="row">
  <div class="col-lg-12">
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
        <h4 class="card-title">Data User</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Pincode</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Registered on</th>
                </tr>
            </thead>
             <tbody>
                @foreach($users as $user)
                <tr class="gradeX">
                  <td class="center">{{ $user->id }}</td>
                  <td class="center">{{ $user->name }}</td>
                  <td class="center">{{ $user->address }}</td>
                  <td class="center">{{ $user->city }}</td>
                  <td class="center">{{ $user->state }}</td>
                  <td class="center">{{ $user->country }}</td>
                  <td class="center">{{ $user->pincode }}</td>
                  <td class="center">{{ $user->mobile }}</td>
                  <td class="center">{{ $user->email }}</td>
                  <td class="center">
                    @if($user->status==1)
                      <span style="color:green">Active</span>
                    @else
                      <span style="color:red">Inactive</span>
                    @endif
                  </td>
                  <td class="center">{{ $user->created_at }}</td>
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
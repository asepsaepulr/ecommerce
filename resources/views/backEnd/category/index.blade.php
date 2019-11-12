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
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('category.index')}}" class="current">Categories</a></div>
<div class="row">
  <div class="col-lg-2">
    <a href="{{url('/admin/category/create')}}" class="btn btn-primary btn-rounded btn-fw right full-right"><i class="mdi mdi-plus"></i>Add</a>
  </div>
  <script src="{{ asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
  <div class="col-lg-12">
   @if(Session::has('message'))
   <div class="alert alert-success text-center" role="alert">
    <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
  </div>
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
                <th>Category Name</th>
                <th>Parent Category</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <?php
              $parent_cates = DB::table('categories')->select('name')->where('id',$category->parent_id)->get();
              ?>
              <tr>
                <td class="py-1">
                 {{$category->name}}
               </td>
               <td>
                @foreach($parent_cates as $parent_cate)
                {{$parent_cate->name}}
                @endforeach
              </td> <td style="text-align: center;">{{$category->created_at->diffForHumans()}}</td>
              <td style="text-align: center;">{{($category->status==0)?' Disabled':'Enable'}}</td>
              <td style="text-align: center;">
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-xs">Edit</a>
                <a href="javascript:" rel="{{$category->id}}" rel1="delete-category" class="btn btn-danger btn-xs deleteRecord">Delete</a>
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
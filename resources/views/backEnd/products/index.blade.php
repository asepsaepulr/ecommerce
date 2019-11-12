  @extends('backEnd.layouts.master')
  @section('title','List Products')
  @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable({
        "iDisplayLength": 10
      });

    } );
  </script>
  @section('content')
  <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('product.index')}}" class="current">Products</a></div>
  <div class="row">
   <div class="col-lg-2">
    <a href="{{url('/admin/product/create')}}" class="btn btn-primary btn-rounded btn-fw right full-right"><i class="mdi mdi-plus"></i> Add</a>
  </div>
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
        <h5>List Products</h5>
      <div class="table-responsive table-sm">
        <table class="table table-striped" id="table" width="600px">
          <thead>
            <tr>
             <th>ID</th>
             <th>Image</th>
             <th>Product Name</th>
             <th>Under Category</th>
             <th>Code Of Product</th>
             <th>Product Color</th>
             <th>Price</th>
             <th>Image Gallery</th>
             <th>Add Attribute</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           @foreach($products as $product)
           <?php $i++; ?>
           <tr class="gradeC">
            <td>{{$i}}</td>
            <td style="text-align: center;"><img src="{{url('products/small',$product->image)}}" alt="" width="50"></td>
            <td style="vertical-align: middle;">{{$product->p_name}}</td>
            <td style="vertical-align: middle;">{{$product->category->name}}</td>
            <td style="vertical-align: middle;">{{$product->p_code}}</td>
            <td style="vertical-align: middle;">{{$product->p_color}}</td>
            <td style="vertical-align: middle;"><?php echo 'Rp.'.number_format($product->price)?></td>
            <td style="vertical-align: middle;text-align: center;"><a href="{{route('image-gallery.show',$product->id)}}" class="btn btn-warning btn-xs">Add Images</a></td>
            <td style="vertical-align: middle;text-align: center;"><a href="{{route('product_attr.show',$product->id)}}" class="btn btn-success btn-xs">Add Attr</a></td>
            <td style="text-align: center; vertical-align: middle;">
              <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-info btn-xs">View</a>
              <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-xs">Edit</a>
              <a href="javascript:" rel="{{$product->id}}" rel1="delete-product" class="btn btn-danger btn-xs deleteRecord">Delete</a>
            </td>
          </tr>
          {{--Pop Up Model for View Product--}}
          <div id="myModal{{$product->id}}" class="modal hide">
            <div class="modal-body">
              <div class="card">
              <div class="text-center"><img src="{{url('products/small',$product->image)}}" width="400" alt="{{$product->p_code}}"></div>
              <h3><p class="text-center">{{$product->p_name}}</p></h3>
              <p class="text-center">{!!$product->description!!}</p>
              <button data-dismiss="modal" class="close" type="button">×</button>
            </div>
            </div>
          </div>
          {{--Pop Up Model for View Product--}}
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


@extends('backEnd.layouts.master')
@section('title','Add Category')
@section('js')
<script type="text/javascript">

    $(document).ready(function() {
        $(".users").select2();
    });

</script>
@section('content')
<div class="card-header">
 <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('product.index')}}">Products</a> / <a href="{{route('product.create')}}" class="current">Add New Product</a> </div>
 @if(Session::has('message'))
 <div class="alert alert-success text-center" role="alert">
    <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
</div>
@endif
<div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-box"></i> </span>
                    <h5>Add New Products</h5>
                </div>
                <div class="card-body">
                 <form action="{{route('product.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="control-group">
                        <label class="control-label">Select Category</label>
                            <select name="categories_id"  class="form-control" style="width: 200px;">
                                @foreach($categories as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    <?php
                                        if($key!=0){
                                            $sub_categories=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                            if(count($sub_categories)>0){
                                                foreach ($sub_categories as $sub_category){
                                                    echo '<option value="'.$sub_category->id.'">&nbsp;&nbsp;--'.$sub_category->name.'</option>';
                                                }
                                            }
                                        }
                                    ?>
                                @endforeach
                            </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="control-group">
                        <label for="p_name" class="control-label">Name</label>
                        <div class="controls{{$errors->has('p_name')?' has-error':''}}">
                            <input type="text" name="p_name" id="p_name" class="form-control" value="{{old('p_name')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_name')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="p_code" class="control-label">Code</label>
                        <div class="controls{{$errors->has('p_code')?' has-error':''}}">
                            <input type="text" name="p_code" id="p_code" class="form-control" value="{{old('p_code')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_code')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="p_color" class="control-label">Color</label>
                        <div class="controls{{$errors->has('p_color')?' has-error':''}}">
                            <input type="text" name="p_color" id="p_color" class="form-control" value="{{old('p_color')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_color')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="control-group">
                        <label for="price" class="control-label">Price</label>
                        <div class="controls{{$errors->has('price')?' has-error':''}}">
                            <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="control-group">
                        <label for="description" class="control-label">Description</label>
                        <div class="controls{{$errors->has('description')?' has-error':''}}">
                            <textarea class="ckeditor" name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;">{{old('description')}}</textarea>
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Image upload</label>
                        <div class="controls">
                            <input type="file" class="dropify" name="image" id="image"/>
                            <span class="text-danger">{{$errors->first('image')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add New Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
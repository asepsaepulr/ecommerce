@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
<div class="card-header">
   <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('product.index')}}">Products</a> / <a href="#" class="current">Edit Product</a> </div>
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
                    <h5>Edit New Products</h5>
                </div>
                <div class="card-body"> 
            <form  class="form-group" action="{{route('product.update',$edit_product->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form">
                    <input type="hidden" name="_token"  value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <div class="form-group">
                        <label class="form-label">Select Category</label>
                        <div class="form-group">
                            <select name="categories_id" class="form-control" style="width: 200px;">
                                @foreach($categories as $key=>$value)
                                <option value="{{$key}}"{{$edit_category->id==$key?' selected':''}}>{{$value}}</option>
                                <?php
                                if($key!=0){
                                    $sub_categories=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                    if(count($sub_categories)>0){
                                        foreach ($sub_categories as $sub_category){?>
                                            <option value="{{$sub_category->id}}"{{$edit_category->id==$sub_category->id?' selected':''}}>&nbsp;&nbsp;--{{$sub_category->name}}</option>
                                        <?php }
                                    }
                                }
                                ?>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                   <div class="control-group">
                        <label for="p_name" class="control-label">Name</label>
                        <div class="controls{{$errors->has('p_name')?' has-error':''}}">
                            <input type="text" name="p_name" id="p_name" class="form-control" value="{{$edit_product->p_name}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_name')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="p_code" class="control-label">Code</label>
                        <div class="controls{{$errors->has('p_code')?' has-error':''}}">
                            <input type="text" name="p_code" id="p_code" class="form-control" value="{{$edit_product->p_code}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_code')}}</span>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="control-group">
                        <label for="p_color" class="control-label">Color</label>
                        <div class="controls{{$errors->has('p_color')?' has-error':''}}">
                            <input type="text" name="p_color" id="p_color" class="form-control" value="{{$edit_product->p_color}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('p_color')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group">
                        <label for="price" class="control-label">Price</label>
                        <div class="controls{{$errors->has('price')?' has-error':''}}">
                            <input type="number" name="price" id="price" class="form-control" value="{{$edit_product->price}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        </div>
                    </div>
                </div>

            </div>
                   <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <div class="form-group{{$errors->has('description')?' has-error':''}}">
                        <textarea  type="ckeditor" class="ckeditor"  name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;">{{$edit_product->description}}</textarea>
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="form-label">Image upload</label>
                    <div class="form-group">
                        <input type="file" class="dropify" name="image" id="image"/>
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        @if($edit_product->image!='')
                        &nbsp;&nbsp;&nbsp;
                        <a href="javascript:" rel="{{$edit_product->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                        <img src="{{url('products/small/',$edit_product->image)}}" width="35" alt="">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label"></label>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Edit Product</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
</div>
</div>
@endsection

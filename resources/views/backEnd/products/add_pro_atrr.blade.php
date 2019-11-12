@extends('backEnd.layouts.master')
@section('title','Add Attribute')
@section('content')
<div class="card-header">
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('product.index')}}">Products</a> / <a href="#" class="current">Add Attribute</a> </div>
    <div class="container-fluid">
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
                        <h5>Add New Images</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body ">
                                <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                                    <h5>Product : {{$product->p_name}}</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <ul class="recent-posts">
                                        <li>
                                            <div class="user-thumb"> <img width="120" height="120" alt="User" src="{{url('products/small',$product->image)}}"> </div>
                                            <div class="article-post">
                                                <span class="user-info">Product Code : <b>{{$product->p_code}}</b></span>
                                                <p>Product Color : <b>{{$product->p_color}}</b></p>
                                                <p>Product Price : <b><?php echo 'Rp.'.number_format($product->price)?></b></p>
                                            </div>
                                        </li>
                                        <li>
                                            <form action="{{route('product_attr.store')}}" method="post" role="form"> 
                                                    <legend>Add Attribute</legend>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="products_id" value="{{$product->id}}">
                                                    <p>
                                                        <input type="text" name="sku" value="{{old('sku')}}" id="sku" placeholder="SKU" required>
                                                    </p>
                                                    <p>
                                                        <input type="text" name="size" value="{{old('size')}}" id="size" placeholder="Size" required>
                                                    </p>
                                                    <p>
                                                        <input type="number" name="price" value="{{old('price')}}" id="price" placeholder="Price" required>
                                                        <span style="color: red;">{{$errors->first('price')}}</span>
                                                    </p>
                                                    <p>
                                                        <input type="number" name="stock" value="{{old('stock')}}" id="stock" placeholder="Stock" required>
                                                    </p>                                            
                                                <button type="submit" class="btn btn-success">Add</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-md-2 col-sm-2 ">
                                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                                        <h5>List Products Attribute</h5>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <form action="{{route('product_attr.update',$product->id)}}" method="post" role="form">
                                            {{method_field("PUT")}}
                                            <div class="col-md-12">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SKU</th>
                                                        <th>Size</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($attributes as $attribute)
                                                    <input type="hidden" name="id[]" value="{{$attribute->id}}">
                                                    <tr>
                                                        <td class="taskDesc">
                                                            <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" required="required" style="width: 70px;">
                                                        </td>
                                                        <td class="taskStatus">
                                                            <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" required="required" style="width: 40px;">
                                                        </td>
                                                        <td class="taskOptions">
                                                            <input type="text" name="price[]" id="price" class="form-control" value="{{$attribute->price}}" required="required" style="width: 40px;">
                                                        </td>
                                                        <td class="taskOptions">
                                                            <input type="text" name="stock[]" id="stock" class="form-control" value="{{$attribute->stock}}" required="required" style="width: 40px;">
                                                        </td>
                                                        <td style="text-align: center; ">
                                                            <button type="submit" class="btn btn-success btn-xs">Edit</button>
                                                            <a href="javascript:" rel="{{$attribute->id}}" rel1="delete-attribute" class="btn btn-danger btn-xs deleteRecord">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                          </table>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
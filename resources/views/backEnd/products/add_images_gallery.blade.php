@extends('backEnd.layouts.master')
@section('title','Add Images Gallery')
@section('content')
<div class="card-header">
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('product.index')}}">Products</a> / <a href="#" class="current">Add Images Gallery</a> </div>
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
                        <div class="col-sm-6">
                            <div class="card-body">
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
                                            </div>
                                        </li>
                                        <li>
                                            <form action="{{route('image-gallery.store')}}" method="post" role="form" enctype="multipart/form-data">
                                                <legend>Can Add Multi Images</legend>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <input type="hidden" name="products_id" value="{{$product->id}}">
                                                    <input type="file" name="image[]" id="id_imageGallery" class="dropify" multiple="multiple" required>
                                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                                </div>
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-xs-2 col-md-2 col-sm-2 ">
                        <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                            <h5>List Images Galleries</h5>
                        </div>
                        <div class="col-xs-4 col-md-4 col-sm-4 ">
                            <div class="widget-content nopadding">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($imageGalleries as $imageGallery)
                                        <tr>
                                            <td class="taskDesc" style="text-align: center;vertical-align: middle;">{{$i++}}</td>
                                            <td class="taskOptions" style="text-align: center;vertical-align: middle;"><img src="{{url('products/small',$imageGallery->image)}}" class="img-responsive" alt="Image" width="60"></td>
                                            <td style="text-align: center;vertical-align: middle;"><a href="javascript:" rel="{{$imageGallery->id}}" rel1="delete-imageGallery" class="btn btn-danger btn-xs deleteRecord">Delete</a></td>
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
    </div>
</div>
</div>
        @endsection
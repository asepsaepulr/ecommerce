@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('header')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>product details</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">product details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area">
    <div class="container">
        <div class="row">

            @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="product-details">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('products/large',$detail_product->image)}}">
                        <img style="width:350px"; src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage"/>
                    </a>
                </div>
                <div id="gallery" class="mt-60">
                    <ul class="thumbnails" style="margin-left: 20px;">
                        <li>
                            @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="120" style="padding: 10px;">
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <!-- zoom-area-end -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <div class="zoom-product-details">
                <!-- zoom-product-details-start -->
                <form action="{{route('addToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                    <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                    <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h3>{{$detail_product->p_name}}</h3>
                        <h6>{{$detail_product->category->name}}</h6>
                        <h3><span id="dynamic_price"><?php echo 'Rp.'.number_format($detail_product->price)?></span></h3>
                        <span>

                            <span>
                                <select name="size" id="idSize" >
                                    <option value="">Select Size</option>
                                    @foreach($detail_product->attributes as $attrs)
                                    <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                                    @endforeach
                                </select>
                            </span>
                            <span>
                                <input type="text" name="quantity" value="1" id="inputStock"/>
                            </span>
                            @if($totalStock>0)
                            <button type="submit" class="quantity-button" id="buttonAddToCart">
                                ADD TO CART
                            </button>
                            @endif
                        </span>
                        <h4>
                           Description :{!!$detail_product->description!!}
                           <br>
                           Availability :
                           @if($totalStock>0)
                           <span id="availableStock">In Stock</span>
                           @else
                           <span id="availableStock">Out of Stock</span>
                           @endif
                           <br>
                           Condition : New
                       </h4>
                       <a href=""><img src="{{asset('assets/img/footeri.jpeg')}}" class="" style="width:500px;" style="height:20;"  alt="" /></a>
                   </div><!--/product-information-->
               </form>
           </div>
           <!-- zoom-product-details-end -->
       </div>
   </div>
</div>
</div>
</div>

<div class="feature-product-area ptb-80">   
    <div class="container">
        <div class="row">
            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane active" id="products">
                    <div class="row">
                        <div class="product-active">
                            <?php $count=1; ?>
                            @foreach($relateProducts->chunk(3) as $chunk)
                            <?php if($count==1){ ?>  <?php } else { ?>  <?php } ?> 
                            @foreach($chunk as $item)
                            <div class="col-lg-12">
                                <!-- product-wrapper-start -->
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{url('products/small/',$item->image)}}" alt="product" class="primary"/>
                                        </a>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="#">Aldohc</a>
                                        </div>
                                        <h2><a href="#">{{$item->p_name}}</a></h2>
                                        <h3><?php echo 'Rp.'.number_format($item->price)?></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <?php $count++; ?>
                            @endforeach
                        </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/recommended_items-->
@endsection
@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>Search Product</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">search product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('frontEnd.layouts.category_menu')
            </div>
           <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
               <div class="shop-right-area mb-40-2 mb-30"><!--features_items-->
                   <h2 class="title text-center">
						@if(!empty($search_product))
							{{ $search_product }} 
						@else
							{{ $plucked->name }} Items
						@endif
					</h2>
					@foreach($products as $product)
                        @if($product->category->status==1)
                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <!-- product-wrapper-start -->
                                <div class="product-wrapper mb-40">

                                    <div class="product-img">
                                        <a href="{{url('/product-detail',$product->id)}}">
                                            <img src="{{url('products/small/',$product->image)}}" alt="product" class="primary"/>
                                        </a>
                                        <div class="product-icon">
                                        <a href="{{url('/product-detail',$product->id)}}"style="width: 200px;" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                    </div>  
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="#">Aldohc</a>
                                        </div>
                                        <h2> <a href="{{url('/product-detail',$product->id)}}"><h6>{{$product->p_name}}</h6></</h2>
                                            <h3><?php echo 'Rp.'.number_format($product->price)?></h3>
                                        </div>

                                    </div>
                                    <!-- product-wrapper-end -->
                                </div>
                        @endif
                    @endforeach
                    {{--<ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>--}}
                </div><!--features_items-->
            </div>
        </div>
    </div>
</div>
@endsection
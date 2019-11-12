@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
<section>
    @php
    $galeris = App\Galeri::all();
    @endphp
    <div class="slider-area">
        <div id="slider">
            @foreach($galeris as $data)
            <img src="{{ asset('assets/img/galeri/'.$data->gambar)}}"  alt="slider-img" title="#caption1" />
            @endforeach
        </div>
        
    </div>
    <div class="banner-area-2">
        <div class="container">
            <div class="row">
                <div class="br-bottom ptb-80">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <!-- single-banner-2-start -->
                        <div class="single-banner-2 text-center mb-3">
                            <div class="banner-icon">
                                <a href="#"><img src="{{asset('/frontend/img/banner/2.png')}}" alt="banner" /></a>
                            </div>
                            <div class="banner-text">
                                <h2>Free Shipping </h2>
                                <p>It is surprising to note that written in Gothic I think it's clear now</p>
                            </div>
                        </div>
                        <!-- single-banner-2-end -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <!-- single-banner-2-start -->
                        <div class="single-banner-2 text-center mb-3">
                            <div class="banner-icon">
                                <a href="#"><img src="{{asset('/frontend/img/banner/3.png')}}" alt="banner" /></a>
                            </div>
                            <div class="banner-text">
                                <h2>Money Back Guarantee</h2>
                                <p>It is surprising to note that written in Gothic I think it's clear now</p>
                            </div>
                        </div>
                        <!-- single-banner-2-end -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <!-- single-banner-2-start -->
                        <div class="single-banner-2 text-center">
                            <div class="banner-icon">
                                <a href="#"><img src="{{asset('/frontend/img/banner/4.png')}}" alt="banner" /></a>
                            </div>
                            <div class="banner-text">
                                <h2>online support 24/7</h2>
                                <p>It is surprising to note that written in Gothic I think it's clear now</p>
                            </div>
                        </div>
                        <!-- single-banner-2-end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <div class="row">
        <div class="col-lg-12">
            <div class="bt-top ptb-80">
            <div class="section-title mb-30 text-center">
                <h2>Featured Products</h2>
                <p>
It is surprising to note that written in Gothic I think it is clear now that anteposuerit forms of literature.</p>
            </div>
        </div>
    </div>   
</div>
    <!-- feature-product-area-start -->
    <div class="feature-product-area">   
        <div class="container">

            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane active" id="products">
                    <div class="row">
                        <div class="product-active">
                          @foreach($products as $product)
                          @if($product->category->status==1)
                          <div class="col-lg-12">
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
                                    <h2><a href="{{url('/product-detail',$product->id)}}">{{$product->p_name}}</a></h2>                              
                                 <h3><?php echo 'Rp.'.number_format($product->price)?></h3>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tab-area-end -->
</div>
@php
$artikels = App\Artikel::paginate(4);
@endphp
<div class="blog-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bt-top ptb-80">
                <div class="section-title mb-30 text-center">
                    <h2>From Our Blog</h2>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas.</p>
                </div>
            </div>
            
            <div class="blog-active">
                @foreach($artikels as $data)
                <div class="col-lg-12">
                    <!-- single-blog-start -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="{{url('/artikels/blogdetails/'.$data->slug)}}"><img src=" {{ asset ('assets/img/artikel/' .$data->gambar. '' ) }}" alt="blog" /></a>
                            <div class="date"><b><?php echo date('d F y' ,strtotime($data->created_at))?></b>
                            </div>
                        </div>
                        <div class="blog-content pt-20">
                            <h3><a href="{{url('/artikels/blogdetails/'.$data->slug)}}">{{ $data->judul }}</a></h3>
                            <span>HasTech</span>
                            <p>{!!substr ($data->deskripsi,0,400) !!}.....</p>
                            <a href="{{url('/artikels/blogdetails/'.$data->slug)}}">Read more ...</a>
                        </div>
                    </div>
                    <!-- single-blog-end -->
                </div>
                @endforeach
                <!-- single-blog-end -->
            </div>
        </div>
    </div>
    </div>
</div>
<!-- blog-area-end -->
<!-- newslatter-area-start -->
<div class="newslatter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bt-top ptb-80">
                    <div class="newlatter-content text-center">
                        <h6>Special Offers For Subscribers</h6>
                        <h3>Ten Percent Member Discount</h3>
                        <p>Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email address here..."/>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
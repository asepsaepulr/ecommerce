@extends('frontEnd.layouts.master')
@section('title','Blog Page')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<h2>blog</h2>
					<ul>
						<li><a href="#">Home /</a></li>
						<li class="active"><a href="#">blog</a></li>
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
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<!-- blog-total-area-start -->
				<div class="blog-total-area">
					<div class="row">
						@foreach($artikels as $data)
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

							<!-- single-blog-2-start -->
							<div class="single-blog single-blog-2 mb-30">
								<div class="blog-2-img">
									<a href="{{url('/artikels/blogdetails/'.$data->slug)}}"><img src=" {{ asset ('assets/img/artikel/' .$data->gambar. '' ) }}"alt="man" /></a>
								</div>
								<div class="blog-2-content blog-content">
									<h3><a href="{{url('/artikels/blogdetails/'.$data->slug)}}">{!! substr($data->judul,0,100)!!}</a></h3>
									<span>HasTech</span>
									<p>{!!substr ($data->deskripsi,0,400) !!}.....</p>
									<a href="{{url('/artikels/blogdetails/'.$data->slug)}}">Read more ...</a>
									<div class="meta">
										<a href="#"><i class="fa fa-user"></i>rong</a>
										<a href="#"><i class="fa fa-heart-o"></i>30 Likes</a>
									</div>
								</div>
							</div>

							<!-- single-blog-2-end -->
						</div>
						@endforeach
					</div>
					<!-- page-numbers-start -->
					<div class="page-numbers mb-3">
						<ul>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div>
					<!-- page-numbers-end -->
				</div>
				<!-- blog-total-area-end -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<!-- blog-right-area-start -->
				<div class="blog-right-area">
					<!-- blog-right-start -->
					<div class="blog-right mb-50 mb-3">
						<form action="#">
							<input type="text" placeholder="Search Here"/>
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- blog-right-end -->
					<!-- blog-right-start -->
					<div class="blog-right mb-50 mb-3">
						@php
						$artikels = App\Artikel::all();
						@endphp
						<div class="blog-right mb-50 mb-3">
							<h3>Recent Post</h3>
							@foreach($artikels as $data)
							<div class="sidebar-post">
								<!-- single-post-start -->
								<div class="single-post mb-20">

									<div class="post-img">
										<a href="#"><img src=" {{ asset ('assets/img/artikel/' .$data->gambar. '' ) }}" alt="post" /></a>
									</div>
									<div class="post-text">
										<h4><a href="{{url('/artikels/blogdetails/'.$data->slug)}}">{!! substr($data->judul,0,100)!!}></a></h4>
										<span><?php echo date('d F Y' ,strtotime($data->created_at))?></span>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						
					<!-- blog-right-area-end -->
				</div>
			</div>
		</div>
	</div>
	<!-- shop-main-area-end -->
	<!-- newslatter-area-start -->
	<div class="newslatter-area pt-80">
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
	@endsection
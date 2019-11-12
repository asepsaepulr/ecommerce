@extends('frontEnd.layouts.master')
@section('title','Blog Detail')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<h2>blog details</h2>
					<ul>
						<li><a href="#">Home /</a></li>
						<li class="active"><a href="#">blog details</a></li>
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
				<!-- blog-details-area-start -->
				<div class="blog-details-area mb-40-2">
					<div class="blog-details-img">
						<a href="#"><img src="{{ asset ('assets/img/artikel/' .$artikels->gambar. '' ) }}"alt="banner" /></a>
					</div>
					<div class="blog-info">
						<h3><a href="#">{!! substr($artikels->judul,0,100)!!}</a></h3>
						<p>{!!$artikels->deskripsi!!}</p>
						<br />
						
						<div class="next-prev-area">
							
						</div>
					</div>
					<!-- comments-area-start -->
					
					<div id="disqus_thread"></div>
					<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://ujikom-ecommerce-aldo.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<!-- comment-respond-area-end -->
</div>
<!-- blog-details-area-end -->
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
		<!-- blog-right-end -->
		<!-- blog-right-start -->
		<!-- blog-right-start -->
		
		<!-- blog-right-end -->
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

<!-- all js here -->
<!-- jquery latest version -->
@endsection
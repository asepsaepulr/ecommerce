@extends('layouts.app')
@section('content')
<html>
	<head>
		
<style>
    h4{font-size:20px;position: fixed;left: 60%;
       color: #2a70ad;
       text-align: center;
    text-transform: capitalize;}
    #b{width: 400px;}
    p{color: #4b9303;
      font-weight: 1000;font-size: 25px}
        </style>
		<link rel="stylesheet" href="{{asset('/zoomi/css/jquery.wm-zoom-1.0.min.css')}}">
    </head>
	<body>
					  			<div class="wm-zoom-container my-zoom-1">
			  				<div class="wm-zoom-box"><h4>Type 1 zoom
                             effect created by <p>Right way in technology</p></h4>
								<img id="b" src="{{asset('/zoomi/img/3.jpg')}}"  class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/3.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div><br><hr><br>	


        <div class="wm-zoom-container my-zoom-2">
			  				<div class="wm-zoom-box"><h4>Type 2 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/3.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/3.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div><br><hr><br>
			  			<div class="wm-zoom-container my-zoom-1">
			  				<div class="wm-zoom-box"><h4>Type 1 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/1.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/1.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div>



			  			<br><hr><br><div class="wm-zoom-container my-zoom-2">
			  				<div class="wm-zoom-box"><h4>Type 2 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/1.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/1.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div>

			  			<br><hr><br>
			  			<div class="wm-zoom-container my-zoom-1">
			  				<div class="wm-zoom-box"><h4>Type 1 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/2.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/2.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div>

			  			<br><hr><br><div class="wm-zoom-container my-zoom-2">
			  				<div class="wm-zoom-box"><h4>Type 2 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/2.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/2.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div>

			  			<br><hr><br>
			  			<div class="wm-zoom-container my-zoom-1">
			  				<div class="wm-zoom-box"><h4>Type 1 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/big-image.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/big-image.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
			  			</div>

			  			<br><hr><br>
<div class="wm-zoom-container my-zoom-2">
			  				<div class="wm-zoom-box"><h4>Type 2 zoom effect</h4>
								<img id="b" src="{{asset('/zoomi/img/big-image.jpg')}}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{asset('/zoomi/img/big-image.jpg')}}" data-loader-src="img/loader.gif">
			  				</div>
        </div>

			  			<br><hr><br>
			  			

		<script type="text/javascript" src="{{asset('/zoomi/js/jquery-1.11.1.js')}}"></script>
		<script type="text/javascript" src="{{asset('/zoomi/js/jquery.wm-zoom-1.0.min.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.my-zoom-1').WMZoom();
				$('.my-zoom-2').WMZoom({
					config : {
						inner : true
					}
				});
			});
        </script>
	</body>
</html>
@endsection
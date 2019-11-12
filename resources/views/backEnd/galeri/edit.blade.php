@extends('backEnd.layouts.master')
@section('title','Edit galeri')
@section('content')
<div class="card-header">
	<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('galeri.index')}}">Slider</a> / <a href="#" class="current">Edit Slider</a> </div>  @if(Session::has('message'))
	<div class="alert alert-success text-center" role="alert">
		<strong>Well done! &nbsp;</strong>{{Session::get('message')}}
	</div>
	@endif
	<div class="col-md-12 d-flex align-items-stretch grid-margin">
		<div class="row flex-grow">
			<div class="col-12">
				<div class="card">
					<div class="widget-title"> <span class="icon"> <i class="fa fa-box"></i> </span>
						<h5>Update New Slider</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('galeri.update',$galeri->id) }}" method="post"  enctype="multipart/form-data" >
							<input name="_method" type="hidden" value="PATCH">
							{{ csrf_field() }}
							
							<div class="form-group">
								<label for="cc-payment" class="control-label mb-1">Gambar</label>
								@if (isset($galeri) && $galeri->gambar)
								<p>
									<br>
									<img src="{{ asset('assets/img/galeri/'.$galeri->gambar) }}" style="width:450px; height:250px;" alt="">
								</p>
								@endif
								<input name="gambar" type="file" class="dropify" value="{{ $galeri->gambar }}">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="{{route('galeri.index')}}" class="btn btn-warning pull-right">Back</a>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
	@endsection
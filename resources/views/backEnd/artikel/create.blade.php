@extends('backEnd.layouts.master')
@section('title','Add Artikel')
@section('js')
<script type="text/javascript">

	$(document).ready(function() {
		$(".users").select2();
	});

</script>
@section('content')
<div class="card-header">
	<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('artikel.index')}}">Blog</a> / <a href="{{route('artikel.create')}}" class="current">Add New Blog</a> </div>
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
						<h5>Add New Blog</h5>
					</div>
					<div class="card-body">
					<form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data" >
						{{ csrf_field () }}
						<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">Judul</label>	
								<input type="text" name="judul" class="form-control"  required>
								@if ($errors->has('judul'))
								<span class="help-block">
									<strong>{{ $errors->first('judul') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
							<label class="control-label">Gambar</label>
							<input type="file" name="gambar" class="dropify" accept="image/*"  required>
							@if ($errors->has('gambar'))
							<span class="help-block"><strong>{{ $errors->first('gambar') }}</strong></span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
							<label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
							<textarea id="text" type="ckeditor" name="deskripsi" class="ckeditor" rows="10"  required></textarea>
							@if ($errors->has('deskripsi'))
							<span class="help-block">
								<strong>{{$errors->first('deskripsi')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-danger">Reset</button>
							<a href="{{ url()->previous() }}" class="btn btn-warning pull-right">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
@endsection
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
	<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('payment.index')}}">payment</a> / <a href="{{route('payment.create')}}" class="current">Add New Artikel</a> </div>
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
					<form action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data" >
						{{ csrf_field () }}
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">email</label>	
								<input type="text" name="email" class="form-control"  required>
								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('name_order') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">name_order</label>	
								<input type="text" name="name_order" class="form-control"  required>
								@if ($errors->has('name_order'))
								<span class="help-block">
									<strong>{{ $errors->first('name_order') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('code_order') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">code_order</label>	
								<input type="text" name="code_order" class="form-control"  required>
								@if ($errors->has('code_order'))
								<span class="help-block">
									<strong>{{ $errors->first('code_order') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('owner_rekening') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">owner_rekening</label>	
								<input type="text" name="owner_rekening" class="form-control"  required>
								@if ($errors->has('owner_rekening'))
								<span class="help-block">
									<strong>{{ $errors->first('owner_rekening') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('transfer') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">transfer</label>	
								<input type="text" name="transfer" class="form-control"  required>
								@if ($errors->has('transfer'))
								<span class="help-block">
									<strong>{{ $errors->first('transfer') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('nominal_pembayaran') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">nominal_pembayaran</label>	
								<input type="text" name="nominal_pembayaran" class="form-control"  required>
								@if ($errors->has('nominal_pembayaran'))
								<span class="help-block">
									<strong>{{ $errors->first('nominal_pembayaran') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
							<div class="col-md-6">
								<label class="control-label">note</label>	
								<input type="text" name="note" class="form-control"  required>
								@if ($errors->has('note'))
								<span class="help-block">
									<strong>{{ $errors->first('note') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
							<label class="control-label">Gambar</label>
							<input type="file" id="gambar" name="gambar" class="validate" accept="image/*" required>
							@if ($errors->has('gambar'))
							<span class="help-block"><strong>{{ $errors->first('gambar') }}</strong></span>
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
@extends('backEnd.layouts.master')
@section('title','Add galeri')
@section('js')
<script type="text/javascript">

	$(document).ready(function() {
		$(".users").select2();
	});

</script>
@section('content')
<div class="row">
     <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('galeri.index')}}">Slider</a> / <a href="{{route('galeri.create')}}" class="current">Add New Slider</a> </div>
 <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">
                <div class="card">
                    
                     <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add New Slider</h5>
                </div>
                  <div class="card-body">
						<form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data" >
							{{ csrf_field () }}
							<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
				<label class="control-label">Gambar</label>
				<input type="file" id="gambar" name="gambar" class="dropify" accept="image/*" required>
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
</div>
	@endsection
@extends('backEnd.layouts.master')
@section('title','Edit Artikel')
@section('content')
<div class="card-header">
      <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a> / <a href="{{route('artikel.index')}}">Artikel</a> / <a href="#" class="current">Edit Artikel</a> </div>
 <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">
                <div class="card">
                     <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Update New Artikel</h5>
                </div>
                  <div class="card-body">
					<form action="{{ route('artikel.update',$artikel->id) }}" method="post"  enctype="multipart/form-data" >
						<input name="_method" type="hidden" value="PATCH">
						{{ csrf_field() }}
						
						<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
								<label class="control-label">Judul</label>	
								<input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}"  required>
								@if ($errors->has('judul'))
								<span class="help-block">
									<strong>{{ $errors->first('judul') }}</strong>
								</span>
								@endif
						</div>
						<div class="form-group">
							<label for="cc-payment" class="control-label mb-1">Gambar</label>
							@if (isset($artikel) && $artikel->gambar)
							<p>
								<br>
								<img src="{{ asset('assets/img/artikel/'.$artikel->gambar) }}" style="width:250px; height:250px;" alt="">
							</p>
							@endif
							<input name="gambar" type="file" class="dropify" value="{{ $artikel->gambar }}">
						</div>
						 <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div class="form-group{{$errors->has('deskripsi')?' has-error':''}}">
                            <textarea  type="ckeditor" class="ckeditor"  name="deskripsi" id="deskripsi" rows="6" placeholder="Product deskripsi" style="width: 580px;">{{$artikel->deskripsi}}</textarea>
                            <span class="text-danger">{{$errors->first('deskripsi')}}</span>
                        </div>
                    </div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{route('artikel.index')}}" class="btn btn-warning pull-right">Back</a>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
@endsection
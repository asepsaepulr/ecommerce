@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
<div class="breadcrumbs-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<h2>Payment Confrim</h2>
					<ul>
						<li><a href="#">Home /</a></li>
						<li class="active"><a href="#">Payment Confirm</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="shop-main-area">
	<div class="checkout-area">
		<div class="container">
			@if(Session::has('message'))
			<div class="alert alert-success text-center" role="alert">
				{{Session::get('message')}}
			</div>
			@endif
			<div class="row">
				<form action="{{ url('/submit-payment') }}" method="post" enctype="multipart/form-data" >
					{{ csrf_field () }}
					<div class="col-lg-30 col-md-30 col-sm-30 col-xs-16">
						<div class="login-form">
							<h3>Konfirmasi Pembayaran Aldohc Store Online</h3>
							Hai kak!! Terimakasih telah melakukan transaksi di Web Aldohc Store.
							berikut adalah form yang harus kaka isi untuk konfirmasi pembayaran.
							Nama dan foto yang terkait dengan akun Google Anda akan direkam saat Anda mengupload file dan mengirimkan formulir ini. Bukan asepsaepulr88@gmail.com? Ganti akun
							* Wajib
							<div class="row">
								<input type="hidden" name="_token" value="{{csrf_token()}}"> 
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
									<label>E-mail <span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('email')?'has-error':''}}">
										<input type="text" class="form-control" name="email" id="email" value="	" placeholder="">
										<span class="text-danger">{{$errors->first('email')}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
									<label>Nama Pemesan <span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('name_order')?'has-error':''}}">
										<input type="text" class="form-control" name="name_order" value="" id="name_order" placeholder="">
										<span class="text-danger">{{$errors->first('name_order')}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Kode Order<span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('code_order')?'has-error':''}}">
										<input type="text" class="form-control" name="code_order" value="" id="code_order" placeholder="">
										<span class="text-danger">{{$errors->first('code_order')}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Pemilik Rekening<span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('owner_rekening')?'has-error':''}}">
										<input type="text" class="form-control" name="owner_rekening" value="" id="owner_rekening" placeholder="">
										<span class="text-danger">{{$errors->first('owner_rekening')}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label class="control-label">Transfer ke rekening</label><br>
									<font size="5">
										<div class="form-group {{ $errors->has('transfer') ? ' has-error' : '' }}">
											<input type="radio" name="transfer" value="BCA">BCA  :0095675453223 /Sebastian<br/>  
											<input type="radio" name="transfer" value="BRI">BRI  :4343434327684 /Prayoga<br/>  
											<input type="radio" name="transfer" value="BJB">BJB  :9987525678345 /Putri Varina<br/>  
										</font>
										@if ($errors->has('transfer'))
										<span class="help-block">
											<strong>{{ $errors->first('transfer') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Nominal Pembayaran <span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('nominal_pembayaran')?'has-error':''}}">
										<input type="text" class="form-control" name="nominal_pembayaran" value="" id="nominal_pembayaran" placeholder="">
										<span class="text-danger">{{$errors->first('nominal_pembayaran')}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Note<span class="required">*</span></label>
									<div class="checkout-form-list {{$errors->has('note')?'has-error':''}}">
										<input type="text" class="form-control" name="note" value="" id="note" placeholder="">
										<span class="text-danger">{{$errors->first('note')}}</span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{$errors->has('gambar') ? 'has-error' : '' }}">
										<label class="control-label">Gambar</label>
										<input type="file" name="gambar" class="dropify" accept="image/*"  required>
										@if ($errors->has('gambar'))
										<span class="help-block"><strong>{{ $errors->first('gambar') }}</strong></span>
										@endif
									</div>
								</div>
								<div class="order-button-payment">
									<input type="submit" href="index" value="submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endsection
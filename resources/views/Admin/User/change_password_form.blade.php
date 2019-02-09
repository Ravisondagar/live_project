@extends('Admin.layouts.homepage')
@section('title','change Password')
@section('content')
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">User</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				@if ($message = Session::get('success'))
				        <div class="alert alert-success">
				            <p>{{ $message }}</p>
				        </div>
				@endif
				@if ($message = Session::get('error'))
				        <div class="alert alert-warning">
				            <p>{{ $message }}</p>
				        </div>
				@endif
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add User</h4>
							
						</div>
						
					</div>
					{!! Former::horizontal_open()->action( URL::route("change-password") )->method('post')->id('form') !!}
						<div class="form-group">
							<label>Old password</label>
							<input class="form-control" type="password" placeholder="Enter First name" name="old_password" value="{!! old('old_password') !!}">
							@if($errors->has('old_password'))<p class="help-block">{!! $errors->first('old_password') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>password</label>
							<input class="form-control" type="password" name="password" placeholder="Enter last Name...." value="{!! old('password') !!}">
							@if($errors->has('password'))<p class="help-block">{!! $errors->first('password') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control"  type="password" name="password_confirmation" value="{!! old('password_confirmation') !!}">
							@if($errors->has('password_confirmation'))<p class="help-block">{!! $errors->first('password_confirmation') !!}</p>@endif
						</div>
						<div>
							<button  type="submit" class="btn btn-primary"> Add </button>
						</div>
					{!! Former::close() !!}
				</div>
			</div>
		</div>
</div>
@endsection
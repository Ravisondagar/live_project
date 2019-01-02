@extends('Admin.layouts.homepage')
@section('title','Update Department')
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
									<li class="breadcrumb-item active" aria-current="page">Edit Department</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Department</h4>
						</div>
					</div>
					<div>
					{!! Former::horizontal_open()->action( URL::route("department.update",$department->id) )->method('patch')->id('form') !!}
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" type="text" placeholder="Enter Department Name..." name="name" value="{{ $department->name }}">
							@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
						</div>
						<div>
							<button  type="submit" class="btn btn-primary"> Update </button>
						</div>
						{!! Former::close() !!}
					</form>
					</div>
				</div>
			</div>
		</div>
</div>						



@endsection
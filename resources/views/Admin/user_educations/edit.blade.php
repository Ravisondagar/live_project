@extends('Admin.layouts.homepage')
@section('title','User')
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
									<li class="breadcrumb-item active" aria-current="page">User Edit Education</li>
								</ol>
							</nav>
						</div>
						{{-- <div class="col-md-6 col-sm-12 text-right">
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
						</div> --}}
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Education</h4>
							
						</div>
						
					</div>
					{!! Former::horizontal_open()->action( URL::route("user-educations.update",$user_educations->id) )->method('patch') !!}
						<div class="form-group">
							<label>Degree</label>
							<input class="form-control" type="text" placeholder="Enter degree" name="degree" value="{!! $user_educations->degree !!}">
							@if($errors->has('degree'))<p class="help-block">{!! $errors->first('degree') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>University</label>
							<input class="form-control" type="text" name="university" placeholder="Enter University...." value="{!! $user_educations->university !!}" !!}">
							@if($errors->has('university'))<p class="help-block">{!! $errors->first('university') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Specialisation</label>
							<input class="form-control"  type="text" placeholder="Enter Specialisation" name="specialisation" vvalue="{!! $user_educations->specialisation !!}">
							@if($errors->has('specialisation'))<p class="help-block">{!! $errors->first('specialisation') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>passing_year</label>
							<input class="form-control" type="text" placeholder="Enter Passing Year" name="passing_year" value="{!! $user_educations->passing_year !!}">
							@if($errors->has('passing_year'))<p class="help-block">{!! $errors->first('passing_year') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Percentage</label>
							<input class="form-control" type="text" name="percentage" placeholder="Enter Percentage...." value="{!! $user_educations->percentage !!}">
							@if($errors->has('percentage'))<p class="help-block">{!! $errors->first('percentage') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Achievements</label>
							<input class="form-control" placeholder="Achievements"  type="text" name="achievements" value="{!! $user_educations->achievements !!}">
							@if($errors->has('achievements'))<p class="help-block">{!! $errors->first('achievements') !!}</p>@endif
						</div>
						<div>
							<button  type="submit" class="btn btn-primary"> Update </button>
						</div>
					{!! Former::close() !!}
				</div>
			</div>
		</div>
</div>
@endsection
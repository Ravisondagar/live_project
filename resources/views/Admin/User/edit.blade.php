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
									<li class="breadcrumb-item active" aria-current="page">Edit User</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit User</h4>
						</div>
					</div>
					{!! Former::horizontal_open()->action( URL::route("user.update",$user->id))->method('patch')->id('form') !!}
						<div class="form-group">
							<label>Department</label>
							<select class="form-control" name="department_id">
								<option>select Department</option>
								@foreach(App\Department::all() as $department)
									<option value="{!! $department->id !!}" @if($user->department_id == $department->id) selected @endif >{!! $department->name !!}</option>
								@endforeach
							</select>
							@if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" type="text" placeholder="Enter First name" name="name" value="{!! $user->name !!}">
							@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Last name</label>
							<input class="form-control" type="text" name="last_name" placeholder="Enter last Name...." value="{!! $user->last_name !!}">
							@if($errors->has('last_name'))<p class="help-block">{!! $errors->first('last_name') !!}</p>@endif
						</div>
						<div class="col-md-6 col-sm-12">
							<label class="weight-600">Role</label>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio1" name="role" class="custom-control-input" value="employee" checked="">
								<label class="custom-control-label" for="customRadio1">Employee</label>
							</div>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio2" name="role" class="custom-control-input" value="interviewer">
								<label class="custom-control-label" for="customRadio2">Interviewer</label>
							</div>
							@if($errors->has('role'))<p class="help-block">{!! $errors->first('role') !!}</p>@endif
						</div>
						<div class="col-md-6 col-sm-12">
							<label class="weight-600">Gender</label>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male" @if($user->gender == 'male') checked="" @endif >
								<label class="custom-control-label" for="customRadio1">Male</label>
							</div>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female" @if($user->gender == 'female') checked="" @endif>
								<label class="custom-control-label" for="customRadio2">Female</label>
							</div>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio3" name="gender" class="custom-control-input" value="other" @if($user->gender == 'other') checked="" @endif>
								<label class="custom-control-label" for="customRadio3">Other</label>
							</div>
							@if($errors->has('gender'))<p class="help-block">{!! $errors->first('gender') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Date Of Birth</label>
							<input class="form-control" value="{!! $user->dob !!}" type="date" name="dob">
							@if($errors->has('dob'))<p class="help-block">{!! $errors->first('dob') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Textarea</label>
							<textarea class="form-control" name="address">{!! $user->address !!}</textarea>
							@if($errors->has('address'))<p class="help-block">{!! $errors->first('address') !!}</p>@endif
						</div>
						<div>
							<button  type="submit" class="btn btn-primary"> update </button>
						</div>
					{!! Former::close() !!}
				</div>
			</div>
		</div>
</div>
@endsection
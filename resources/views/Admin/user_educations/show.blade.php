@extends('Admin.layouts.homepage')
@section('content')
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>User Education</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">User Education</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">User Educations</h5>
						</div>
						<div>
							<button  type="button" style="float: right;" class="btn btn-primary"><a href="{{ route('user-educations.index') }}" style="color: white"> Back </a></button>
						</div>
					</div>
					<div class="row">

						<table class="data-table stripe hover nowrap">
							<tbody>
								
								
									<tr><th>No</th><td>{!! $user_education->id !!}</td></tr>
									<tr><th class="table-plus datatable-nosort">Name</th><td class="table-plus">{!! $user_education->degree !!}</td></tr>
									<tr><th>Image</th><td>
										<img src="{!! $user_education->image_url('thumb') !!}">
									</td></tr>
									<tr><th>Create At</th><td>{!! $user_education->created_at !!}</td></tr>
						
								
								
							</tbody>
						</table>
					</div>
				</div>
@endsection
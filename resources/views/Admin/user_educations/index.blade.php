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
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">User Educations</h5>
						</div>
						<div>
							<button  type="button" style="float: right;" class="btn btn-primary"><a href="{{ route('user-educations.create') }}" style="color: white"> Add New Education </a></button>
						</div>
					</div>
					<div class="row">
						@if(count($user_educations) > 0)
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Image</th>
									<th>Create At</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user_educations as $key => $user_education)
								<tr>
									<td>{!! $key+1 !!}</td>
									<td class="table-plus">{!! $user_education->degree !!}</td>
									<td>
										<img src="{!! $user_education->image_url('thumb') !!}">
									</td>
									<td>{!! $user_education->created_at !!}</td>
									{{-- <td>{!! $users->email !!}</td>
									<td>{!! $users->gender !!}</td>
									<td>{!! $users->dob !!}</td> --}}
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{{ route('user-educations.show',['slug'=> $user_education->slug]) }}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{{ route('user-educations.edit',['id'=> $user_education->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("user-educations.destroy",$user_education->id) )->method('delete')->class('form'.$user_education->id) !!}
												<a class="dropdown-item submit" href="javascript:;" data-id="{{$user_education->id}}" ><i class="fa fa-trash"></i> Delete</a>
												{!! Former::close() !!}
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
							<p>No User Education Found.</p>
						@endif
					</div>
				</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.submit',function(e){
		var r=$(this).data('id');
		//alert(r);

			e.preventDefault(this);
			swal({
					  title: "Are you sure?",
					  text: "Once deleted, you will not be able to recover this imaginary file!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					  if (willDelete) {
					    /*swal("Poof! Your imaginary file has been deleted!", {
					      icon: "success",
					    });*/
					    //alert($('.form'.r))	
					    $('.form'+r).submit();
					  } else {
					    //swal("Your imaginary file is safe!");
					    return false;
					  }
				});
			/*var r = confirm('Are you sure to delete this record?'); 
			if(r == true)
			{
				$('#form').submit();
			}
			else
			{
				return false;
			}*/

		});
	});
</script>
@endsection
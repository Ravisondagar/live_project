@extends('Admin.layouts.homepage')
@section('content')
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Department</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Department</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
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
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
@if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Department</h5>
						</div>
						<div>
							<button  type="button" style="float: right;" class="btn btn-primary"><a href="{{ route('department.create') }}" style="color: white"> Add Department </a></button>
						</div>
					</div>
					<div class="row">
						@if(count($department) > 0)
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Create Date</th>
									<th>Update Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($department as $key => $departments)
								<tr>
									<td>{!! $key+1 !!}</td>
									<td class="table-plus">{!! $departments->name !!}</td>
									<td>{!! $departments->created_at !!}</td>
									<td>{!! $departments->updated_at !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{{ route('department.show',['id'=> $departments->id]) }}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{{ route('department.edit',['id'=> $departments->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("department.destroy",$departments->id) )->method('delete')->class('form'.$departments->id) !!}
												<a class="dropdown-item submit" href="javascript:;" data-id="{{$departments->id}}" ><i class="fa fa-trash"></i> Delete</a>
												{!! Former::close() !!}
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
			<p>No Department Found.</p>
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
<script src="{!! asset('/theme/src/plugins/datatables/media/js/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/dataTables.bootstrap4.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/dataTables.responsive.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/responsive.bootstrap4.js') !!}"></script>
	<!-- buttons for Export datatable -->
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/dataTables.buttons.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/buttons.bootstrap4.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/buttons.print.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/buttons.html5.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/buttons.flash.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/pdfmake.min.js') !!}"></script>
	<script src="{!! asset('/theme/src/plugins/datatables/media/js/button/vfs_fonts.js') !!}"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
@endsection
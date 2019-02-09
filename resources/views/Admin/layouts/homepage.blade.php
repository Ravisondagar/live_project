<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@include('Admin.include.head')
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/switchery/dist/switchery.css') !!}">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') !!}">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/datatables/media/css/jquery.dataTables.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/datatables/media/css/dataTables.bootstrap4.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('/theme/src/plugins/datatables/media/css/responsive.dataTables.css') !!}">
	<style type="text/css">
		.help-block
		{
			color: red;
		}
	</style>
</head>
<body>
		@include('Admin.include.header')
		@include('Admin.include.sidebar')
		
		@yield('content')
		@include('Admin.include.script')
		@yield('script')
		<script type="text/javascript">
			$(document).ready(function(){
				$('#logout').click(function(e){
					e.preventDefault(this);
					$('#form').submit();
				});
			});
		</script>
		<script src="{!! asset('theme/src/plugins/cropperjs/dist/cropper.js') !!}"></script>
		<script>
			window.addEventListener('DOMContentLoaded', function () {
				var image = document.getElementById('image');
				var cropBoxData;
				var canvasData;
				var cropper;

				$('#modal').on('shown.bs.modal', function () {
					cropper = new Cropper(image, {
						autoCropArea: 0.5,
						dragMode: 'move',
						aspectRatio: 3 / 3,
						restore: false,
						guides: false,
						center: false,
						highlight: false,
						cropBoxMovable: false,
						cropBoxResizable: false,
						toggleDragModeOnDblclick: false,
						ready: function () {
							cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
						}
					});
				}).on('hidden.bs.modal', function () {
					cropBoxData = cropper.getCropBoxData();
					canvasData = cropper.getCanvasData();
					cropper.destroy();
				});
			});
		</script>
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
</body>
</html>
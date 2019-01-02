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
</body>
</html>
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
									<li class="breadcrumb-item active" aria-current="page">User Add Education</li>
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
							<h4 class="text-blue">Add User</h4>
							
						</div>
						
					</div>
					{!! Former::horizontal_open()->action( URL::route("user-educations.store") )->method('post')->id('form') !!}
						<div class="form-group">
							<label>Degree</label>
							<input class="form-control" type="text" placeholder="Enter degree" name="degree" value="{!! old('degree') !!}">
							@if($errors->has('degree'))<p class="help-block">{!! $errors->first('degree') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>University</label>
							<input class="form-control" type="text" name="university" placeholder="Enter University...." value="{!! old('university') !!}">
							@if($errors->has('university'))<p class="help-block">{!! $errors->first('university') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Specialisation</label>
							<input class="form-control"  type="text" placeholder="Enter Specialisation" name="specialisation" value="{!! old('specialisation') !!}">
							@if($errors->has('specialisation'))<p class="help-block">{!! $errors->first('specialisation') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>passing_year</label>
							<input class="form-control" type="text" placeholder="Enter Passing Year" name="passing_year" value="{!! old('passing_year') !!}">
							@if($errors->has('passing_year'))<p class="help-block">{!! $errors->first('passing_year') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Percentage</label>
							<input class="form-control" type="text" name="percentage" placeholder="Enter Percentage...." value="{!! old('percentage') !!}">
							@if($errors->has('percentage'))<p class="help-block">{!! $errors->first('percentage') !!}</p>@endif
						</div>
						<div class="form-group">
							<label>Achievements</label>
							<input class="form-control" placeholder="Achievements"  type="text" name="achievements" value="{!! old('achievements') !!}">
							@if($errors->has('achievements'))<p class="help-block">{!! $errors->first('achievements') !!}</p>@endif
						</div>
						<div class="form-group">
							<div id="container">
							<label>Image</label>
							<div id="previewDiv">
								<img id="img" src="{!! asset('/image/default.jpg') !!}">
							</div>
							<a href="javascript:;" class="btn btn-primary" id="uploader">Upload Document</a>
							@if($errors->has('image'))<p class="help-block">{!! $errors->first('image') !!}</p>@endif
							</div>
							<input type="hidden" name="image" id="image">
						</div>
						<div>
							<button  type="submit" class="btn btn-primary"> Add </button>
						</div>
					{!! Former::close() !!}
				</div>
			</div>
		</div>
</div>
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
 
<br />
<pre id="console"></pre>
@endsection
@section('script')
<script type="text/javascript">
// Custom example logic
 
var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
     
    browse_button : 'uploader', // you can pass in id...
    container: document.getElementById('container'), // ... or DOM Element itself
     
    url : "{{ asset('plupload/upload.php') }}",

    filters : {
        max_file_size : '10mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,gif,png"},
            {title : "Zip files", extensions : "zip"}
        ]
    },
 
    // Flash settings
    flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
 
    // Silverlight settings
    silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",
     
 
    init: {
        PostInit: function() {
            document.getElementById('filelist').innerHTML = '';
        },
 
        FilesAdded: function(up, files) {
            
            uploader.start();
        },
 
        // UploadProgress: function(up, file) {
        //     document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        // },
        UploadFile: function(up, file){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    console.log(file);
                    
                        $('#image').val(file.name);
                        

                        /*$('#preview').val(file.name);
                        $('#previewDiv >img').remove();
                        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");*/
                    
                },
        UploadComplete: function(up, files){
        	
                var tmp_url = '{!! asset('/tmp/') !!}';
                console.log(files);
                plupload.each(files, function(file) {
                    $('#image').val(file.name);
                    $('#previewDiv > img').remove();
                    $('#previewDiv').append("<img src='"+"/tmp/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                });
                jQuery('.loader').fadeToggle('medium');
        },
 
        Error: function(up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});
 
uploader.init();
 
</script>

@endsection
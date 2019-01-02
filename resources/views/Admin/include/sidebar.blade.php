	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="{{asset('theme/vendors/images/deskapp-logo.png')}}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					{{-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>
						<ul class="submenu">
							<li><a href="#">Dashboard style 1</a></li>
							<li><a href="#">Dashboard style 2</a></li>
						</ul>
					</li> --}}

					@if(Auth::user()->role == 'admin')
						<li>
							<a href="{{ route('department.index') }}" class="dropdown-toggle no-arrow">
								<span class="fa fa-sitemap"></span><span class="mtext">Departments</span>
							</a>
						</li>
						<li>
							<a href="{{ route('user.index') }}" class="dropdown-toggle no-arrow">
								<span class="fa fa-user"></span><span class="mtext">User</span>
							</a>
						</li>
					@else
						<li>
							<a href="{{ route('user-educations.index') }}" class="dropdown-toggle no-arrow">
								<span class="fa fa-book"></span><span class="mtext">Educations</span>
							</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
<!-- menu top  - menu phia tren cung-->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!!url('/admin/dashboard')!!}"><span>Trang Quản Trị</span> SHOP </a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
							@if (isset(Auth::guard('admin')->user()->name) )
                                {!!Auth::guard('admin')->user()->name!!}
                            @endif <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('admin/users/change/'.Auth::guard('admin')->user()->id) }}"><i class="fa fa-btn fa-sign-out"></i>Đổi mật khẩu</a></li>
                            <li><a class="top-a" href="{{ url('/admin/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" title="đăng xuất">
                                <i class="fa fa-btn fa-sign-out"></i><small>Đăng xuất</small>
                            </a>
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
<!-- /menu top  - menu phia tren cung-->
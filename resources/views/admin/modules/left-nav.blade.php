<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Tìm kiếm ...">
			</div>
		</form>
		<ul class="nav menu">

			<li class="{!!  Request::is('admin/dashboard') ? 'active ' : '' !!}"><a href="{!!url('admin/dashboard')!!}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li id="danhmuc" class="{!!  Request::is('admin/category') || Request::is('admin/category/*') ? 'active ' : '' !!}" >
				<a href="{{route('list-category')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Danh mục</a></li>
			<li id="sanpham" class="{!!  Request::is('admin/product') || Request::is('admin/product/*') ? 'active ' : '' !!}">
				<a href="{{route('list-product')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm </a></li>
			<li id="donhang" class="{!!  Request::is('admin/order') || Request::is('admin/order/*') ? 'active ' : '' !!}">
					<a href="{{route('list-order')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Đơn hàng </a></li>

			<li class="{!!  Request::is('admin/users') || Request::is('admin/users/*') ? 'active ' : '' !!}">
				<a href="{{route('list-user')}}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg> Nhân Viên</a></li>
			


		</ul>

	</div><!--/.sidebar-->